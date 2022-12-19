<?php

namespace Database\Seeders;

use App\Models\Classes;
use App\Models\Classroom;
use App\Models\Exam;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=1; $i<=Classroom::count(); $i++) {
            Exam::create([
                'classroom_id' => $i
            ]);
        }
    }
}
