<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa - BBT Academia</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=montserrat:400,500,600,700,800" rel="stylesheet" />
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

    {{-- Navbar Mobile --}}
    <nav class="lg:hidden bg-white border-b border-gray-200 p-4 sticky top-0 z-50">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-gradient-to-br from-cyan-600 to-blue-600 rounded-lg flex items-center justify-center text-white font-bold">
                    B
                </div>
                <span class="font-bold text-gray-900">BBT Academia</span>
            </div>
            <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center text-gray-600 font-bold">
                {{ substr($student->name, 0, 1) }}
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        {{-- Header Section --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Halo, {{ $student->name }}! 👋</h1>
                <p class="text-gray-600 mt-1">Selamat datang kembali di dashboard belajarmu.</p>
            </div>
            <div class="flex items-center gap-4 bg-white px-4 py-4 rounded-xl shadow-sm border border-gray-100">
                <div class="text-right">
                    <p class="text-xs text-gray-500">Hari ini</p>
                    <p class="font-semibold text-gray-900">{{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</p>
                </div>
                <div class="w-10 h-10 bg-cyan-50 rounded-full flex items-center justify-center text-cyan-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            {{-- Kolom Kanan (Sidebar) - Pindah ke atas untuk Mobile --}}
            {{-- Di Desktop: lg:col-start-3 (Pindah ke kolom 3/kanan) --}}
            <div class="space-y-4 lg:col-start-3">
                
                {{-- Kartu Profil Ringkas --}}
                <div class="bg-gradient-to-br from-cyan-600 to-blue-700 rounded-2xl shadow-lg p-6 text-white relative overflow-hidden">
                    {{-- Dekorasi Background --}}
                    <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-white/10 rounded-full blur-xl"></div>
                    <div class="absolute bottom-0 left-0 -mb-4 -ml-4 w-20 h-20 bg-white/10 rounded-full blur-xl"></div>

                    <div class="relative z-10 flex items-center gap-4">
                        <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center text-cyan-600 font-bold text-2xl shadow-md">
                            {{ substr($student->name, 0, 2) }}
                        </div>
                        <div>
                            <h3 class="font-bold text-lg">{{ $student->name }}</h3>
                            <p class="text-cyan-100 text-sm">{{ $student->class }} • NIS {{ $student->nis }}</p>
                        </div>
                    </div>
                </div>

                {{-- Pengumuman --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-5 border-b border-gray-100">
                        <h2 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                            <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                            </svg>
                            Pengumuman
                        </h2>
                    </div>
                    <div class="divide-y divide-gray-100">
                        @foreach($announcements as $announcement)
                            <div class="p-5 hover:bg-gray-50 transition">
                                <div class="flex justify-between items-start mb-2">
                                    <span class="text-xs font-bold {{ $announcement['type'] == 'warning' ? 'text-orange-600 bg-orange-100' : 'text-blue-600 bg-blue-100' }} px-2 py-0.5 rounded-full">
                                        {{ $announcement['type'] == 'warning' ? 'Penting' : 'Info' }}
                                    </span>
                                    <span class="text-xs text-gray-500">{{ $announcement['date'] }}</span>
                                </div>
                                <h3 class="font-bold text-gray-900 mb-1">{{ $announcement['title'] }}</h3>
                                <p class="text-sm text-gray-600 leading-relaxed">{{ $announcement['content'] }}</p>
                            </div>
                        @endforeach
                    </div>
                    <div class="p-4 bg-gray-50 text-center">
                        <a href="#" class="text-sm text-cyan-600 font-semibold hover:text-cyan-700">Lihat Semua Pengumuman</a>
                    </div>
                </div>

                <!-- {{-- Kalender Mini (Visual Only) --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
                    <h2 class="text-lg font-bold text-gray-900 mb-4">Kalender Akademik</h2>
                    <div class="grid grid-cols-7 gap-1 text-center text-sm mb-2">
                        <div class="text-gray-400 text-xs font-semibold">M</div>
                        <div class="text-gray-400 text-xs font-semibold">S</div>
                        <div class="text-gray-400 text-xs font-semibold">S</div>
                        <div class="text-gray-400 text-xs font-semibold">R</div>
                        <div class="text-gray-400 text-xs font-semibold">K</div>
                        <div class="text-gray-400 text-xs font-semibold">J</div>
                        <div class="text-gray-400 text-xs font-semibold">S</div>
                    </div>
                    <div class="grid grid-cols-7 gap-1 text-center text-sm">
                        {{-- Mock Calendar Days --}}
                        @for($i = 1; $i <= 30; $i++)
                            @php
                                $isToday = $i == 23; // Mock today
                                $hasEvent = in_array($i, [5, 12, 25]);
                            @endphp
                            <div class="aspect-square flex items-center justify-center rounded-lg {{ $isToday ? 'bg-cyan-600 text-white font-bold shadow-md' : ($hasEvent ? 'bg-orange-100 text-orange-700 font-semibold' : 'hover:bg-gray-100 text-gray-700') }}">
                                {{ $i }}
                            </div>
                        @endfor
                    </div>
                </div> -->

            </div>

            {{-- Kolom Kiri (Main Content) --}}
            {{-- Di Desktop: lg:col-span-2 lg:row-start-1 (Tetap di kiri/baris 1) --}}
            <div class="lg:col-span-2 lg:row-start-1">
                
                {{-- Kartu Jadwal Hari Ini --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                        <h2 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                            <svg class="w-5 h-5 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Jadwal Hari Ini
                        </h2>
                        <span class="text-xs font-medium bg-cyan-50 text-cyan-700 px-3 py-1 rounded-full">
                            {{ count($todaySchedule) }} Pelajaran
                        </span>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            @forelse($todaySchedule as $schedule)
                                <div class="flex flex-col sm:flex-row sm:items-center gap-4 p-4 rounded-xl border border-gray-100 hover:border-cyan-200 hover:shadow-md transition group {{ $schedule['status'] == 'Berlangsung' ? 'bg-cyan-50 border-cyan-200 ring-1 ring-cyan-200' : 'bg-white' }}">
                                    
                                    {{-- Waktu --}}
                                    <div class="min-w-[80px] flex flex-row sm:flex-col items-center sm:items-start gap-2 sm:gap-0">
                                        <span class="font-bold text-gray-900 text-lg">{{ explode(' - ', $schedule['time'])[0] }}</span>
                                        <span class="text-xs text-gray-500">- {{ explode(' - ', $schedule['time'])[1] }}</span>
                                    </div>

                                    {{-- Garis Pemisah Mobile --}}
                                    <div class="h-px bg-gray-200 w-full sm:hidden"></div>

                                    {{-- Info Pelajaran --}}
                                    <div class="flex-1">
                                        <h3 class="font-bold text-gray-900 text-lg group-hover:text-cyan-700 transition">{{ $schedule['subject'] }}</h3>
                                        <div class="flex flex-wrap items-center gap-3 mt-1 text-sm text-gray-600">
                                            <span class="flex items-center gap-1">
                                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                                </svg>
                                                {{ $schedule['teacher'] }}
                                            </span>
                                            <span class="flex items-center gap-1">
                                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                                </svg>
                                                {{ $schedule['room'] }}
                                            </span>
                                        </div>
                                    </div>

                                    {{-- Status Badge --}}
                                    <div>
                                        @php
                                            $statusColors = [
                                                'Selesai' => 'bg-gray-100 text-gray-600',
                                                'Berlangsung' => 'bg-green-100 text-green-700 animate-pulse',
                                                'Mendatang' => 'bg-blue-50 text-blue-600'
                                            ];
                                            $colorClass = $statusColors[$schedule['status']] ?? 'bg-gray-100 text-gray-600';
                                        @endphp
                                        <span class="px-3 py-1 rounded-full text-xs font-bold {{ $colorClass }}">
                                            {{ $schedule['status'] }}
                                        </span>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-8 text-gray-500">
                                    Tidak ada jadwal pelajaran hari ini.
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>
