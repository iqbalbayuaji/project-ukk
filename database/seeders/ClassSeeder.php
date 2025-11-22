<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = [
            [
                'clases' => '10A',
                'grade' => '10',
                'schedules_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'clases' => '11B',
                'grade' => '11',
                'schedules_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'clases' => '12A',
                'grade' => '12',
                'schedules_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'clases' => '9C',
                'grade' => '9',
                'schedules_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'clases' => '8B',
                'grade' => '8',
                'schedules_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        DB::table('class')->insert($classes);
    }
}
