<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateImprintRequest;
use App\Http\Requests\UpdateImprintRequest;
use App\Repositories\ImprintRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ImprintController extends AppBaseController
{
    /** @var  ImprintRepository */
    private $imprintRepository;

    public function __construct(ImprintRepository $imprintRepo)
    {
        $this->imprintRepository = $imprintRepo;
    }

    /**
     * Display a listing of the Imprint.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $imprints = $this->imprintRepository->all();

        return view('admin/imprints.index')
            ->with('imprints', $imprints);
    }


    /**
     * Display the specified Imprint.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $imprint = $this->imprintRepository->find($id);

        if (empty($imprint)) {
            Flash::error('Imprint not found');

            return redirect(route('imprints.index'));
        }

        return view('admin/imprints.show')->with('imprint', $imprint);
    }

    /**
     * Show the form for editing the specified Imprint.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $imprint = $this->imprintRepository->find($id);

        if (empty($imprint)) {
            Flash::error('Imprint not found');

            return redirect(route('imprints.index'));
        }

        return view('admin/imprints.edit')->with('imprint', $imprint);
    }

    /**
     * Update the specified Imprint in storage.
     *
     * @param int $id
     * @param UpdateImprintRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateImprintRequest $request)
    {
        $imprint = $this->imprintRepository->find($id);

        if (empty($imprint)) {
            Flash::error('Imprint not found');

            return redirect(route('imprints.index'));
        }

        $imprint = $this->imprintRepository->update($request->all(), $id);

        Flash::success('Imprint updated successfully.');

        return redirect(route('admin/imprints.index'));
    }

}
