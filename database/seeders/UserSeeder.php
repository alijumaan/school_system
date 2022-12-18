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
            'full_name' => 'Admin',
            'phone' => '+966566207808',
            'national_id' => 123456789,
            'email' => 'admin@admin.com',
            'birth_date' => '20-12-1988',
            'age' => rand(10, 35),
            'role_id' => RoleEnum::ADMIN->value,
            'email_verified_at' => now(),
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'full_name' => 'Teacher',
            'phone' => '+966512345678',
            'national_id' => 345637891,
            'email' => 'teacher@teacher.com',
            'birth_date' => '11-09-1990',
            'age' => rand(10, 35),
            'role_id' => RoleEnum::TEACHER->value,
            'email_verified_at' => now(),
            'password' => bcrypt('teacher'),
        ]);

        User::create([
            'full_name' => 'Student',
            'phone' => '+966587654321',
            'national_id' => 897223098,
            'email' => 'student@student.com',
            'birth_date' => '06-04-2001',
            'age' => rand(10, 35),
            'role_id' => RoleEnum::STUDENT->value,
            'email_verified_at' => now(),
            'password' => bcrypt('student'),
        ]);

        User::create([
            'full_name' => 'Parent',
            'phone' => '+966587654563',
            'national_id' => 894223498,
            'email' => 'parent@parent.com',
            'birth_date' => '05-05-1987',
            'age' => rand(10, 35),
            'role_id' => RoleEnum::PARENT->value,
            'email_verified_at' => now(),
            'password' => bcrypt('parent'),
        ]);
    }
}
