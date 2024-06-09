<?php

namespace App\Repositories;

use App\Models\MataPelajaran;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class MedicineRepository
 *
 * @version February 12, 2020, 11:00 am UTC
 */
class MataPelajaranRepository extends BaseRepository
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

    public function store(array $input)
    {
        try {
            DB::beginTransaction();
            $murid = MataPelajaran::create($input);
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
        return MataPelajaran::class;
    }
}
