<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed in order to respect foreign key constraints
        
        // 1. Independent tables first
        $this->call([
            EducationLevelSeeder::class,
            SchoolGradeSeeder::class,
            LessonSeeder::class,         // Must be before CompetencySeeder and ScheduleSeeder
            CompetencySeeder::class,
            RoomSeeder::class,
            AdminSeeder::class,
        ]);

        // 2. Tables with dependencies
        $this->call([
            ScheduleSeeder::class,  // depends on room and lessons
            ClassSeeder::class,      // depends on schedules
            UserSeeder::class,       // depends on education_levels, school_grades, class, competency
        ]);
    }
}
