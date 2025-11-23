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
                'competencies_package' => 'Paket 1', // Kuota 1 Mapel
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'competencies_package' => 'Paket 2', // Kuota 2 Mapel
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'competencies_package' => 'Paket 3', // Kuota 3 Mapel
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'competencies_package' => 'Paket 4', // Kuota 4 Mapel
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'competencies_package' => 'Paket 5', // Kuota 5 Mapel
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        DB::table('competency')->insert($competencies);
    }
}
