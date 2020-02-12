<?php

namespace App\Http\Controllers\Match;

use App\DataTables\Match\MatchDataTable;
use App\Http\Requests\Match;
use App\Http\Requests\Match\CreateMatchRequest;
use App\Http\Requests\Match\UpdateMatchRequest;
use App\Repositories\Match\MatchRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class MatchController extends AppBaseController
{
    /** @var  MatchRepository */
    private $matchRepository;

    public function __construct(MatchRepository $matchRepo)
    {
        $this->matchRepository = $matchRepo;
    }

    /**
     * Display a listing of the Match.
     *
     * @param MatchDataTable $matchDataTable
     * @return Response
     */
    public function index(MatchDataTable $matchDataTable)
    {
        return $matchDataTable->render('match.matches.index');
    }

    /**
     * Show the form for creating a new Match.
     *
     * @return Response
     */
    public function create()
    {
        return view('match.matches.create');
    }

    /**
     * Store a newly created Match in storage.
     *
     * @param CreateMatchRequest $request
     *
     * @return Response
     */
    public function store(CreateMatchRequest $request)
    {
        $input = $request->all();

        $match = $this->matchRepository->create($input);

        Flash::success('Match saved successfully.');

        return redirect(route('match.matches.index'));
    }

    /**
     * Display the specified Match.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $match = $this->matchRepository->find($id);

        if (empty($match)) {
            Flash::error('Match not found');

            return redirect(route('match.matches.index'));
        }

        return view('match.matches.show')->with('match', $match);
    }

    /**
     * Show the form for editing the specified Match.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $match = $this->matchRepository->find($id);

        if (empty($match)) {
            Flash::error('Match not found');

            return redirect(route('match.matches.index'));
        }

        return view('match.matches.edit')->with('match', $match);
    }

    /**
     * Update the specified Match in storage.
     *
     * @param  int              $id
     * @param UpdateMatchRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMatchRequest $request)
    {
        $match = $this->matchRepository->find($id);

        if (empty($match)) {
            Flash::error('Match not found');

            return redirect(route('match.matches.index'));
        }

        $match = $this->matchRepository->update($request->all(), $id);

        Flash::success('Match updated successfully.');

        return redirect(route('match.matches.index'));
    }

    /**
     * Remove the specified Match from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $match = $this->matchRepository->find($id);

        if (empty($match)) {
            Flash::error('Match not found');

            return redirect(route('match.matches.index'));
        }

        $this->matchRepository->delete($id);

        Flash::success('Match deleted successfully.');

        return redirect(route('match.matches.index'));
    }
}
