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
            'short_name' => 'math',
            'description' => '',
        ]);

        Lesson::create([
            'title' => 'Computer science',
            'short_name' => 'CS',
            'description' => '',
        ]);
    }
}
