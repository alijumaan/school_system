<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lesson::create([
            'title' => 'Mathematics',
            'short_name' => 'MATH',
            'description' => '',
        ]);

        Lesson::create([
            'title' => 'Computer science',
            'short_name' => 'CP',
            'description' => '',
        ]);

        Lesson::create([
            'title' => 'Chemistry science',
            'short_name' => 'CHEM',
            'description' => '',
        ]);

        Lesson::create([
            'title' => 'Physics science',
            'short_name' => 'PHYS',
            'description' => '',
        ]);

        Lesson::create([
            'title' => 'Biology science',
            'short_name' => 'BIO',
            'description' => '',
        ]);
    }
}
