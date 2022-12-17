<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Classroom::create([
            'name' => 'Lap 1',
            'location' => 'Floor one'
        ]);

        Classroom::create([
            'name' => 'Lap 2',
            'location' => 'Floor two'
        ]);
    }
}
