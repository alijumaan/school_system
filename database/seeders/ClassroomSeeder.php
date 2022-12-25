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
        for ($i=1; $i <= User::student()->count(); $i++) {
            $classroom = Classroom::create([
                'name_en' => 'Lap '.$i,
                'name_ar' => 'الفصل  '.$i,
                'lesson_id' => Lesson::all()->random()->id,
                'teacher_id' => User::teacher()->get()->random()->id,
                'location' => 'Floor '.$i.' room NO.'.$i
            ]);

            $studentId = User::student()->get()->random()->id;

            $classroom->users()->attach($studentId);
        }
    }
}
