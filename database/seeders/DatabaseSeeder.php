<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ClassYear;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            ClassYearSeeder::class,
            UserSeeder::class,
            LessonSeeder::class,
            ClassroomSeeder::class,
            ExamSeeder::class,
            ExamResultSeeder::class,
        ]);
    }
}
