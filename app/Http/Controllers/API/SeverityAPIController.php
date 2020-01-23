<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSeverityAPIRequest;
use App\Http\Requests\API\UpdateSeverityAPIRequest;
use App\Models\Severity;
use App\Repositories\SeverityRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SeverityController
 * @package App\Http\Controllers\API
 */

class SeverityAPIController extends AppBaseController
{
    /** @var  SeverityRepository */
    private $severityRepository;

    public function __construct(SeverityRepository $severityRepo)
    {
        $this->severityRepository = $severityRepo;
    }

    /**
     * Display a listing of the Severity.
     * GET|HEAD /severities
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $severities = $this->severityRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($severities->toArray(), 'Severities retrieved successfully');
    }

    /**
     * Store a newly created Severity in storage.
     * POST /severities
     *
     * @param CreateSeverityAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSeverityAPIRequest $request)
    {
        $input = $request->all();

        $severity = $this->severityRepository->create($input);

        return $this->sendResponse($severity->toArray(), 'Severity saved successfully');
    }

    /**
     * Display the specified Severity.
     * GET|HEAD /severities/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Severity $severity */
        $severity = $this->severityRepository->find($id);

        if (empty($severity)) {
            return $this->sendError('Severity not found');
        }

        return $this->sendResponse($severity->toArray(), 'Severity retrieved successfully');
    }

    /**
     * Update the specified Severity in storage.
     * PUT/PATCH /severities/{id}
     *
     * @param int $id
     * @param UpdateSeverityAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSeverityAPIRequest $request)
    {
        $input = $request->all();

        /** @var Severity $severity */
        $severity = $this->severityRepository->find($id);

        if (empty($severity)) {
            return $this->sendError('Severity not found');
        }

        $severity = $this->severityRepository->update($input, $id);

        return $this->sendResponse($severity->toArray(), 'Severity updated successfully');
    }

    /**
     * Remove the specified Severity from storage.
     * DELETE /severities/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Severity $severity */
        $severity = $this->severityRepository->find($id);

        if (empty($severity)) {
            return $this->sendError('Severity not found');
        }

        $severity->delete();

        return $this->sendResponse($id, 'Severity deleted successfully');
    }
}
