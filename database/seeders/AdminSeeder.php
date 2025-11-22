<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'name' => 'Admin Utama',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Admin Akademik',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Admin Keuangan',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        DB::table('admin')->insert($admins);
    }
}
