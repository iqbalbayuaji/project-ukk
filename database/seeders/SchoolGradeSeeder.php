<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolGradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grades = [];
        
        // Grades 1-12
        for ($i = 1; $i <= 12; $i++) {
            $grades[] = [
                'grade' => (string)$i,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        DB::table('school_grades')->insert($grades);
    }
}
