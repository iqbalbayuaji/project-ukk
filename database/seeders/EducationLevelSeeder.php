<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            ['level' => 'SD', 'created_at' => now(), 'updated_at' => now()],
            ['level' => 'SMP', 'created_at' => now(), 'updated_at' => now()],
            ['level' => 'SMA', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('education_levels')->insert($levels);
    }
}
