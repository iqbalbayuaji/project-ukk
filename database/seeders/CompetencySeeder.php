<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompetencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $competencies = [
            [
                'lesson_id' => 1, // Matematika
                'competencies_package' => 'Paket Matematika Dasar',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'lesson_id' => 2, // Bahasa Indonesia
                'competencies_package' => 'Paket Bahasa Indonesia Lengkap',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'lesson_id' => 3, // Bahasa Inggris
                'competencies_package' => 'Paket Bahasa Inggris Conversation',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'lesson_id' => 7, // IPA
                'competencies_package' => 'Paket IPA Terpadu',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'lesson_id' => 8, // IPS
                'competencies_package' => 'Paket IPS Komprehensif',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        DB::table('competency')->insert($competencies);
    }
}
