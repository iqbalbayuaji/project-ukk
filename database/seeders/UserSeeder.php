<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Ahmad Rizki',
                'place_birth' => 'Jakarta',
                'date_birth' => '2008-05-15',
                'gender' => 'L',
                'NIS' => '2024001',
                'school' => 'SMA Negeri 1 Jakarta',
                'address' => 'Jl. Sudirman No. 123, Jakarta',
                'phone_number_user' => 81234567890,
                'phone_number_parent' => 81234567891,
                'education_levels_id' => 3, // SMA
                'school_grades_id' => 10, // Grade 10
                'class_id' => 1,
                'competency_id' => 1, // Matematika
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Siti Nurhaliza',
                'place_birth' => 'Bandung',
                'date_birth' => '2009-08-20',
                'gender' => 'P',
                'NIS' => '2024002',
                'school' => 'SMA Negeri 3 Bandung',
                'address' => 'Jl. Asia Afrika No. 45, Bandung',
                'phone_number_user' => 82234567890,
                'phone_number_parent' => 82234567891,
                'education_levels_id' => 3, // SMA
                'school_grades_id' => 11, // Grade 11
                'class_id' => 2,
                'competency_id' => 2, // Bahasa Indonesia
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Budi Santoso',
                'place_birth' => 'Surabaya',
                'date_birth' => '2007-12-10',
                'gender' => 'L',
                'NIS' => '2024003',
                'school' => 'SMA Negeri 5 Surabaya',
                'address' => 'Jl. Pemuda No. 67, Surabaya',
                'phone_number_user' => 83234567890,
                'phone_number_parent' => 83234567891,
                'education_levels_id' => 3, // SMA
                'school_grades_id' => 12, // Grade 12
                'class_id' => 3,
                'competency_id' => 3, // Bahasa Inggris
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Dewi Lestari',
                'place_birth' => 'Yogyakarta',
                'date_birth' => '2010-03-25',
                'gender' => 'P',
                'NIS' => '2024004',
                'school' => 'SMP Negeri 2 Yogyakarta',
                'address' => 'Jl. Malioboro No. 89, Yogyakarta',
                'phone_number_user' => 84234567890,
                'phone_number_parent' => 84234567891,
                'education_levels_id' => 2, // SMP
                'school_grades_id' => 9, // Grade 9
                'class_id' => 4,
                'competency_id' => 4, // IPA
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Eko Prasetyo',
                'place_birth' => 'Semarang',
                'date_birth' => '2011-07-18',
                'gender' => 'L',
                'NIS' => '2024005',
                'school' => 'SMP Negeri 4 Semarang',
                'address' => 'Jl. Pandanaran No. 12, Semarang',
                'phone_number_user' => 85234567890,
                'phone_number_parent' => 85234567891,
                'education_levels_id' => 2, // SMP
                'school_grades_id' => 8, // Grade 8
                'class_id' => 5,
                'competency_id' => 5, // IPS
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Fitri Handayani',
                'place_birth' => 'Medan',
                'date_birth' => '2012-11-05',
                'gender' => 'P',
                'NIS' => '2024006',
                'school' => 'SMP Negeri 1 Medan',
                'address' => 'Jl. Gatot Subroto No. 34, Medan',
                'phone_number_user' => 86234567890,
                'phone_number_parent' => 86234567891,
                'education_levels_id' => 2, // SMP
                'school_grades_id' => 7, // Grade 7
                'class_id' => null,
                'competency_id' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        DB::table('users')->insert($users);
    }
}
