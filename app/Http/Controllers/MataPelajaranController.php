<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePelajaranRequest;
use App\Models\MataPelajaran;
use App\Repositories\MataPelajaranRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Laracasts\Flash\Flash;

class MataPelajaranController extends AppBaseController
{
    /** @var MataPelajaranRepository */
    private $pelajaranRepository;

    public function __construct(MataPelajaranRepository $pelajaranRepo)
    {
        $this->pelajaranRepository = $pelajaranRepo;
    }

    /**
     * Display a listing of the MataPelajaran.
     *
     * @param  Request  $request
     * @return Factory|View|Response
     *
     * @throws Exception
     */
    public function index(): View
    {
        return view('pelajaran.index');
    }

    /**
     * Show the form for creating a new MataPelajaran.
     *
     * @return Factory|View
     */
    public function create(): View
    {
        return view('pelajaran.create');
    }

    /**
     * Store a newly created MataPelajaran in storage.
     *
     * @return RedirectResponse|Redirector
     */
    public function store(CreatePelajaranRequest $request): RedirectResponse
    {
        $input = $request->all();

        $this->pelajaranRepository->store($input);

        Flash::success('Berhasil membuat data pelajaran');

        return redirect(route('pelajaran.index'));
    }

    /**
     * Show the form for editing the specified MataPelajaran.
     *
     * @return Factory|View
     */
    public function edit(MataPelajaran $pelajaran): View
    {
        $data['pelajaran'] = $pelajaran;

        return view('pelajaran.edit')->with($data);
    }

    /**
     * Update the specified MataPelajaran in storage.
     *
     * @return RedirectResponse|Redirector
     */
    public function update(MataPelajaran $pelajaran, CreatePelajaranRequest $request): RedirectResponse
    {
        $this->pelajaranRepository->update($request->all(), $pelajaran->id);

        Flash::success(__('messages.medicine.medicine').' '.__('messages.medicine.updated_successfully'));

        return redirect(route('pelajaran.index'));
    }

    /**
     * Remove the specified MataPelajaran from storage.
     *
     *
     * @throws Exception
     */
    public function destroy(MataPelajaran $medicine): JsonResponse
    {
        if (! canAccessRecord(MataPelajaran::class, $medicine->id)) {
            return $this->sendError(__('messages.flash.medicine_not_found'));
        }
        $this->pelajaranRepository->delete($medicine->id);

        return $this->sendSuccess(__('messages.medicine.medicine').' '.__('messages.medicine.deleted_successfully'));
    }
}
