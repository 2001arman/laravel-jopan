<?php

namespace App\Repositories;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\MataPelajaran;
use App\Models\Murid;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class MedicineRepository
 *
 * @version February 12, 2020, 11:00 am UTC
 */
class NilaiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
    ];

    /**
     * Return searchable fields
     */
    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function getDataMuridPelajaran(): array
    {
        $data['kelas'] = Kelas::with(['mataPelajaran', 'guru'])->get()
        ->map(function ($kelas) {
            // Combine 'guru' and 'pelajaran'
            return [
                'id' => $kelas->id,
                'text' => $kelas->mataPelajaran->name . '. Guru: ' . $kelas->guru->name,
            ];
        })->pluck('text', 'id')->toArray();
        $data['murid'] = Murid::get()->pluck('name', 'id');
        return $data;
    }

    public function store(array $input)
    {
        try {
            DB::beginTransaction();
            $murid = Nilai::create($input);
            DB::commit();

            return $murid;
        } catch (\Exception $e) {
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Nilai::class;
    }
}
