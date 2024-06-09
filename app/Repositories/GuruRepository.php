<?php

namespace App\Repositories;

use App\Models\Guru;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class MedicineRepository
 *
 * @version February 12, 2020, 11:00 am UTC
 */
class GuruRepository extends BaseRepository
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

    public function getDataDivisi(): array
    {
        $data['genders'] = [
            '1' => 'Laki-laki',
            '2' => 'Perempuan',
        ];
        return $data;
    }

    public function store(array $input)
    {
        try {
            DB::beginTransaction();
            $murid = Guru::create($input);
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
        return Guru::class;
    }
}
