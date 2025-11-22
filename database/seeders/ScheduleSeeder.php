<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schedules = [
            [
                'lesson_id' => 1, // Matematika
                'start_time' => '08:00:00',
                'end_time' => '10:00:00',
                'room_id' => 1,
                'day_of_week' => 'Senin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'lesson_id' => 2, // Bahasa Indonesia
                'start_time' => '10:30:00',
                'end_time' => '12:30:00',
                'room_id' => 2,
                'day_of_week' => 'Selasa',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'lesson_id' => 3, // Bahasa Inggris
                'start_time' => '13:00:00',
                'end_time' => '15:00:00',
                'room_id' => 3,
                'day_of_week' => 'Rabu',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'lesson_id' => 7, // IPA
                'start_time' => '15:30:00',
                'end_time' => '17:30:00',
                'room_id' => 4,
                'day_of_week' => 'Kamis',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'lesson_id' => 8, // IPS
                'start_time' => '08:00:00',
                'end_time' => '10:00:00',
                'room_id' => 5,
                'day_of_week' => 'Jumat',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'lesson_id' => 4, // Fisika
                'start_time' => '10:30:00',
                'end_time' => '12:30:00',
                'room_id' => 1,
                'day_of_week' => 'Rabu',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'lesson_id' => 5, // Kimia
                'start_time' => '13:00:00',
                'end_time' => '15:00:00',
                'room_id' => 2,
                'day_of_week' => 'Jumat',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        DB::table('schedules')->insert($schedules);
    }
}
