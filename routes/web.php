<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

// Route untuk Dashboard - menggunakan Controller untuk ambil data dari database
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


// Route untuk Data Siswa - menggunakan Controller
Route::get('/data-siswa', [StudentController::class, 'index'])->name('data-siswa');
Route::put('/data-siswa/{id}', [StudentController::class, 'update'])->name('data-siswa.update');
// Route untuk Dashboard Siswa
Route::get('/dashboard-siswa', [App\Http\Controllers\StudentDashboardController::class, 'index'])->name('dashboard-siswa');

// Route Pendaftaran Siswa
use App\Http\Controllers\PendaftaranController;
Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran.index');
Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
