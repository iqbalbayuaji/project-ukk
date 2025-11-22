<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lessons = [
            [
                'name' => 'Matematika',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Bahasa Indonesia',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Bahasa Inggris',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Fisika',
                'created_at' => now(),
                'updated_at' => now()
            ],
           [
                'name' => 'Kimia',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Biologi',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'IPA',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'IPS',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        DB::table('lessons')->insert($lessons);
    }
}
