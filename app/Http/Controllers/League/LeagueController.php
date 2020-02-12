<?php

namespace App\Http\Controllers\League;

use App\DataTables\League\LeagueDataTable;
use App\Http\Requests\League;
use App\Http\Requests\League\CreateLeagueRequest;
use App\Http\Requests\League\UpdateLeagueRequest;
use App\Repositories\League\LeagueRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Support\Str;

class LeagueController extends AppBaseController
{
    /** @var  LeagueRepository */
    private $leagueRepository;

    public function __construct(LeagueRepository $leagueRepo)
    {
        $this->leagueRepository = $leagueRepo;
    }

    /**
     * Display a listing of the League.
     *
     * @param LeagueDataTable $leagueDataTable
     * @return Response
     */
    public function index(LeagueDataTable $leagueDataTable)
    {
        return $leagueDataTable->render('league.leagues.index');
    }

    /**
     * Show the form for creating a new League.
     *
     * @return Response
     */
    public function create()
    {
        return view('league.leagues.create');
    }

    /**
     * Store a newly created League in storage.
     *
     * @param CreateLeagueRequest $request
     *
     * @return Response
     */
    public function store(CreateLeagueRequest $request)
    {
        $input = $request->all();

        $league = $this->leagueRepository->create($input);

        Flash::success('League saved successfully.');

        return redirect(route('league.leagues.index'));
    }

    /**
     * Display the specified League.
     *
     * @param  string $uuid
     *
     * @return Response
     */
    public function show($uuid)
    {
        $league = $this->leagueRepository->find($uuid);

        if (empty($league)) {
            Flash::error('League not found');

            return redirect(route('league.leagues.index'));
        }

        return view('league.leagues.show')->with('league', $league);
    }

    /**
     * Show the form for editing the specified League.
     *
     * @param  string $uuid
     *
     * @return Response
     */
    public function edit($uuid)
    {
        $league = $this->leagueRepository->find($uuid);
        //dd($league);
        if (empty($league)) {
            Flash::error('League not found');

            return redirect(route('league.leagues.index'));
        }

        return view('league.leagues.edit')->with('league', $league);
    }

    /**
     * Update the specified League in storage.
     *
     * @param  int              $uuid
     * @param UpdateLeagueRequest $request
     *
     * @return Response
     */
    public function update($uuid, UpdateLeagueRequest $request)
    {
        //dd($uuid);
        $league = $this->leagueRepository->find($uuid);

        if (empty($league)) {
            Flash::error('League not found');

            return redirect(route('league.leagues.index'));
        }

        $league = $this->leagueRepository->update($request->all(), $uuid);

        Flash::success('League updated successfully.');

        return redirect(route('league.leagues.index'));
    }

    /**
     * Remove the specified League from storage.
     *
     * @param  string $uuid
     *
     * @return Response
     */
    public function destroy($uuid)
    {
        $league = $this->leagueRepository->find($uuid);

        if (empty($league)) {
            Flash::error('League not found');

            return redirect(route('league.leagues.index'));
        }

        $this->leagueRepository->delete($uuid);

        Flash::success('League deleted successfully.');

        return redirect(route('league.leagues.index'));
    }
}
