<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentElectivesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua user yang punya paket kompetensi
        $users = DB::table('users')->whereNotNull('competency_id')->get();
        $lessons = DB::table('lessons')->pluck('id')->toArray();

        foreach ($users as $user) {
            // Ambil info paket
            $package = DB::table('competency')->where('id', $user->competency_id)->first();
            
            if ($package) {
                // Parse kuota dari nama paket (misal "Paket 3" -> 3)
                $quota = (int) filter_var($package->competencies_package, FILTER_SANITIZE_NUMBER_INT);
                
                if ($quota > 0 && count($lessons) >= $quota) {
                    // Ambil mapel acak sejumlah kuota
                    $randomLessons = array_rand(array_flip($lessons), $quota);
                    
                    // Jika cuma 1, array_rand return integer/string, bukan array
                    if (!is_array($randomLessons)) {
                        $randomLessons = [$randomLessons];
                    }

                    foreach ($randomLessons as $lessonId) {
                        DB::table('student_electives')->insert([
                            'user_id' => $user->id,
                            'lesson_id' => $lessonId,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                }
            }
        }
    }
}
