<?php

namespace App\Http\Controllers\Result;

use App\DataTables\Result\ResultDataTable;
use App\Http\Requests\Result;
use App\Http\Requests\Result\CreateResultRequest;
use App\Http\Requests\Result\UpdateResultRequest;
use App\Repositories\Result\ResultRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ResultController extends AppBaseController
{
    /** @var  ResultRepository */
    private $resultRepository;

    public function __construct(ResultRepository $resultRepo)
    {
        $this->resultRepository = $resultRepo;
    }

    /**
     * Display a listing of the Result.
     *
     * @param ResultDataTable $resultDataTable
     * @return Response
     */
    public function index(ResultDataTable $resultDataTable)
    {
        return $resultDataTable->render('result.results.index');
    }

    /**
     * Show the form for creating a new Result.
     *
     * @return Response
     */
    public function create()
    {
        return view('result.results.create');
    }

    /**
     * Store a newly created Result in storage.
     *
     * @param CreateResultRequest $request
     *
     * @return Response
     */
    public function store(CreateResultRequest $request)
    {
        $input = $request->all();

        $result = $this->resultRepository->create($input);

        Flash::success('Result saved successfully.');

        return redirect(route('result.results.index'));
    }

    /**
     * Display the specified Result.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $result = $this->resultRepository->find($id);

        if (empty($result)) {
            Flash::error('Result not found');

            return redirect(route('result.results.index'));
        }

        return view('result.results.show')->with('result', $result);
    }

    /**
     * Show the form for editing the specified Result.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $result = $this->resultRepository->find($id);

        if (empty($result)) {
            Flash::error('Result not found');

            return redirect(route('result.results.index'));
        }

        return view('result.results.edit')->with('result', $result);
    }

    /**
     * Update the specified Result in storage.
     *
     * @param  int              $id
     * @param UpdateResultRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateResultRequest $request)
    {
        $result = $this->resultRepository->find($id);

        if (empty($result)) {
            Flash::error('Result not found');

            return redirect(route('result.results.index'));
        }

        $result = $this->resultRepository->update($request->all(), $id);

        Flash::success('Result updated successfully.');

        return redirect(route('result.results.index'));
    }

    /**
     * Remove the specified Result from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $result = $this->resultRepository->find($id);

        if (empty($result)) {
            Flash::error('Result not found');

            return redirect(route('result.results.index'));
        }

        $this->resultRepository->delete($id);

        Flash::success('Result deleted successfully.');

        return redirect(route('result.results.index'));
    }
}
