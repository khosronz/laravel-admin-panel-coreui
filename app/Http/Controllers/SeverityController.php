<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSeverityRequest;
use App\Http\Requests\UpdateSeverityRequest;
use App\Repositories\SeverityRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SeverityController extends AppBaseController
{
    /** @var  SeverityRepository */
    private $severityRepository;

    public function __construct(SeverityRepository $severityRepo)
    {
        $this->severityRepository = $severityRepo;
    }

    /**
     * Display a listing of the Severity.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $severities = $this->severityRepository->paginate(5);

        return view('severities.index')
            ->with('severities', $severities);
    }

    /**
     * Show the form for creating a new Severity.
     *
     * @return Response
     */
    public function create()
    {
        return view('severities.create');
    }

    /**
     * Store a newly created Severity in storage.
     *
     * @param CreateSeverityRequest $request
     *
     * @return Response
     */
    public function store(CreateSeverityRequest $request)
    {
        $input = $request->all();

        $severity = $this->severityRepository->create($input);

        Flash::success(__('Severity').' '.__('saved successfully.'));

        return redirect(route('severities.index'));
    }

    /**
     * Display the specified Severity.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $severity = $this->severityRepository->find($id);

        if (empty($severity)) {
            Flash::error(__('Severity').' '.__('not found.'));

            return redirect(route('severities.index'));
        }

        return view('severities.show')->with('severity', $severity);
    }

    /**
     * Show the form for editing the specified Severity.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $severity = $this->severityRepository->find($id);

        if (empty($severity)) {
            Flash::error(__('Severity').' '.__('not found.'));

            return redirect(route('severities.index'));
        }

        return view('severities.edit')->with('severity', $severity);
    }

    /**
     * Update the specified Severity in storage.
     *
     * @param int $id
     * @param UpdateSeverityRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSeverityRequest $request)
    {
        $severity = $this->severityRepository->find($id);

        if (empty($severity)) {
            Flash::error(__('Severity').' '.__('not found.'));

            return redirect(route('severities.index'));
        }

        $severity = $this->severityRepository->update($request->all(), $id);

        Flash::success(__('Severity').' '.__('updated successfully.'));

        return redirect(route('severities.index'));
    }

    /**
     * Remove the specified Severity from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $severity = $this->severityRepository->find($id);

        if (empty($severity)) {
            Flash::error(__('Severity').' '.__('not found.'));

            return redirect(route('severities.index'));
        }

        $this->severityRepository->delete($id);

        Flash::success(__('Severity').' '.__('deleted successfully.'));

        return redirect(route('severities.index'));
    }
}
