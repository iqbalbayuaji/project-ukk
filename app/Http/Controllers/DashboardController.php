<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * TUTORIAL: Cara Menampilkan Data dari Database
 * 
 * Controller ini adalah contoh bagaimana mengambil data dari database
 * dan mengirimkannya ke view (halaman) untuk ditampilkan.
 */
class DashboardController extends Controller
{
    /**
     * STEP 1: Method untuk menampilkan halaman dashboard
     * 
     * Method ini akan:
     * 1. Mengambil data dari database
     * 2. Menghitung statistik
     * 3. Mengirim data ke view
     */
    public function index()
    {
        // ========================================
        // CARA 1: Menghitung Total Data
        // ========================================
        // DB::table('nama_tabel') = memilih tabel yang ingin diakses
        // ->count() = menghitung jumlah baris/data
        
        $totalSiswa = DB::table('users')->count();
        
        // Contoh menghitung dengan kondisi WHERE
        // $totalSiswaAktif = DB::table('users')->where('status', 'aktif')->count();
        
        
        // ========================================
        // CARA 2: Mengambil Data dengan JOIN
        // ========================================
        // JOIN digunakan untuk menggabungkan data dari beberapa tabel
        
        // Ambil 5 siswa terbaru dengan informasi lengkap
        $siswaTerbaru = DB::table('users')
            // LEFT JOIN = ambil semua data dari tabel kiri (users)
            // meskipun tidak ada data yang cocok di tabel kanan (class)
            ->leftJoin('class', 'users.class_id', '=', 'class.id')
            ->leftJoin('education_levels', 'users.education_levels_id', '=', 'education_levels.id')
            ->leftJoin('school_grades', 'users.school_grades_id', '=', 'school_grades.id')
            
            // SELECT = pilih kolom yang ingin ditampilkan
            ->select(
                'users.id',
                'users.name',
                'users.NIS',
                'class.clases as class_name',           // 'as' = alias/nama pengganti
                'education_levels.level as jenjang',
                'school_grades.grade as tingkat'
            )
            
            // ORDER BY = urutkan data
            // DESC = descending (dari besar ke kecil / terbaru ke terlama)
            // ASC = ascending (dari kecil ke besar / terlama ke terbaru)
            ->orderBy('users.id', 'DESC')
            
            // LIMIT = batasi jumlah data yang diambil
            ->limit(5)
            
            // GET = eksekusi query dan ambil hasilnya
            ->get();
        
        
        // ========================================
        // CARA 3: Mengambil Data Sederhana
        // ========================================
        // Untuk data yang tidak perlu JOIN
        
        $totalKelas = DB::table('class')->count();
        
        
        // ========================================
        // CARA 4: Menghitung dengan Kondisi
        // ========================================
        // WHERE = filter data berdasarkan kondisi
        
        // Contoh: hitung siswa berdasarkan jenjang
        $siswaSMA = DB::table('users')
            ->join('education_levels', 'users.education_levels_id', '=', 'education_levels.id')
            ->where('education_levels.level', 'SMA')
            ->count();
        
        
        // ========================================
        // STEP 2: Kirim Data ke View
        // ========================================
        // return view() = tampilkan file blade
        // 'dashboard' = nama file (dashboard.blade.php)
        // compact() = kirim variabel ke view
        
        return view('dashboard', compact(
            'totalSiswa',       // Variabel $totalSiswa bisa dipakai di blade
            'siswaTerbaru',    // Variabel $siswasTerbaru bisa dipakai di blade
            'totalKelas'        // Variabel $totalKelas bisa dipakai di blade
        ));
        
        // ALTERNATIF cara kirim data ke view:
        // return view('dashboard', [
        //     'totalSiswa' => $totalSiswa,
        //     'siswasTerbaru' => $siswasTerbaru,
        //     'totalKelas' => $totalKelas
        // ]);
    }
}
