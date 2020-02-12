<?php

namespace App\Http\Controllers\Matchweek;

use App\DataTables\Matchweek\MatchweekDataTable;
use App\Http\Requests\Matchweek;
use App\Http\Requests\Matchweek\CreateMatchweekRequest;
use App\Http\Requests\Matchweek\UpdateMatchweekRequest;
use App\Repositories\Matchweek\MatchweekRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class MatchweekController extends AppBaseController
{
    /** @var  MatchweekRepository */
    private $matchweekRepository;

    public function __construct(MatchweekRepository $matchweekRepo)
    {
        $this->matchweekRepository = $matchweekRepo;
    }

    /**
     * Display a listing of the Matchweek.
     *
     * @param MatchweekDataTable $matchweekDataTable
     * @return Response
     */
    public function index(MatchweekDataTable $matchweekDataTable)
    {
        return $matchweekDataTable->render('matchweek.matchweeks.index');
    }

    /**
     * Show the form for creating a new Matchweek.
     *
     * @return Response
     */
    public function create()
    {
        return view('matchweek.matchweeks.create');
    }

    /**
     * Store a newly created Matchweek in storage.
     *
     * @param CreateMatchweekRequest $request
     *
     * @return Response
     */
    public function store(CreateMatchweekRequest $request)
    {
        $input = $request->all();

        $matchweek = $this->matchweekRepository->create($input);

        Flash::success('Matchweek saved successfully.');

        return redirect(route('matchweek.matchweeks.index'));
    }

    /**
     * Display the specified Matchweek.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $matchweek = $this->matchweekRepository->find($id);

        if (empty($matchweek)) {
            Flash::error('Matchweek not found');

            return redirect(route('matchweek.matchweeks.index'));
        }

        return view('matchweek.matchweeks.show')->with('matchweek', $matchweek);
    }

    /**
     * Show the form for editing the specified Matchweek.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $matchweek = $this->matchweekRepository->find($id);

        if (empty($matchweek)) {
            Flash::error('Matchweek not found');

            return redirect(route('matchweek.matchweeks.index'));
        }

        return view('matchweek.matchweeks.edit')->with('matchweek', $matchweek);
    }

    /**
     * Update the specified Matchweek in storage.
     *
     * @param  int              $id
     * @param UpdateMatchweekRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMatchweekRequest $request)
    {
        $matchweek = $this->matchweekRepository->find($id);

        if (empty($matchweek)) {
            Flash::error('Matchweek not found');

            return redirect(route('matchweek.matchweeks.index'));
        }

        $matchweek = $this->matchweekRepository->update($request->all(), $id);

        Flash::success('Matchweek updated successfully.');

        return redirect(route('matchweek.matchweeks.index'));
    }

    /**
     * Remove the specified Matchweek from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $matchweek = $this->matchweekRepository->find($id);

        if (empty($matchweek)) {
            Flash::error('Matchweek not found');

            return redirect(route('matchweek.matchweeks.index'));
        }

        $this->matchweekRepository->delete($id);

        Flash::success('Matchweek deleted successfully.');

        return redirect(route('matchweek.matchweeks.index'));
    }
}
