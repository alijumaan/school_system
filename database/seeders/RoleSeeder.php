<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::firstOrCreate([
            'id' => RoleEnum::ADMIN->value,
            'name' => RoleEnum::ADMIN->name,
        ]);
        Role::firstOrCreate([
            'id' => RoleEnum::TEACHER->value,
            'name' => RoleEnum::TEACHER->name,
        ]);
        Role::firstOrCreate([
            'id' => RoleEnum::STUDENT->value,
            'name' => RoleEnum::STUDENT->name,
        ]);
        Role::firstOrCreate([
            'id' => RoleEnum::PARENT->value,
            'name' => RoleEnum::PARENT->name,
        ]);
        Role::firstOrCreate([
            'id' => RoleEnum::SUPERVISOR->value,
            'name' => RoleEnum::SUPERVISOR->name,
        ]);
    }
}
