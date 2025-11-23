{{-- 
    PENJELASAN FILE INI:
    File ini adalah halaman Data Siswa yang menampilkan data dari database
    dengan fitur search, filter, dan pagination yang berfungsi.
    
    Data yang diterima dari Controller:
    - $students: Data siswa (sudah di-filter dan di-paginate)
    - $classes: Data kelas untuk dropdown
    - $educationLevels: Data jenjang untuk dropdown  
    - $schoolGrades: Data tingkat untuk dropdown
--}}

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa - BBT Academia</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=montserrat:400,500,600,700,800" rel="stylesheet" />
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 overflow-x-hidden">
    
    {{-- Mobile Navbar --}}
    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 sm:hidden">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start">
                    <button id="mobile-menu-toggle" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                        </svg>
                    </button>
                    <div class="flex items-center space-x-2 ml-2">
                        <div class="w-8 h-8 bg-white border-2 border-cyan-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <span class="text-lg font-bold text-gray-900">BBT Academia</span>
                    </div>
                </div>
                <div class="w-8 h-8 bg-gradient-to-br from-cyan-600 to-blue-600 rounded-full flex items-center justify-center text-white font-semibold flex-shrink-0">
                    A
                </div>
            </div>
        </div>
    </nav>

    {{-- Sidebar --}}
    <aside id="sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0">
        <div class="h-full px-3 py-6 overflow-y-auto bg-gradient-to-b from-cyan-600 to-blue-700">
            {{-- Logo --}}
            <div class="flex items-center space-x-3 mb-8 px-3">
                <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <span class="text-xl font-bold text-white">BBT Academia</span>
            </div>

            {{-- Navigation --}}
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="/dashboard" class="flex items-center p-3 text-white hover:bg-white/10 rounded-lg group transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/data-siswa" class="flex items-center p-3 text-white bg-white/20 rounded-lg group">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                        <span class="ml-3">Data Siswa</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-3 text-white hover:bg-white/10 rounded-lg group transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span class="ml-3">Jadwal</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-3 text-white hover:bg-white/10 rounded-lg group transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        <span class="ml-3">Kelas</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-3 text-white hover:bg-white/10 rounded-lg group transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                        <span class="ml-3">Pelajaran</span>
                    </a>
                </li>
            </ul>

            {{-- Logout Button --}}
            <div class="absolute bottom-6 left-3 right-3">
                <a href="/login" class="flex items-center p-3 text-white hover:bg-white/10 rounded-lg group transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    <span class="ml-3">Logout</span>
                </a>
            </div>
        </div>
    </aside>

    {{-- Main Content --}}
    <div class="p-3 sm:p-4 sm:ml-64 pt-20 sm:pt-4 max-w-full overflow-x-hidden">
        {{-- Header Section --}}
        <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 mb-2">Data Siswa</h1>
                    <p class="text-gray-600">Kelola data siswa yang terdaftar di BBT Academia</p>
                </div>
                <button class="px-6 py-3 bg-gradient-to-r from-cyan-600 to-blue-600 text-white rounded-lg hover:from-cyan-700 hover:to-blue-700 transition font-semibold shadow-lg shadow-cyan-500/30 flex items-center gap-2 justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Siswa
                </button>
            </div>
        </div>

        {{-- Success/Error Notification --}}
        @if(session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded-lg">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-green-700 font-semibold">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded-lg">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-red-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-red-700 font-semibold">{{ session('error') }}</p>
                </div>
            </div>
        @endif

        {{-- 
            FORM SEARCH & FILTER
            Form ini menggunakan method GET agar parameter bisa dilihat di URL
            dan bisa di-bookmark oleh user
        --}}
        <form method="GET" action="{{ route('data-siswa') }}" class="bg-white rounded-xl sm:rounded-2xl shadow-sm p-4 sm:p-6 border border-gray-100 mb-6">
            {{-- Search Bar --}}
            <div class="mb-4">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    {{-- 
                        Input search dengan name="search"
                        value="{{ request('search') }}" = mempertahankan nilai search saat reload
                    --}}
                    <input 
                        type="text" 
                        name="search"
                        value="{{ request('search') }}"
                        class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500" 
                        placeholder="Cari nama siswa, kelas, atau NIS...">
                </div>
            </div>

            {{-- Filters --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                {{-- Sort Filter --}}
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1.5">Urutkan</label>
                    <select name="sort" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500">
                        <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Terbaru</option>
                        <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Terlama</option>
                        <option value="name-asc" {{ request('sort') == 'name-asc' ? 'selected' : '' }}>Nama A-Z</option>
                        <option value="name-desc" {{ request('sort') == 'name-desc' ? 'selected' : '' }}>Nama Z-A</option>
                    </select>
                </div>

                {{-- Kelas Bimbel Filter --}}
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1.5">Kelas Bimbel</label>
                    <select name="class_bimbel" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500">
                        <option value="">Semua Kelas</option>
                        {{-- Loop data kelas dari database --}}
                        @foreach($classes as $class)
                            {{-- PENTING: Field adalah 'clases' bukan 'class' --}}
                            <option value="{{ $class->clases }}" {{ request('class_bimbel') == $class->clases ? 'selected' : '' }}>
                                {{ $class->clases }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Jenjang Filter --}}
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1.5">Jenjang</label>
                    <select name="jenjang" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500">
                        <option value="">Semua Jenjang</option>
                        {{-- Loop data jenjang dari database --}}
                        @foreach($educationLevels as $level)
                            <option value="{{ $level->level }}" {{ request('jenjang') == $level->level ? 'selected' : '' }}>
                                {{ $level->level }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Tingkat Kelas Filter --}}
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1.5">Tingkat</label>
                    <select name="tingkat" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500">
                        <option value="">Semua Tingkat</option>
                        {{-- Loop data tingkat dari database --}}
                        @foreach($schoolGrades as $grade)
                            <option value="{{ $grade->grade }}" {{ request('tingkat') == $grade->grade ? 'selected' : '' }}>
                                Kelas {{ $grade->grade }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Submit Button --}}
            <div class="mt-4 flex gap-2">
                <button type="submit" class="px-4 py-2 bg-cyan-600 text-white rounded-lg hover:bg-cyan-700 transition text-sm font-semibold">
                    Terapkan Filter
                </button>
                {{-- Reset button untuk menghapus semua filter --}}
                <a href="{{ route('data-siswa') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition text-sm font-semibold">
                    Reset
                </a>
            </div>
        </form>

        {{-- Students Table --}}
        <div class="bg-white rounded-xl sm:rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            
            {{-- 
                CEK APAKAH ADA DATA SISWA
                $students->count() = menghitung jumlah data siswa
            --}}
            @if($students->count() > 0)
                
                {{-- Mobile View - Cards --}}
                <div class="block lg:hidden">
                    <div class="divide-y divide-gray-100">
                        {{-- 
                            LOOP DATA SISWA UNTUK MOBILE
                            @foreach = perulangan untuk setiap siswa
                            $student = variabel yang berisi data 1 siswa
                        --}}
                        @foreach($students as $student)
                            <div 
                                onclick='openModal(@json($student))'
                                class="p-4 hover:bg-cyan-50 transition cursor-pointer">
                                <div class="flex items-start gap-3">
                                    {{-- Avatar dengan inisial nama --}}
                                    <div class="w-12 h-12 bg-gradient-to-br from-cyan-400 to-blue-500 rounded-full flex items-center justify-center text-white font-bold text-sm flex-shrink-0">
                                        {{ strtoupper(substr($student->name, 0, 2)) }}
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h3 class="font-semibold text-gray-900 mb-1">{{ $student->name }}</h3>
                                        <div class="space-y-1 text-xs text-gray-600">
                                            {{-- PENTING: Field adalah 'NIS' bukan 'nisn' --}}
                                            <p>NIS: {{ $student->NIS }}</p>
                                            @if($student->class_name)
                                                <p>Kelas: <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-cyan-100 text-cyan-800">{{ $student->class_name }}</span></p>
                                            @endif
                                            <p>📞 {{ $student->phone_number_user ?? '-' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Desktop View - Table --}}
                <div class="hidden lg:block overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-600">Siswa</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-600">NIS</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-600">Kelas</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-600">No. Telepon</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            {{-- LOOP DATA SISWA UNTUK DESKTOP --}}
                            @foreach($students as $student)
                                <tr 
                                    onclick='openModal(@json($student))'
                                    class="hover:bg-cyan-50 transition cursor-pointer">
                                    <td class="py-4 px-6">
                                        <div class="flex items-center gap-3">
                                            {{-- Avatar dengan inisial --}}
                                            <div class="w-10 h-10 bg-gradient-to-br from-cyan-400 to-blue-500 rounded-full flex items-center justify-center text-white font-bold text-sm flex-shrink-0">
                                                {{ strtoupper(substr($student->name, 0, 2)) }}
                                            </div>
                                            <div>
                                                <p class="font-semibold text-gray-900">{{ $student->name }}</p>
                                                {{-- Tampilkan alamat sebagai pengganti email --}}
                                                <p class="text-xs text-gray-500">{{ Str::limit($student->address ?? '-', 30) }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    {{-- PENTING: Field adalah 'NIS' bukan 'nisn' --}}
                                    <td class="py-4 px-6 text-sm text-gray-600">{{ $student->NIS }}</td>
                                    {{-- Kolom Kelas Bimbel --}}
                                    <td class="py-4 px-6">
                                        @if($student->class_name)
                                            <span class="inline-flex items-center px-2.5 py-0.5 text-sm text-gray-600">
                                                {{ $student->class_name }}
                                            </span>
                                        @else
                                            <span class="text-ms text-gray-600">Belum ada kelas</span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-6 text-sm text-gray-600">{{ $student->phone_number_user ?? '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- 
                    PAGINATION
                    $students->links() = membuat link pagination otomatis
                    Laravel akan generate tombol Previous, 1, 2, 3, Next, dll
                --}}
                <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                    {{ $students->links() }}
                </div>

            @else
                {{-- TAMPILAN JIKA TIDAK ADA DATA --}}
                <div class="p-12 text-center">
                    <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                    </svg>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Tidak ada data siswa</h3>
                    <p class="text-gray-600 mb-4">Belum ada siswa yang terdaftar atau tidak ada hasil yang sesuai dengan filter Anda.</p>
                    <a href="{{ route('data-siswa') }}" class="inline-block px-4 py-2 bg-cyan-600 text-white rounded-lg hover:bg-cyan-700 transition">
                        Reset Filter
                    </a>
                </div>
            @endif
        </div>
    </div>

    {{-- MODAL DETAIL SISWA --}}
    <div id="studentModal" class="fixed inset-0 bg-gray-900/30 backdrop-blur-sm hidden z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-4xl w-full shadow-2xl transform transition-all max-h-[90vh] flex flex-col">
            {{-- Modal Header --}}
            <div class="sticky top-0 bg-gradient-to-r from-cyan-600 to-blue-600 text-white px-6 py-4 rounded-t-2xl flex items-center justify-between z-10 flex-shrink-0">
                <div class="flex items-center gap-3">
                    <div id="modalAvatar" class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center text-white font-bold text-lg">
                        
                    </div>
                    <div>
                        <h2 id="modalName" class="text-xl font-bold"></h2>
                        <p id="modalNIS" class="text-sm text-cyan-100"></p>
                    </div>
                </div>
                <button onclick="closeModal()" class="text-white hover:bg-white/20 rounded-lg p-2 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            {{-- Modal Body --}}
            <div class="p-6 overflow-y-auto">
                {{-- Data Pribadi & Kontak dalam 1 baris --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                    {{-- Data Pribadi --}}
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Data Pribadi
                        </h3>
                        <div class="space-y-3">
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-xs text-gray-500 mb-1">Nama Lengkap</p>
                                <p id="modalFullName" class="font-semibold text-gray-900"></p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-xs text-gray-500 mb-1">NIS</p>
                                <p id="modalNISDetail" class="font-semibold text-gray-900"></p>
                            </div>
                            <div class="grid grid-cols-2 gap-3">
                                <div class="bg-gray-50 p-3 rounded-lg">
                                    <p class="text-xs text-gray-500 mb-1">Tempat Lahir</p>
                                    <p id="modalPlaceBirth" class="font-semibold text-gray-900 text-sm"></p>
                                </div>
                                <div class="bg-gray-50 p-3 rounded-lg">
                                    <p class="text-xs text-gray-500 mb-1">Tanggal Lahir</p>
                                    <p id="modalDateBirth" class="font-semibold text-gray-900 text-sm"></p>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-3">
                                <div class="bg-gray-50 p-3 rounded-lg">
                                    <p class="text-xs text-gray-500 mb-1">Jenis Kelamin</p>
                                    <p id="modalGender" class="font-semibold text-gray-900"></p>
                                </div>
                                <div class="bg-gray-50 p-3 rounded-lg">
                                    <p class="text-xs text-gray-500 mb-1">Sekolah Asal</p>
                                    <p id="modalSchool" class="font-semibold text-gray-900 text-sm"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Kontak --}}
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            Informasi Kontak
                        </h3>
                        <div class="space-y-3">
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-xs text-gray-500 mb-1">No. Telepon Siswa</p>
                                <p id="modalPhoneUser" class="font-semibold text-gray-900"></p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-xs text-gray-500 mb-1">No. Telepon Orang Tua</p>
                                <p id="modalPhoneParent" class="font-semibold text-gray-900"></p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-xs text-gray-500 mb-1">Alamat</p>
                                <p id="modalAddress" class="font-semibold text-gray-900"></p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Pendidikan --}}
                <div>
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                        Informasi Pendidikan
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-gradient-to-br from-cyan-50 to-blue-50 p-4 rounded-lg border border-cyan-200">
                            <p class="text-xs text-cyan-700 mb-1">Kelas Bimbel</p>
                            <p id="modalClass" class="font-bold text-cyan-900 text-lg"></p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <p class="text-xs text-gray-500 mb-1">Jenjang</p>
                            <p id="modalJenjang" class="font-semibold text-gray-900"></p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <p class="text-xs text-gray-500 mb-1">Tingkat</p>
                            <p id="modalTingkat" class="font-semibold text-gray-900"></p>
                        </div>
                    </div>
                </div>

                {{-- Paket & Mapel --}}
                <div class="mt-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                        Paket & Mapel
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-cyan-50 p-4 rounded-lg border border-cyan-100">
                            <p class="text-xs text-cyan-700 mb-1">Paket Kompetensi</p>
                            <p id="modalPaket" class="font-bold text-cyan-900"></p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <p class="text-xs text-gray-500 mb-1">Mapel Pilihan</p>
                            <p id="modalMapel" class="font-semibold text-gray-900 text-sm"></p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Modal Footer --}}
            <div class="sticky bottom-0 bg-gray-50 px-6 py-4 rounded-b-2xl flex justify-between items-center gap-3 ">
                <button onclick="closeModal()" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition font-semibold">
                    Tutup
                </button>
                <div class="flex gap-3">
                    {{-- Tombol Edit --}}
                    <form id="editForm" method="POST" action="" class="hidden">
                        @csrf
                        @method('PUT')
                    </form>
                    <button 
                        onclick="toggleEditMode()"
                        id="editButton"
                        class="px-4 py-2 bg-gradient-to-r from-amber-500 to-orange-500 text-white rounded-lg hover:from-amber-600 hover:to-orange-600 transition font-semibold flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        <span id="editButtonText">Edit</span>
                    </button>
                    {{-- Tombol Hapus --}}
                    <form id="deleteForm" method="POST" action="" class="inline">
                        @csrf
                        @method('DELETE')
                        <button 
                            type="button"
                            onclick="confirmDelete()"
                            class="px-4 py-2 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-lg hover:from-red-600 hover:to-red-700 transition font-semibold flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Dropdown data from backend
        const classesData = @json($classes);
        const educationLevelsData = @json($educationLevels);
        const schoolGradesData = @json($schoolGrades);

        // Mobile menu toggle
        const sidebar = document.getElementById('sidebar');
        const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
        
        function toggleSidebar() {
            sidebar.classList.toggle('-translate-x-full');
        }

        if (mobileMenuToggle) {
            mobileMenuToggle.addEventListener('click', toggleSidebar);
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const isClickInsideSidebar = sidebar.contains(event.target);
            const isClickOnToggle = mobileMenuToggle && mobileMenuToggle.contains(event.target);
            
            if (!isClickInsideSidebar && !isClickOnToggle && window.innerWidth < 640 && !sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.add('-translate-x-full');
            }
        });

        // MODAL FUNCTIONS
        let currentStudentId = null;
        let isEditMode = false;

        function openModal(student) {
            const modal = document.getElementById('studentModal');
            currentStudentId = student.id;
            isEditMode = false;
            
            // Set form actions
            document.getElementById('editForm').action = `/data-siswa/${student.id}`;
            document.getElementById('deleteForm').action = `/data-siswa/${student.id}`;
            
            // Populate modal with student data
            // Header
            document.getElementById('modalAvatar').textContent = student.name.substring(0, 2).toUpperCase();
            document.getElementById('modalName').textContent = student.name;
            document.getElementById('modalNIS').textContent = 'NIS: ' + student.NIS;
            
            // Data Pribadi - Display mode with data attributes for edit
            document.getElementById('modalFullName').innerHTML = `<p class="font-semibold text-gray-900">${student.name}</p>`;
            document.getElementById('modalNISDetail').innerHTML = `<p class="font-semibold text-gray-900">${student.NIS}</p>`;
            document.getElementById('modalPlaceBirth').innerHTML = `<p class="font-semibold text-gray-900 text-sm">${student.place_birth || '-'}</p>`;
            document.getElementById('modalDateBirth').innerHTML = `<p class="font-semibold text-gray-900 text-sm" data-raw="${student.date_birth}">${formatDate(student.date_birth)}</p>`;
            document.getElementById('modalGender').innerHTML = `<p class="font-semibold text-gray-900" data-value="${student.gender}">${student.gender === 'L' ? 'Laki-laki' : 'Perempuan'}</p>`;
            document.getElementById('modalSchool').innerHTML = `<p class="font-semibold text-gray-900 text-sm">${student.school || '-'}</p>`;
            
            // Kontak
            document.getElementById('modalPhoneUser').innerHTML = `<p class="font-semibold text-gray-900">${student.phone_number_user || '-'}</p>`;
            document.getElementById('modalPhoneParent').innerHTML = `<p class="font-semibold text-gray-900">${student.phone_number_parent || '-'}</p>`;
            document.getElementById('modalAddress').innerHTML = `<p class="font-semibold text-gray-900">${student.address || '-'}</p>`;
            
            // Pendidikan
            document.getElementById('modalClass').setAttribute('data-class-id', student.class_id || 'null');
            document.getElementById('modalClass').textContent = student.class_name || 'Belum ada kelas';
            
            document.getElementById('modalJenjang').setAttribute('data-level-id', student.education_levels_id || '');
            document.getElementById('modalJenjang').textContent = student.jenjang || '-';
            
            document.getElementById('modalTingkat').setAttribute('data-grade-id', student.school_grades_id || '');
            document.getElementById('modalTingkat').textContent = student.tingkat ? 'Kelas ' + student.tingkat : '-';

            // Paket & Mapel
            document.getElementById('modalPaket').textContent = student.paket || '-';
            document.getElementById('modalMapel').textContent = student.mapel_pilihan || '-';
            
            // Reset edit button
            const button = document.getElementById('editButton');
            const buttonText = document.getElementById('editButtonText');
            buttonText.textContent = 'Edit';
            button.classList.remove('from-green-500', 'to-green-600', 'hover:from-green-600', 'hover:to-green-700');
            button.classList.add('from-amber-500', 'to-orange-500', 'hover:from-amber-600', 'hover:to-orange-600');
            
            // Show modal with animation
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.querySelector('div').classList.add('scale-100');
            }, 10);
        }

        function toggleEditMode() {
            isEditMode = !isEditMode;
            const button = document.getElementById('editButton');
            const buttonText = document.getElementById('editButtonText');

            if (isEditMode) {
                // Switch to edit mode - convert to inputs
                buttonText.textContent = 'Simpan';
                button.classList.remove('from-amber-500', 'to-orange-500', 'hover:from-amber-600', 'hover:to-orange-600');
                button.classList.add('from-green-500', 'to-green-600', 'hover:from-green-600', 'hover:to-green-700');
                
                // Get current values
                const currentData = {
                    name: document.getElementById('modalFullName').querySelector('p').textContent,
                    NIS: document.getElementById('modalNISDetail').querySelector('p').textContent,
                    place_birth: document.getElementById('modalPlaceBirth').querySelector('p').textContent,
                    date_birth: document.getElementById('modalDateBirth').querySelector('p').getAttribute('data-raw'),
                    gender: document.getElementById('modalGender').querySelector('p').getAttribute('data-value'),
                    school: document.getElementById('modalSchool').querySelector('p').textContent,
                    phone_number_user: document.getElementById('modalPhoneUser').querySelector('p').textContent,
                    phone_number_parent: document.getElementById('modalPhoneParent').querySelector('p').textContent,
                    address: document.getElementById('modalAddress').querySelector('p').textContent,
                    class_id: document.getElementById('modalClass').getAttribute('data-class-id'),
                    education_levels_id: document.getElementById('modalJenjang').getAttribute('data-level-id'),
                    school_grades_id: document.getElementById('modalTingkat').getAttribute('data-grade-id')
                };

                // Convert to inputs
                document.getElementById('modalFullName').innerHTML = `
                    <input type="text" name="name" value="${currentData.name}" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 text-sm font-semibold">
                `;
                
                document.getElementById('modalNISDetail').innerHTML = `
                    <input type="text" name="NIS" value="${currentData.NIS}" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 text-sm font-semibold">
                `;
                
                document.getElementById('modalPlaceBirth').innerHTML = `
                    <input type="text" name="place_birth" value="${currentData.place_birth}" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 text-sm font-semibold">
                `;
                
                document.getElementById('modalDateBirth').innerHTML = `
                    <input type="date" name="date_birth" value="${currentData.date_birth}" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 text-sm font-semibold">
                `;
                
                document.getElementById('modalGender').innerHTML = `
                    <select name="gender" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 text-sm font-semibold">
                        <option value="L" ${currentData.gender === 'L' ? 'selected' : ''}>Laki-laki</option>
                        <option value="P" ${currentData.gender === 'P' ? 'selected' : ''}>Perempuan</option>
                    </select>
                `;
                
                document.getElementById('modalSchool').innerHTML = `
                    <input type="text" name="school" value="${currentData.school}" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 text-sm font-semibold">
                `;
                
                document.getElementById('modalPhoneUser').innerHTML = `
                    <input type="number" name="phone_number_user" value="${currentData.phone_number_user}" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 text-sm font-semibold">
                `;
                
                document.getElementById('modalPhoneParent').innerHTML = `
                    <input type="number" name="phone_number_parent" value="${currentData.phone_number_parent}" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 text-sm font-semibold">
                `;
                
                document.getElementById('modalAddress').innerHTML = `
                    <textarea name="address" rows="2" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 text-sm font-semibold">${currentData.address}</textarea>
                `;
                
                // Education fields - now editable!
                // Kelas Bimbel dropdown
                let classOptions = '<option value="">Belum ada kelas</option>';
                classesData.forEach(cls => {
                    const selected = currentData.class_id == cls.id ? 'selected' : '';
                    classOptions += `<option value="${cls.id}" ${selected}>${cls.clases}</option>`;
                });
                document.getElementById('modalClass').innerHTML = `
                    <select name="class_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 text-sm font-bold">
                        ${classOptions}
                    </select>
                `;
                
                // Jenjang dropdown
                let levelOptions = '';
                educationLevelsData.forEach(level => {
                    const selected = currentData.education_levels_id == level.id ? 'selected' : '';
                    levelOptions += `<option value="${level.id}" ${selected}>${level.level}</option>`;
                });
                document.getElementById('modalJenjang').innerHTML = `
                    <select name="education_levels_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 text-sm font-semibold">
                        ${levelOptions}
                    </select>
                `;
                
                // Tingkat dropdown
                let gradeOptions = '';
                schoolGradesData.forEach(grade => {
                    const selected = currentData.school_grades_id == grade.id ? 'selected' : '';
                    gradeOptions += `<option value="${grade.id}" ${selected}>Kelas ${grade.grade}</option>`;
                });
                document.getElementById('modalTingkat').innerHTML = `
                    <select name="school_grades_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 text-sm font-semibold">
                        ${gradeOptions}
                    </select>
                `;
                
            } else {
                // Save changes - collect form data
                const editForm = document.getElementById('editForm');
                
                // Clear previous hidden inputs
                editForm.querySelectorAll('input[type="hidden"]').forEach(input => input.remove());
                
                // Add all input values to form
                const inputs = document.querySelectorAll('#studentModal input, #studentModal select, #studentModal textarea');
                inputs.forEach(input => {
                    if (input.name) {
                        const hiddenInput = document.createElement('input');
                        hiddenInput.type = 'hidden';
                        hiddenInput.name = input.name;
                        hiddenInput.value = input.value;
                        editForm.appendChild(hiddenInput);
                    }
                });
                
                // Submit form
                editForm.submit();
            }
        }

        function confirmDelete() {
            if (confirm('Apakah Anda yakin ingin menghapus data siswa ini? Tindakan ini tidak dapat dibatalkan!')) {
                document.getElementById('deleteForm').submit();
            }
        }

        function closeModal() {
            const modal = document.getElementById('studentModal');
            modal.querySelector('div').classList.remove('scale-100');
            setTimeout(() => {
                modal.classList.add('hidden');
                isEditMode = false;
            }, 200);
        }

        // Format date helper
        function formatDate(dateString) {
            if (!dateString) return '-';
            const date = new Date(dateString);
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            return date.toLocaleDateString('id-ID', options);
        }

        // Close modal when clicking outside
        document.getElementById('studentModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });
    </script>
</body>
</html>
