<?php

namespace App\Repositories;

use App\Models\Murid;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class MedicineRepository
 *
 * @version February 12, 2020, 11:00 am UTC
 */
class MuridRepository extends BaseRepository
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
        $muridArray = Arr::only($input, ['name', 'tanggal_lahir', 'gender', 'phone']);
        try {
            DB::beginTransaction();
            $input['email'] = setEmailLowerCase($input['email']);
            $input['status'] = (isset($input['status'])) ? 1 : 0;
            $input['password'] = Hash::make($input['password']);
            $input['type'] = User::PATIENT;
            $input['first_name'] = $input['name'];
            $input['last_name'] = '';
            $input['type'] = 3;
            $input['status'] = 3;
            $input['email_verified_at'] = Carbon::now();
            $murid = User::create($input);
            $murid->assignRole('patient');
            $murid->murid()->create($muridArray);
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
        return Murid::class;
    }
}
