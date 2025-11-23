<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PendaftaranController extends Controller
{
    public function index()
    {
        // Ambil data master untuk dropdown
        $educationLevels = DB::table('education_levels')->get();
        $schoolGrades = DB::table('school_grades')->get();
        $classes = DB::table('class')->get();
        
        // Ambil Paket Kompetensi (Paket 1-5)
        // Kita ambil unique berdasarkan nama paket karena di seeder kita buat 5 paket
        $competencyPackages = DB::table('competency')
            ->select('id', 'competencies_package')
            ->get();

        // Ambil Semua Mapel untuk Pilihan
        $lessons = DB::table('lessons')->get();

        return view('pendaftaran', compact(
            'educationLevels',
            'schoolGrades',
            'classes',
            'competencyPackages',
            'lessons'
        ));
    }

    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            // Data Diri
            'name' => 'required|string|max:255',
            'place_birth' => 'required|string|max:255',
            'date_birth' => 'required|date',
            'gender' => 'required|in:L,P',
            'NIS' => 'required|string|unique:users,NIS',
            'address' => 'required|string',
            
            // Sekolah
            'school' => 'required|string|max:255',
            'education_levels_id' => 'required|exists:education_levels,id',
            'school_grades_id' => 'required|exists:school_grades,id',
            'class_id' => 'nullable|exists:class,id', // Bisa null jika belum ada kelas bimbel
            
            // Kontak
            'phone_number_user' => 'required|numeric',
            'phone_number_parent' => 'required|numeric',
            
            // Paket & Mapel
            'competency_id' => 'required|exists:competency,id',
            'electives' => 'array', // Array ID mapel pilihan
            'electives.*' => 'exists:lessons,id',
        ]);

        // 2. Cek Validasi Kuota Mapel (Server Side Validation)
        // Ambil paket yang dipilih untuk tahu kuotanya
        $selectedPackage = DB::table('competency')->where('id', $request->competency_id)->first();
        
        // Asumsi nama paket formatnya "Paket X" dimana X adalah jumlah kuota
        // Kita ambil angka dari string "Paket 3" -> 3
        $quota = (int) filter_var($selectedPackage->competencies_package, FILTER_SANITIZE_NUMBER_INT);
        
        if (count($request->electives ?? []) > $quota) {
            return back()->withErrors(['electives' => "Anda memilih terlalu banyak mapel. Paket ini hanya mengizinkan $quota mapel."])->withInput();
        }

        // 3. Simpan Data Siswa
        DB::beginTransaction();
        try {
            $userId = DB::table('users')->insertGetId([
                'name' => $request->name,
                'place_birth' => $request->place_birth,
                'date_birth' => $request->date_birth,
                'gender' => $request->gender,
                'NIS' => $request->NIS,
                'school' => $request->school,
                'address' => $request->address,
                'phone_number_user' => $request->phone_number_user,
                'phone_number_parent' => $request->phone_number_parent,
                'education_levels_id' => $request->education_levels_id,
                'school_grades_id' => $request->school_grades_id,
                'class_id' => $request->class_id,
                'competency_id' => $request->competency_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // 4. Simpan Mapel Pilihan (ke tabel pivot student_electives)
            if ($request->has('electives')) {
                $electivesData = [];
                foreach ($request->electives as $lessonId) {
                    $electivesData[] = [
                        'user_id' => $userId,
                        'lesson_id' => $lessonId,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
                DB::table('student_electives')->insert($electivesData);
            }

            DB::commit();

            return redirect()->route('login')->with('success', 'Pendaftaran berhasil! Silakan login.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage()])->withInput();
        }
    }
}
