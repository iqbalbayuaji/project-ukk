<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - BBT Academia</title>
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
    
    <!-- Mobile Navbar -->
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

    <!-- Sidebar -->
    <aside id="sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0">
        <div class="h-full px-3 py-6 overflow-y-auto bg-gradient-to-b from-cyan-600 to-blue-700">
            <!-- Logo -->
            <div class="flex items-center space-x-3 mb-8 px-3">
                <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <span class="text-xl font-bold text-white">BBT Academia</span>
            </div>

            <!-- Navigation -->
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="#" class="flex items-center p-3 text-white bg-white/20 rounded-lg group">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-3 text-white hover:bg-white/10 rounded-lg group transition">
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
                <li>
                    <a href="#" class="flex items-center p-3 text-white hover:bg-white/10 rounded-lg group transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        <span class="ml-3">Laporan</span>
                    </a>
                </li>
            </ul>

            <!-- Logout Button -->
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

    <!-- Main Content -->
    <div class="p-3 sm:p-4 sm:ml-64 pt-20 sm:pt-4 max-w-full overflow-x-hidden">
        <!-- Header -->
        <div class="mb-6 sm:mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">Dashboard</h1>
                    <p class="text-gray-600 mt-1 text-sm sm:text-base">Selamat datang kembali, Admin!</p>
                </div>
                <div class="hidden sm:flex items-center space-x-4">
                    <div class="text-right">
                        <p class="text-sm text-gray-600">{{ date('l, d F Y') }}</p>
                        <p class="text-xs text-gray-500" id="current-time"></p>
                    </div>
                    <div class="w-10 h-10 bg-gradient-to-br from-cyan-600 to-blue-600 rounded-full flex items-center justify-center text-white font-semibold flex-shrink-0">
                        A
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-6 mb-6 sm:mb-8 max-w-full">
            <!-- Total Siswa -->
            <div class="bg-white rounded-xl sm:rounded-2xl shadow-sm p-4 sm:p-6 border border-gray-100 hover:shadow-md transition min-w-0">
                <div class="flex items-center justify-between mb-3 sm:mb-4">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 bg-cyan-100 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <span class="text-xs font-semibold text-green-600 bg-green-100 px-2 py-1 rounded-full flex-shrink-0">+12%</span>
                </div>
                <h3 class="text-gray-600 text-xs sm:text-sm font-medium mb-1 truncate">Total Siswa</h3>
                <p class="text-2xl sm:text-3xl font-bold text-gray-900">156</p>
                <p class="text-xs text-gray-500 mt-1 sm:mt-2 truncate">Siswa aktif terdaftar</p>
            </div>

            <!-- Total Kelas -->
            <div class="bg-white rounded-xl sm:rounded-2xl shadow-sm p-4 sm:p-6 border border-gray-100 hover:shadow-md transition min-w-0">
                <div class="flex items-center justify-between mb-3 sm:mb-4">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <span class="text-xs font-semibold text-blue-600 bg-blue-100 px-2 py-1 rounded-full flex-shrink-0">8 Ruang</span>
                </div>
                <h3 class="text-gray-600 text-xs sm:text-sm font-medium mb-1 truncate">Total Kelas</h3>
                <p class="text-2xl sm:text-3xl font-bold text-gray-900">12</p>
                <p class="text-xs text-gray-500 mt-1 sm:mt-2 truncate">Kelas bimbel tersedia</p>
            </div>

            <!-- Jadwal Hari Ini -->
            <div class="bg-white rounded-xl sm:rounded-2xl shadow-sm p-4 sm:p-6 border border-gray-100 hover:shadow-md transition min-w-0">
                <div class="flex items-center justify-between mb-3 sm:mb-4">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 bg-teal-100 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <span class="text-xs font-semibold text-teal-600 bg-teal-100 px-2 py-1 rounded-full flex-shrink-0">Hari Ini</span>
                </div>
                <h3 class="text-gray-600 text-xs sm:text-sm font-medium mb-1 truncate">Jadwal Hari Ini</h3>
                <p class="text-2xl sm:text-3xl font-bold text-gray-900">7</p>
                <p class="text-xs text-gray-500 mt-1 sm:mt-2 truncate">Sesi pembelajaran</p>
            </div>

            <!-- Ruang Tersedia -->
            <div class="bg-white rounded-xl sm:rounded-2xl shadow-sm p-4 sm:p-6 border border-gray-100 hover:shadow-md transition min-w-0">
                <div class="flex items-center justify-between mb-3 sm:mb-4">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 bg-purple-100 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </div>
                    <span class="text-xs font-semibold text-purple-600 bg-purple-100 px-2 py-1 rounded-full flex-shrink-0">5/8</span>
                </div>
                <h3 class="text-gray-600 text-xs sm:text-sm font-medium mb-1 truncate">Ruang Tersedia</h3>
                <p class="text-2xl sm:text-3xl font-bold text-gray-900">5</p>
                <p class="text-xs text-gray-500 mt-1 sm:mt-2 truncate">Dari 8 ruang total</p>
            </div>
        </div>

        <!-- Quick Actions & Recent Activity -->
        <div class="grid grid-cols-1 gap-6 mb-6 sm:mb-8 max-w-full">
            <!-- Quick Actions -->
            <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
                <h2 class="text-lg font-bold text-gray-900 mb-4">Quick Actions</h2>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                    <button class="w-full flex items-center justify-between p-4 bg-gradient-to-r from-cyan-600 to-blue-600 hover:from-cyan-700 hover:to-blue-700 text-white rounded-xl transition group">
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                            <span class="font-semibold">Tambah Siswa Baru</span>
                        </div>
                        <svg class="w-5 h-5 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                    <button class="w-full flex items-center justify-between p-4 bg-white hover:bg-gray-50 border-2 border-gray-200 hover:border-cyan-400 rounded-xl transition group">
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-gray-600 group-hover:text-cyan-600 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span class="font-semibold text-gray-700">Lihat Jadwal</span>
                        </div>
                        <svg class="w-5 h-5 text-gray-400 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                    <button class="w-full flex items-center justify-between p-4 bg-white hover:bg-gray-50 border-2 border-gray-200 hover:border-cyan-400 rounded-xl transition group">
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-gray-600 group-hover:text-cyan-600 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <span class="font-semibold text-gray-700">Buat Laporan</span>
                        </div>
                        <svg class="w-5 h-5 text-gray-400 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Schedule & Recent Students -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <!-- Today's Schedule -->
            <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg font-bold text-gray-900">Jadwal Hari Ini</h2>
                    <span class="text-sm text-gray-500 hidden sm:block">{{ date('l, d F Y') }}</span>
                </div>
                
                <!-- Mobile View - Cards -->
                <div class="block lg:hidden space-y-4">
                    <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                        <div class="flex items-center justify-between gap-2 mb-3">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-bold text-gray-900 mb-1">Matematika</p>
                                <p class="text-xs text-gray-500">Kelas 10A • Ruang A1</p>
                            </div>
                            <span class="text-[10px] bg-blue-100 text-blue-700 px-2 py-0.5 rounded-full font-semibold whitespace-nowrap flex-shrink-0">Berlangsung</span>
                        </div>
                        <div class="flex items-center text-xs text-gray-600">
                            <svg class="w-4 h-4 mr-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="font-semibold">08:00 - 10:00</span>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                        <div class="flex items-center justify-between gap-2 mb-3">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-bold text-gray-900 mb-1">Bahasa Indonesia</p>
                                <p class="text-xs text-gray-500">Kelas 11B • Ruang A2</p>
                            </div>
                            <span class="text-[10px] bg-amber-100 text-amber-700 px-2 py-0.5 rounded-full font-semibold whitespace-nowrap flex-shrink-0">Mendatang</span>
                        </div>
                        <div class="flex items-center text-xs text-gray-600">
                            <svg class="w-4 h-4 mr-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="font-semibold">10:30 - 12:30</span>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                        <div class="flex items-center justify-between gap-2 mb-3">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-bold text-gray-900 mb-1">Bahasa Inggris</p>
                                <p class="text-xs text-gray-500">Kelas 12A • Ruang B1</p>
                            </div>
                            <span class="text-[10px] bg-amber-100 text-amber-700 px-2 py-0.5 rounded-full font-semibold whitespace-nowrap flex-shrink-0">Mendatang</span>
                        </div>
                        <div class="flex items-center text-xs text-gray-600">
                            <svg class="w-4 h-4 mr-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="font-semibold">13:00 - 15:00</span>
                        </div>
                    </div>
                </div>

                <!-- Desktop View - Table -->
                <div class="hidden lg:block overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="text-left py-3 px-4 text-sm font-semibold text-gray-600">Waktu</th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-gray-600">Pelajaran</th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-gray-600">Kelas</th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-gray-600">Ruang</th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-gray-600">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-gray-100 hover:bg-gray-50 transition">
                                <td class="py-4 px-4">
                                    <span class="text-sm font-semibold text-gray-900">08:00 - 10:00</span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="text-sm text-gray-900">Matematika</span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="text-sm text-gray-600">10A</span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="text-sm text-gray-600">Ruang A1</span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="text-xs bg-blue-100 text-blue-700 px-3 py-1 rounded-full font-semibold">Berlangsung</span>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-100 hover:bg-gray-50 transition">
                                <td class="py-4 px-4">
                                    <span class="text-sm font-semibold text-gray-900">10:30 - 12:30</span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="text-sm text-gray-900">Bahasa Indonesia</span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="text-sm text-gray-600">11B</span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="text-sm text-gray-600">Ruang A2</span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="text-xs bg-amber-100 text-amber-700 px-3 py-1 rounded-full font-semibold">Mendatang</span>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-100 hover:bg-gray-50 transition">
                                <td class="py-4 px-4">
                                    <span class="text-sm font-semibold text-gray-900">13:00 - 15:00</span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="text-sm text-gray-900">Bahasa Inggris</span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="text-sm text-gray-600">12A</span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="text-sm text-gray-600">Ruang B1</span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="text-xs bg-amber-100 text-amber-700 px-3 py-1 rounded-full font-semibold">Mendatang</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Recent Students -->
            <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-bold text-gray-900">Siswa Terbaru</h2>
                    <a href="#" class="text-sm text-cyan-600 hover:text-cyan-700 font-semibold">Lihat Semua →</a>
                </div>
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-gradient-to-br from-cyan-400 to-blue-500 rounded-full flex items-center justify-center text-white font-semibold flex-shrink-0">
                                AR
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">Ahmad Rizki</p>
                                <p class="text-sm text-gray-500">SMA • Kelas 10A</p>
                            </div>
                        </div>
                        <span class="text-xs bg-green-100 text-green-700 px-3 py-1 rounded-full font-semibold whitespace-nowrap">Aktif</span>
                    </div>
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-gradient-to-br from-purple-400 to-pink-500 rounded-full flex items-center justify-center text-white font-semibold flex-shrink-0">
                                SN
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">Siti Nurhaliza</p>
                                <p class="text-sm text-gray-500">SMA • Kelas 11B</p>
                            </div>
                        </div>
                        <span class="text-xs bg-green-100 text-green-700 px-3 py-1 rounded-full font-semibold whitespace-nowrap">Aktif</span>
                    </div>
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-gradient-to-br from-orange-400 to-red-500 rounded-full flex items-center justify-center text-white font-semibold flex-shrink-0">
                                BS
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">Budi Santoso</p>
                                <p class="text-sm text-gray-500">SMA • Kelas 12A</p>
                            </div>
                        </div>
                        <span class="text-xs bg-green-100 text-green-700 px-3 py-1 rounded-full font-semibold whitespace-nowrap">Aktif</span>
                    </div>
                </div>
            </div>
        </div>

        
    </div>

    <script>
        // Update current time
        function updateTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
            const timeElement = document.getElementById('current-time');
            if (timeElement) {
                timeElement.textContent = timeString;
            }
        }
        updateTime();
        setInterval(updateTime, 1000);

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
    </script>
</body>
</html>
