<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Menampilkan halaman data siswa dengan fitur search dan filter
     * 
     * PENJELASAN:
     * Method ini akan:
     * 1. Mengambil data siswa dari database
     * 2. Menerapkan filter berdasarkan parameter yang dikirim
     * 3. Menerapkan pencarian
     * 4. Mengurutkan data
     * 5. Membagi data menjadi halaman-halaman (pagination)
     */
    public function index(Request $request)
    {
        // STEP 1: Mulai query untuk mengambil data dari tabel 'users'
        // DB::table('users') = memulai query ke tabel users
        // select() = memilih kolom-kolom yang ingin ditampilkan
        $query = DB::table('users')
            // LEFT JOIN dengan tabel class agar data kelas selalu tersedia
            ->leftJoin('class', 'users.class_id', '=', 'class.id')
            // LEFT JOIN dengan education_levels untuk mendapatkan nama jenjang
            ->leftJoin('education_levels', 'users.education_levels_id', '=', 'education_levels.id')
            // LEFT JOIN dengan school_grades untuk mendapatkan tingkat kelas
            ->leftJoin('school_grades', 'users.school_grades_id', '=', 'school_grades.id')
            // LEFT JOIN dengan competency untuk mendapatkan paket kompetensi
            ->leftJoin('competency', 'users.competency_id', '=', 'competency.id')
            ->select(
                'users.id',                             // ID siswa
                'users.name',                           // Nama siswa
                'users.NIS',                            // NIS siswa
                'users.place_birth',                    // Tempat lahir
                'users.date_birth',                     // Tanggal lahir
                'users.gender',                         // Jenis kelamin (L/P)
                'users.school',                         // Nama sekolah
                'users.address',                        // Alamat siswa
                'users.phone_number_user',              // Nomor telepon siswa
                'users.phone_number_parent',            // Nomor telepon orang tua
                'users.class_id',                       // ID kelas (foreign key)
                'users.education_levels_id',            // ID jenjang pendidikan
                'users.school_grades_id',               // ID tingkat kelas
                'users.competency_id',                  // ID paket kompetensi
                'class.clases as class_name',           // Nama kelas bimbel
                'education_levels.level as jenjang',    // Nama jenjang (SD/SMP/SMA)
                'school_grades.grade as tingkat',       // Tingkat kelas (10/11/12)
                'competency.competencies_package as paket', // Nama paket kompetensi
                // Subquery untuk mengambil mapel pilihan (comma separated)
                DB::raw('(SELECT GROUP_CONCAT(lessons.name SEPARATOR ", ") 
                          FROM student_electives 
                          JOIN lessons ON student_electives.lesson_id = lessons.id 
                          WHERE student_electives.user_id = users.id) as mapel_pilihan')
            );

        // STEP 2: FILTER BERDASARKAN PENCARIAN (SEARCH)
        // $request->filled('search') = mengecek apakah parameter 'search' ada dan tidak kosong
        if ($request->filled('search')) {
            $searchTerm = $request->search;  // Ambil kata kunci pencarian
            
            // where() dengan closure = membuat grup kondisi OR
            // Artinya: cari di kolom name ATAU NIS ATAU phone_number_user
            $query->where(function($q) use ($searchTerm) {
                $q->where('users.name', 'LIKE', "%{$searchTerm}%")                 // Cari di nama
                  ->orWhere('users.NIS', 'LIKE', "%{$searchTerm}%");                // ATAU di NIS
            });
        }

        // STEP 3: FILTER BERDASARKAN KELAS BIMBEL
        // Contoh: jika user pilih "10A", hanya tampilkan siswa kelas 10A
        if ($request->filled('class_bimbel')) {
            // Filter berdasarkan kelas (JOIN sudah dilakukan di atas)
            $query->where('class.clases', $request->class_bimbel);
        }

        // STEP 4: FILTER BERDASARKAN JENJANG (SD/SMP/SMA)
        if ($request->filled('jenjang')) {
            // Join dengan tabel 'education_levels' untuk filter jenjang
            $query->join('education_levels', 'users.education_levels_id', '=', 'education_levels.id')
                  ->where('education_levels.education_level', $request->jenjang)
                  ->addSelect('education_levels.education_level as jenjang_name');
        }

        // STEP 5: FILTER BERDASARKAN TINGKAT (10/11/12)
        if ($request->filled('tingkat')) {
            // Join dengan tabel 'school_grades' untuk filter tingkat
            $query->join('school_grades', 'users.school_grades_id', '=', 'school_grades.id')
                  ->where('school_grades.school_grade', $request->tingkat)
                  ->addSelect('school_grades.school_grade as tingkat_name');
        }

        // STEP 6: SORTING (PENGURUTAN DATA)
        // Default: urutkan berdasarkan ID terbaru (DESC = descending = dari besar ke kecil)
        $sortBy = $request->get('sort', 'newest');  // Ambil parameter sort, default 'newest'
        
        switch ($sortBy) {
            case 'oldest':
                $query->orderBy('users.id', 'ASC');      // Terlama: ID kecil ke besar
                break;
            case 'name-asc':
                $query->orderBy('users.name', 'ASC');    // Nama A-Z
                break;
            case 'name-desc':
                $query->orderBy('users.name', 'DESC');   // Nama Z-A
                break;
            default: // 'newest'
                $query->orderBy('users.id', 'DESC');     // Terbaru: ID besar ke kecil
                break;
        }

        // STEP 7: PAGINATION
        // paginate(10) = ambil 10 data per halaman
        // withQueryString() = pertahankan parameter URL (search, filter) saat pindah halaman
        $students = $query->paginate(10)->withQueryString();

        // STEP 8: AMBIL DATA UNTUK DROPDOWN FILTER
        // Kita perlu data kelas, jenjang, dan tingkat untuk ditampilkan di dropdown
        
        // Ambil semua kelas yang unik (distinct)
        // PENTING: Field adalah 'clases' bukan 'class'
        // Tambahkan 'id' untuk keperluan edit
        $classes = DB::table('class')
            ->select('id', 'clases')
            ->distinct()
            ->orderBy('clases')
            ->get();

        // Ambil semua jenjang pendidikan dengan ID
        $educationLevels = DB::table('education_levels')
            ->select('id', 'level')
            ->get();

        // Ambil semua tingkat kelas dengan ID
        $schoolGrades = DB::table('school_grades')
            ->select('id', 'grade')
            ->orderBy('grade')
            ->get();

        // STEP 9: KIRIM DATA KE VIEW
        // return view() = tampilkan file blade
        // compact() = kirim variabel ke view
        return view('data-siswa', compact(
            'students',           // Data siswa (sudah di-filter dan di-paginate)
            'classes',            // Data kelas untuk dropdown
            'educationLevels',    // Data jenjang untuk dropdown
            'schoolGrades'        // Data tingkat untuk dropdown
        ));
    }

    /**
     * Update data siswa
     * 
     * PENJELASAN:
     * Method ini akan menerima data dari form edit dan mengupdate data siswa di database
     */
    public function update(Request $request, $id)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'NIS' => 'required|string|unique:users,NIS,' . $id,
            'place_birth' => 'required|string|max:255',
            'date_birth' => 'required|date',
            'gender' => 'required|in:L,P',
            'school' => 'required|string|max:255',
            'address' => 'required|string',
            'phone_number_user' => 'required|numeric',
            'phone_number_parent' => 'required|numeric',
            'class_id' => 'nullable|exists:class,id',
            'education_levels_id' => 'required|exists:education_levels,id',
            'school_grades_id' => 'required|exists:school_grades,id',
        ]);

        // Update data di database
        DB::table('users')
            ->where('id', $id)
            ->update($validated);

        // Redirect kembali dengan pesan sukses
        return redirect()->route('data-siswa')->with('success', 'Data siswa berhasil diupdate!');
    }

    /**
     * Hapus data siswa
     * 
     * PENJELASAN:
     * Method ini akan menghapus data siswa dari database berdasarkan ID
     */
    public function destroy($id)
    {
        // Hapus data siswa dari database
        DB::table('users')->where('id', $id)->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('data-siswa')->with('success', 'Data siswa berhasil dihapus!');
    }
}
