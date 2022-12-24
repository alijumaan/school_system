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
            'title_en' => 'Mathematics',
            'title_ar' => 'الرياضيات',
            'short_name' => 'MATH',
            'description_en' => '',
            'description_ar' => '',
        ]);

        Lesson::create([
            'title_en' => 'Computer science',
            'title_ar' => 'علوم الكومبيوتر',
            'short_name' => 'CP',
            'description_en' => '',
            'description_ar' => '',
        ]);

        Lesson::create([
            'title_en' => 'Chemistry science',
            'title_ar' => 'علوم الكيمياء',
            'short_name' => 'CHEM',
            'description_en' => '',
            'description_ar' => '',
        ]);

        Lesson::create([
            'title_en' => 'Physics science',
            'title_ar' => 'علوم الفيزياء',
            'short_name' => 'PHYS',
            'description_en' => '',
            'description_ar' => '',
        ]);

        Lesson::create([
            'title_en' => 'Biology science',
            'title_ar' => 'علم الأحياء',
            'short_name' => 'BIO',
            'description_en' => '',
            'description_ar' => '',
        ]);
    }
}
