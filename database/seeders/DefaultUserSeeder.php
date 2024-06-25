<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Specialization;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'contact' => '1234567890',
                'gender' => User::MALE,
                'type' => User::ADMIN,
                'email' => 'admin@politani.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('123456'),
                'region_code' => '91',
            ],
        ];
        foreach ($users as $key => $user) {
            $user = User::create($user);
        }
    }
}
