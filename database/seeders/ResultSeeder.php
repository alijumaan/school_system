<?php

namespace Database\Seeders;

use App\Models\Exam;
use App\Models\Result;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Result::create([
           'exam_id' => Exam::first()->id,
           'student_id' => User::first()->id,
           'score' => 90,
        ]);
    }
}
