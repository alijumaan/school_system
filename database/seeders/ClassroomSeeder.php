<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\Classroom;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classroom1 = Classroom::create([
            'name' => 'Lap 1',
            'lesson_id' => Lesson::first()->id,
            'teacher_id' => User::where('role_id', RoleEnum::TEACHER->value)->first()->id,
            'location' => 'Floor one room NO.4'
        ]);

        $classroom2 = Classroom::create([
            'name' => 'Computer Lap',
            'lesson_id' => Lesson::first()->id,
            'teacher_id' => User::where('role_id', RoleEnum::TEACHER->value)->first()->id,
            'location' => 'Floor two room NO.13'
        ]);

        $studentId = User::where('role_id', RoleEnum::STUDENT->value)->first()->id;

        $classroom1->users()->attach($studentId);
        $classroom2->users()->attach($studentId);
    }
}
