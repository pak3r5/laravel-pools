<?php

namespace App\Http\Controllers\Team;

use App\DataTables\Team\TeamDataTable;
use App\Http\Requests\Team;
use App\Http\Requests\Team\CreateTeamRequest;
use App\Http\Requests\Team\UpdateTeamRequest;
use App\Repositories\Team\TeamRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class TeamController extends AppBaseController
{
    /** @var  TeamRepository */
    private $teamRepository;

    public function __construct(TeamRepository $teamRepo)
    {
        $this->teamRepository = $teamRepo;
    }

    /**
     * Display a listing of the Team.
     *
     * @param TeamDataTable $teamDataTable
     * @return Response
     */
    public function index(TeamDataTable $teamDataTable)
    {
        return $teamDataTable->render('team.teams.index');
    }

    /**
     * Show the form for creating a new Team.
     *
     * @return Response
     */
    public function create()
    {
        return view('team.teams.create');
    }

    /**
     * Store a newly created Team in storage.
     *
     * @param CreateTeamRequest $request
     *
     * @return Response
     */
    public function store(CreateTeamRequest $request)
    {
        $input = $request->all();

        $team = $this->teamRepository->create($input);

        Flash::success('Team saved successfully.');

        return redirect(route('team.teams.index'));
    }

    /**
     * Display the specified Team.
     *
     * @param  string $uuid
     *
     * @return Response
     */
    public function show($uuid)
    {
        $team = $this->teamRepository->find($uuid);

        if (empty($team)) {
            Flash::error('Team not found');

            return redirect(route('team.teams.index'));
        }

        return view('team.teams.show')->with('team', $team);
    }

    /**
     * Show the form for editing the specified Team.
     *
     * @param  string $uuid
     *
     * @return Response
     */
    public function edit($uuid)
    {
        $team = $this->teamRepository->find($uuid);

        if (empty($team)) {
            Flash::error('Team not found');

            return redirect(route('team.teams.index'));
        }

        return view('team.teams.edit')->with('team', $team);
    }

    /**
     * Update the specified Team in storage.
     *
     * @param  int              $uuid
     * @param UpdateTeamRequest $request
     *
     * @return Response
     */
    public function update($uuid, UpdateTeamRequest $request)
    {
        $team = $this->teamRepository->find($uuid);

        if (empty($team)) {
            Flash::error('Team not found');

            return redirect(route('team.teams.index'));
        }

        $team = $this->teamRepository->update($request->all(), $uuid);

        Flash::success('Team updated successfully.');

        return redirect(route('team.teams.index'));
    }

    /**
     * Remove the specified Team from storage.
     *
     * @param  string $uuid
     *
     * @return Response
     */
    public function destroy($uuid)
    {
        $team = $this->teamRepository->find($uuid);

        if (empty($team)) {
            Flash::error('Team not found');

            return redirect(route('team.teams.index'));
        }

        $this->teamRepository->delete($uuid);

        Flash::success('Team deleted successfully.');

        return redirect(route('team.teams.index'));
    }
}
