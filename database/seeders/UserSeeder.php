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
            'full_name' => 'ادمن',
            'phone' => '0566207808',
            'national_id' => 123456789,
            'email' => 'admin@admin.com',
            'class' => '',
            'birth_date' => '20-12-1988',
            'age' => rand(10, 35),
            'role_id' => RoleEnum::ADMIN->value,
            'email_verified_at' => now(),
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(10),
        ]);

        User::factory(50)->create(['class' => 'اول ثانوي']);
        User::factory(50)->create(['class' => 'ثاني ثانوي']);
        User::factory(50)->create(['class' => 'ثالث ثانوي']);
        User::factory(10)->create(['role_id' => RoleEnum::TEACHER->value]);
        User::factory(150)->create(['role_id' => RoleEnum::PARENT->value]);
    }
}
