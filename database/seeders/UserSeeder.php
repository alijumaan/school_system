<?php

namespace Database\Seeders;

use App\Enums\ClassYearEnum;
use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'full_name' => 'Admin',
            'phone' => '0566207808',
            'national_id' => 123456789,
            'email' => 'admin@admin.com',
            'class_year_id' => null,
            'birth_date' => '20-12-1988',
            'age' => rand(10, 35),
            'role_id' => RoleEnum::ADMIN->value,
            'email_verified_at' => now(),
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(10),
        ]);

        User::factory(10)->create(['class_year_id' => ClassYearEnum::FIRST->value]);
        User::factory(10)->create(['class_year_id' => ClassYearEnum::SECONDE->value]);
        User::factory(10)->create(['class_year_id' => ClassYearEnum::THIRD->value]);
        User::factory(5)->create(['role_id' => RoleEnum::TEACHER->value]);
        User::factory(30)->create(['role_id' => RoleEnum::PARENT->value]);
    }
}
