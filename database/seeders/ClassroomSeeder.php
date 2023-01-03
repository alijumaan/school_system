<?php

namespace Database\Seeders;

use App\Enums\ClassYearEnum;
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
        $firstClassYearStudentCount = User::student()
            ->where('class_year_id', ClassYearEnum::FIRST->value)
            ->count();

        for ($i=1; $i <= $firstClassYearStudentCount; $i++) {
            $classroom = Classroom::create([
                'name_en' => 'Lap '.$i,
                'name_ar' => 'الفصل  '.$i,
                'lesson_id' => Lesson::all()->random()->id,
                'teacher_id' => User::teacher()->get()->random()->id,
                'class_year_id' => ClassYearEnum::FIRST->value,
                'location' => 'Floor '.$i.' room NO.'.$i
            ]);

            $studentId = User::student()
                ->where('class_year_id', ClassYearEnum::FIRST->value)
                ->get()
                ->random()
                ->id;

            $classroom->students()->attach($studentId);
        }
    }
}
