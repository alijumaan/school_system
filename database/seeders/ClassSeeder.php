<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\Classes;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $studentId = User::where('role_id', RoleEnum::STUDENT->value)->first()->id;

        $class1 = Classes::create([
            'lesson_id' => Lesson::first()->id,
            'teacher_id' => User::where('role_id', RoleEnum::TEACHER->value)->first()->id,
        ]);

        $class1->users()->attach($studentId);

    }
}
