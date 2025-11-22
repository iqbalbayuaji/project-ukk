<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rooms = [
            ['room' => 'Ruang A1', 'is_occupied' => false, 'created_at' => now(), 'updated_at' => now()],
            ['room' => 'Ruang A2', 'is_occupied' => false, 'created_at' => now(), 'updated_at' => now()],
            ['room' => 'Ruang B1', 'is_occupied' => false, 'created_at' => now(), 'updated_at' => now()],
            ['room' => 'Ruang B2', 'is_occupied' => false, 'created_at' => now(), 'updated_at' => now()],
            ['room' => 'Ruang C1', 'is_occupied' => true, 'created_at' => now(), 'updated_at' => now()],
            ['room' => 'Ruang C2', 'is_occupied' => false, 'created_at' => now(), 'updated_at' => now()],
            ['room' => 'Lab Komputer', 'is_occupied' => false, 'created_at' => now(), 'updated_at' => now()],
            ['room' => 'Ruang Multimedia', 'is_occupied' => false, 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('room')->insert($rooms);
    }
}
