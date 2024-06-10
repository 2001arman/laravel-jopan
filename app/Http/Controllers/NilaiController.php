<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNilaiRequest;
use App\Models\Nilai;
use App\Repositories\NilaiRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Laracasts\Flash\Flash;

class NilaiController extends AppBaseController
{
    /** @var NilaiRepository */
    private $nnilaiRepository;

    public function __construct(NilaiRepository $kelasRepo)
    {
        $this->nnilaiRepository = $kelasRepo;
    }

    /**
     * Display a listing of the Nilai.
     *
     * @param  Request  $request
     * @return Factory|View|Response
     *
     * @throws Exception
     */
    public function index(): View
    {
        return view('nilai.index');
    }

    /**
     * Show the form for creating a new Nilai.
     *
     * @return Factory|View
     */
    public function create(): View
    {
        $data = $this->nnilaiRepository->getDataMuridPelajaran();
        return view('nilai.create')->with($data);
    }

    /**
     * Store a newly created Nilai in storage.
     *
     * @return RedirectResponse|Redirector
     */
    public function store(CreateNilaiRequest $request): RedirectResponse
    {
        $input = $request->all();

        $this->nnilaiRepository->store($input);

        Flash::success('Berhasil membuat data nilai');

        return redirect(route('nilai.index'));
    }

    /**
     * Show the form for editing the specified Nilai.
     *
     * @return Factory|View
     */
    public function edit(Nilai $nilai): View
    {
        $data = $this->nnilaiRepository->getDataMuridPelajaran();
        $data['nilai'] = $nilai;

        return view('nilai.edit')->with($data);
    }

    /**
     * Update the specified Nilai in storage.
     *
     * @return RedirectResponse|Redirector
     */
    public function update(Nilai $nilai, CreateNilaiRequest $request): RedirectResponse
    {
        $this->nnilaiRepository->update($request->all(), $nilai->id);

        Flash::success('nilai'. __('messages.medicine.updated_successfully'));

        return redirect(route('nilai.index'));
    }

    /**
     * Remove the specified Nilai from storage.
     *
     *
     * @throws Exception
     */
    public function destroy(Nilai $medicine): JsonResponse
    {
        if (! canAccessRecord(Nilai::class, $medicine->id)) {
            return $this->sendError(__('messages.flash.medicine_not_found'));
        }
        $this->nnilaiRepository->delete($medicine->id);

        return $this->sendSuccess(__('messages.medicine.medicine').' '.__('messages.medicine.deleted_successfully'));
    }
}
