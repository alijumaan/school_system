<?php

namespace Database\Seeders;

use App\Models\Exam;
use App\Models\ExamResult;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExamResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i<=Exam::count(); $i++) {
            ExamResult::create([
                'exam_id' => $i,
                'student_id' => User::student()->get()->random()->id,
                'score' => rand(77, 99),
            ]);
        }
    }
}
