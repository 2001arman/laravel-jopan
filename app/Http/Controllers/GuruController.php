<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMuridRequest;
use App\Models\Guru;
use App\Repositories\GuruRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Laracasts\Flash\Flash;

class GuruController extends AppBaseController
{
    /** @var GuruRepository */
    private $guruRepository;

    public function __construct(GuruRepository $guruRepo)
    {
        $this->guruRepository = $guruRepo;
    }

    /**
     * Display a listing of the Guru.
     *
     * @param  Request  $request
     * @return Factory|View|Response
     *
     * @throws Exception
     */
    public function index(): View
    {
        return view('guru.index');
    }

    /**
     * Show the form for creating a new Guru.
     *
     * @return Factory|View
     */
    public function create(): View
    {
        $data = $this->guruRepository->getDataDivisi();
        return view('guru.create')->with($data);
    }

    /**
     * Store a newly created Guru in storage.
     *
     * @return RedirectResponse|Redirector
     */
    public function store(CreateMuridRequest $request): RedirectResponse
    {
        $input = $request->all();

        $this->guruRepository->store($input);

        Flash::success('Berhasil membuat data guru');

        return redirect(route('guru.index'));
    }

    /**
     * Show the form for editing the specified Guru.
     *
     * @return Factory|View
     */
    public function edit(Guru $guru): View
    {
        $data = $this->guruRepository->getDataDivisi();
        $data['guru'] = $guru;

        return view('guru.edit')->with($data);
    }

    /**
     * Update the specified Guru in storage.
     *
     * @return RedirectResponse|Redirector
     */
    public function update(Guru $guru, CreateMuridRequest $request): RedirectResponse
    {
        $this->guruRepository->update($request->all(), $guru->id);

        Flash::success(__('messages.medicine.medicine').' '.__('messages.medicine.updated_successfully'));

        return redirect(route('guru.index'));
    }

    /**
     * Remove the specified Guru from storage.
     *
     *
     * @throws Exception
     */
    public function destroy(Guru $medicine): JsonResponse
    {
        if (! canAccessRecord(Guru::class, $medicine->id)) {
            return $this->sendError(__('messages.flash.medicine_not_found'));
        }
        $this->guruRepository->delete($medicine->id);

        return $this->sendSuccess(__('messages.medicine.medicine').' '.__('messages.medicine.deleted_successfully'));
    }
}
