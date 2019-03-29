<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateImprintAPIRequest;
use App\Http\Requests\API\UpdateImprintAPIRequest;
use App\Models\Imprint;
use App\Repositories\ImprintRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ImprintController
 * @package App\Http\Controllers\API
 */

class ImprintAPIController extends AppBaseController
{
    /** @var  ImprintRepository */
    private $imprintRepository;

    public function __construct(ImprintRepository $imprintRepo)
    {
        $this->imprintRepository = $imprintRepo;
    }

    /**
     * Display a listing of the Imprint.
     * GET|HEAD /imprints
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $imprints = $this->imprintRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($imprints->toArray(), 'Imprints retrieved successfully');
    }

    /**
     * Store a newly created Imprint in storage.
     * POST /imprints
     *
     * @param CreateImprintAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateImprintAPIRequest $request)
    {
        $input = $request->all();

        $imprint = $this->imprintRepository->create($input);

        return $this->sendResponse($imprint->toArray(), 'Imprint saved successfully');
    }

    /**
     * Display the specified Imprint.
     * GET|HEAD /imprints/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Imprint $imprint */
        $imprint = $this->imprintRepository->find($id);

        if (empty($imprint)) {
            return $this->sendError('Imprint not found');
        }

        return $this->sendResponse($imprint->toArray(), 'Imprint retrieved successfully');
    }

    /**
     * Update the specified Imprint in storage.
     * PUT/PATCH /imprints/{id}
     *
     * @param int $id
     * @param UpdateImprintAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateImprintAPIRequest $request)
    {
        $input = $request->all();

        /** @var Imprint $imprint */
        $imprint = $this->imprintRepository->find($id);

        if (empty($imprint)) {
            return $this->sendError('Imprint not found');
        }

        $imprint = $this->imprintRepository->update($input, $id);

        return $this->sendResponse($imprint->toArray(), 'Imprint updated successfully');
    }

    /**
     * Remove the specified Imprint from storage.
     * DELETE /imprints/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Imprint $imprint */
        $imprint = $this->imprintRepository->find($id);

        if (empty($imprint)) {
            return $this->sendError('Imprint not found');
        }

        $imprint->delete();

        return $this->sendResponse($id, 'Imprint deleted successfully');
    }
}
