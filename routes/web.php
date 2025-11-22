<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

// Route untuk Data Siswa - menggunakan Controller
Route::get('/data-siswa', [StudentController::class, 'index'])->name('data-siswa');
