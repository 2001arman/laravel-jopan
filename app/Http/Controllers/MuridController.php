<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMuridRequest;
use App\Models\Murid;
use App\Repositories\MuridRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Laracasts\Flash\Flash;

class MuridController extends AppBaseController
{
    /** @var MuridRepository */
    private $muridRepository;

    public function __construct(MuridRepository $muridRepo)
    {
        $this->muridRepository = $muridRepo;
    }

    /**
     * Display a listing of the Murid.
     *
     * @param  Request  $request
     * @return Factory|View|Response
     *
     * @throws Exception
     */
    public function index(): View
    {
        return view('murid.index');
    }

    public function presensiIndex(){
        return view('presensi.index');
    }

    public function izinIndex(){
        return view('izin.index');
    }

    public function cutiIndex(){
        return view('cuti.index');
    }

    /**
     * Show the form for creating a new Murid.
     *
     * @return Factory|View
     */
    public function create(): View
    {
        $data = $this->muridRepository->getDataDivisi();
        return view('murid.create')->with($data);
    }

    /**
     * Store a newly created Murid in storage.
     *
     * @return RedirectResponse|Redirector
     */
    public function store(CreateMuridRequest $request): RedirectResponse
    {
        $input = $request->all();

        $this->muridRepository->store($input);

        Flash::success('Berhasil membuat data murid');

        return redirect(route('murid.index'));
    }

    /**
     * Show the form for editing the specified Murid.
     *
     * @return Factory|View
     */
    public function edit(Murid $murid): View
    {
        $data = $this->muridRepository->getDataDivisi();
        $data['murid'] = $murid;

        return view('murid.edit')->with($data);
    }

    /**
     * Update the specified Murid in storage.
     *
     * @return RedirectResponse|Redirector
     */
    public function update(Murid $murid, CreateMuridRequest $request): RedirectResponse
    {
        $this->muridRepository->update($request->all(), $murid->id);

        Flash::success(__('messages.medicine.medicine').' '.__('messages.medicine.updated_successfully'));

        return redirect(route('murid.index'));
    }

    /**
     * Remove the specified Murid from storage.
     *
     *
     * @throws Exception
     */
    public function destroy(Murid $medicine): JsonResponse
    {
        if (! canAccessRecord(Murid::class, $medicine->id)) {
            return $this->sendError(__('messages.flash.medicine_not_found'));
        }
        $this->muridRepository->delete($medicine->id);

        return $this->sendSuccess(__('messages.medicine.medicine').' '.__('messages.medicine.deleted_successfully'));
    }
}
