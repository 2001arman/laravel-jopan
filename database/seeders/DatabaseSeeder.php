<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $this->call(DefaultUserSeeder::class);
        $this->call(SettingTableSeeder::class);
        $this->call(DefaultPermissionSeeder::class);
        $this->call(DefaultRoleSeeder::class);
        $this->call(AddFieldsSettingTableSeeder::class);
        $this->call(AddEmailVerifiedFieldSettingTableSeeder::class);
        $this->call(DefaultAssignPermissionSeeder::class);

    }
}
