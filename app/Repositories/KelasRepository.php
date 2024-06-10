<?php

namespace App\Repositories;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class MedicineRepository
 *
 * @version February 12, 2020, 11:00 am UTC
 */
class KelasRepository extends BaseRepository
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

    public function getDataGuruPelajaran(): array
    {
        $data['gurus'] = Guru::get()->pluck('name', 'id');
        $data['pelajaran'] = MataPelajaran::get()->pluck('name', 'id');
        return $data;
    }

    public function store(array $input)
    {
        try {
            DB::beginTransaction();
            $murid = Kelas::create($input);
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
        return Kelas::class;
    }
}
