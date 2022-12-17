<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\Semester;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Semester::create([
            'lesson_id' => Lesson::first()->id,
            'teacher_id' => User::first()->id,
        ]);
    }
}
