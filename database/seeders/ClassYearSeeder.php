<?php

namespace Database\Seeders;

use App\Models\ClassYear;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClassYear::create([
            'title_ar' => 'أول ثانوي',
            'title_en' => 'First school',
        ]);
        ClassYear::create([
            'title_ar' => 'ثاني ثانوي',
            'title_en' => 'Secondary school',
        ]);
        ClassYear::create([
            'title_ar' => 'ثالث ثانوي',
            'title_en' => 'Third school',
        ]);
    }
}
