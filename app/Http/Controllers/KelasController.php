<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKelasRequest;
use App\Models\Kelas;
use App\Repositories\KelasRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Laracasts\Flash\Flash;

class KelasController extends AppBaseController
{
    /** @var KelasRepository */
    private $kelasRepository;

    public function __construct(KelasRepository $kelasRepo)
    {
        $this->kelasRepository = $kelasRepo;
    }

    /**
     * Display a listing of the Kelas.
     *
     * @param  Request  $request
     * @return Factory|View|Response
     *
     * @throws Exception
     */
    public function index(): View
    {
        return view('kelas.index');
    }

    /**
     * Show the form for creating a new Kelas.
     *
     * @return Factory|View
     */
    public function create(): View
    {
        $data = $this->kelasRepository->getDataGuruPelajaran();
        return view('kelas.create')->with($data);
    }

    /**
     * Store a newly created Kelas in storage.
     *
     * @return RedirectResponse|Redirector
     */
    public function store(CreateKelasRequest $request): RedirectResponse
    {
        $input = $request->all();

        $this->kelasRepository->store($input);

        Flash::success('Berhasil membuat data kelas');

        return redirect(route('kelas.index'));
    }

    /**
     * Show the form for editing the specified Kelas.
     *
     * @return Factory|View
     */
    public function edit(Kelas $kelas): View
    {
        $data = $this->kelasRepository->getDataGuruPelajaran();
        $data['kelas'] = $kelas;

        return view('kelas.edit')->with($data);
    }

    /**
     * Update the specified Kelas in storage.
     *
     * @return RedirectResponse|Redirector
     */
    public function update(Kelas $kelas, CreateKelasRequest $request): RedirectResponse
    {
        $this->kelasRepository->update($request->all(), $kelas->id);

        Flash::success(__('messages.medicine.medicine').' '.__('messages.medicine.updated_successfully'));

        return redirect(route('kelas.index'));
    }

    /**
     * Remove the specified Kelas from storage.
     *
     *
     * @throws Exception
     */
    public function destroy(Kelas $medicine): JsonResponse
    {
        if (! canAccessRecord(Kelas::class, $medicine->id)) {
            return $this->sendError(__('messages.flash.medicine_not_found'));
        }
        $this->kelasRepository->delete($medicine->id);

        return $this->sendSuccess(__('messages.medicine.medicine').' '.__('messages.medicine.deleted_successfully'));
    }
}
