<?php

namespace Database\Seeders;

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
            'first_name' => 'Admin',
            'second_name' => '',
            'third_name' => '',
            'last_name' => '',
            'phone' => '+966566207808',
            'national_id' => 123456789,
            'email' => 'admin@admin.com',
            'birth_date' => '20-12-1988',
            'role_id' => RoleEnum::ADMIN->value,
            'email_verified_at' => now(),
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'first_name' => 'Teacher',
            'second_name' => '',
            'third_name' => '',
            'last_name' => '',
            'phone' => '+966512345678',
            'national_id' => 345637891,
            'email' => 'teacher@teacher.com',
            'birth_date' => '11-09-1990',
            'role_id' => RoleEnum::TEACHER->value,
            'email_verified_at' => now(),
            'password' => bcrypt('teacher'),
        ]);

        User::create([
            'first_name' => 'Student',
            'second_name' => '',
            'third_name' => '',
            'last_name' => '',
            'phone' => '+966587654321',
            'national_id' => 897223098,
            'email' => 'student@student.com',
            'birth_date' => '06-04-2001',
            'role_id' => RoleEnum::STUDENT->value,
            'email_verified_at' => now(),
            'password' => bcrypt('student'),
        ]);
    }
}
