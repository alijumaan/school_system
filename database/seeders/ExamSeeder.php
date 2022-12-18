<?php

namespace Database\Seeders;

use App\Models\Classes;
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
        Exam::create([
            'class_id' => Classes::first()->id
        ]);
    }
}
