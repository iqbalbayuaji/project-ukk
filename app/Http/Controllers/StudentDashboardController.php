<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StudentDashboardController extends Controller
{
    public function index()
    {
        // Set locale Carbon ke Indonesia
        Carbon::setLocale('id');

        // 1. DATA SISWA (Mock Data / Ambil dari Auth nanti)
        // Nanti bisa diganti: $student = auth()->user();
        $student = (object) [
            'name' => 'Ahmad Rizki',
            'class' => '12B',
            'nis' => '12345678',
            'attendance_percentage' => 95,
            'assignments_completed' => 12,
            'assignments_total' => 15
        ];

        // 2. JADWAL HARI INI (Mock Data)
        // Simulasi jadwal hari ini
        $todaySchedule = [
            [
                'time' => '07:00 - 08:30',
                'subject' => 'Matematika Wajib',
                'teacher' => 'Budi Santoso, S.Pd',
                'room' => 'R. 101',
                'status' => 'Selesai',
                'color' => 'green'
            ],
            [
                'time' => '08:30 - 10:00',
                'subject' => 'Bahasa Indonesia',
                'teacher' => 'Siti Aminah, M.Pd',
                'room' => 'R. 101',
                'status' => 'Berlangsung',
                'color' => 'blue'
            ],
            [
                'time' => '10:15 - 11:45',
                'subject' => 'Fisika',
                'teacher' => 'Dr. Rahmat Hidayat',
                'room' => 'Lab Fisika',
                'status' => 'Mendatang',
                'color' => 'gray'
            ],
            [
                'time' => '12:30 - 14:00',
                'subject' => 'Bahasa Inggris',
                'teacher' => 'Sarah Johnson, B.Ed',
                'room' => 'R. 101',
                'status' => 'Mendatang',
                'color' => 'gray'
            ]
        ];

        // 3. PENGUMUMAN (Mock Data)
        $announcements = [
            [
                'title' => 'Libur Nasional',
                'date' => '25 Nov 2025',
                'content' => 'Sekolah diliburkan dalam rangka Hari Guru Nasional.',
                'type' => 'info' // info, warning, danger
            ],
            [
                'title' => 'Ujian Tengah Semester',
                'date' => '01 Des 2025',
                'content' => 'Jadwal UTS akan dimulai minggu depan. Harap persiapkan diri.',
                'type' => 'warning'
            ]
        ];

        // 4. TUGAS (Mock Data)
        $assignments = [
            [
                'subject' => 'Matematika',
                'title' => 'Latihan Soal Integral',
                'deadline' => 'Besok, 23:59',
                'status' => 'Belum',
                'priority' => 'high'
            ],
            [
                'subject' => 'Fisika',
                'title' => 'Laporan Praktikum',
                'deadline' => '26 Nov, 12:00',
                'status' => 'Proses',
                'priority' => 'medium'
            ]
        ];

        return view('dashboard-siswa', compact(
            'student',
            'todaySchedule',
            'announcements',
            'assignments'
        ));
    }
}
