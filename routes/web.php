<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

// Route untuk Dashboard - menggunakan Controller untuk ambil data dari database
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


// Route untuk Data Siswa - menggunakan Controller
Route::get('/data-siswa', [StudentController::class, 'index'])->name('data-siswa');
Route::put('/data-siswa/{id}', [StudentController::class, 'update'])->name('data-siswa.update');
Route::delete('/data-siswa/{id}', [StudentController::class, 'destroy'])->name('data-siswa.destroy');
