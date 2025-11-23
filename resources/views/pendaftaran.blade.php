<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Siswa Baru - BBT Academia</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=montserrat:400,500,600,700,800" rel="stylesheet" />
    <style>
        body { font-family: 'Montserrat', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">

    <div class="max-w-4xl w-full space-y-8 bg-white p-10 rounded-3xl shadow-xl border border-gray-100">
        
        <div class="text-center">
            <div class="w-16 h-16 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-2xl mx-auto flex items-center justify-center text-white font-bold text-3xl mb-4 shadow-lg">
                B
            </div>
            <h2 class="text-3xl font-extrabold text-gray-900">Pendaftaran Siswa Baru</h2>
            <p class="mt-2 text-sm text-gray-600">
                Lengkapi data diri Anda untuk bergabung dengan BBT Academia
            </p>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">Terdapat kesalahan pada input Anda:</h3>
                        <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <form class="mt-8 space-y-8" action="{{ route('pendaftaran.store') }}" method="POST">
            @csrf

            <!-- Bagian 1: Data Diri -->
            <div>
                <h3 class="text-lg font-bold text-gray-900 border-b pb-2 mb-4 flex items-center gap-2">
                    <span class="w-6 h-6 bg-cyan-100 text-cyan-600 rounded-full flex items-center justify-center text-xs">1</span>
                    Data Diri
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="col-span-2">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" name="name" id="name" required class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 py-3 px-4 bg-gray-50" value="{{ old('name') }}">
                    </div>
                    
                    <div>
                        <label for="place_birth" class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
                        <input type="text" name="place_birth" id="place_birth" required class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 py-3 px-4 bg-gray-50" value="{{ old('place_birth') }}">
                    </div>

                    <div>
                        <label for="date_birth" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                        <input type="date" name="date_birth" id="date_birth" required class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 py-3 px-4 bg-gray-50" value="{{ old('date_birth') }}">
                    </div>

                    <div>
                        <label for="gender" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                        <select name="gender" id="gender" required class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 py-3 px-4 bg-gray-50">
                            <option value="">Pilih Gender</option>
                            <option value="L" {{ old('gender') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('gender') == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <div>
                        <label for="NIS" class="block text-sm font-medium text-gray-700">NIS (Nomor Induk Siswa)</label>
                        <input type="text" name="NIS" id="NIS" required class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 py-3 px-4 bg-gray-50" value="{{ old('NIS') }}">
                    </div>

                    <div class="col-span-2">
                        <label for="address" class="block text-sm font-medium text-gray-700">Alamat Rumah</label>
                        <textarea name="address" id="address" rows="3" required class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 py-3 px-4 bg-gray-50">{{ old('address') }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Bagian 2: Sekolah & Kontak -->
            <div>
                <h3 class="text-lg font-bold text-gray-900 border-b pb-2 mb-4 flex items-center gap-2">
                    <span class="w-6 h-6 bg-cyan-100 text-cyan-600 rounded-full flex items-center justify-center text-xs">2</span>
                    Sekolah & Kontak
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="col-span-2">
                        <label for="school" class="block text-sm font-medium text-gray-700">Asal Sekolah</label>
                        <input type="text" name="school" id="school" required class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 py-3 px-4 bg-gray-50" value="{{ old('school') }}">
                    </div>

                    <div>
                        <label for="education_levels_id" class="block text-sm font-medium text-gray-700">Jenjang Sekolah</label>
                        <select name="education_levels_id" id="education_levels_id" required class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 py-3 px-4 bg-gray-50">
                            <option value="">Pilih Jenjang</option>
                            @foreach($educationLevels as $level)
                                <option value="{{ $level->id }}" {{ old('education_levels_id') == $level->id ? 'selected' : '' }}>{{ $level->level }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="school_grades_id" class="block text-sm font-medium text-gray-700">Kelas (Tingkat)</label>
                        <select name="school_grades_id" id="school_grades_id" required class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 py-3 px-4 bg-gray-50">
                            <option value="">Pilih Kelas</option>
                            @foreach($schoolGrades as $grade)
                                <option value="{{ $grade->id }}" {{ old('school_grades_id') == $grade->id ? 'selected' : '' }}>Kelas {{ $grade->grade }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="phone_number_user" class="block text-sm font-medium text-gray-700">No. Telepon Siswa</label>
                        <input type="number" name="phone_number_user" id="phone_number_user" required class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 py-3 px-4 bg-gray-50" value="{{ old('phone_number_user') }}">
                    </div>

                    <div>
                        <label for="phone_number_parent" class="block text-sm font-medium text-gray-700">No. Telepon Orang Tua</label>
                        <input type="number" name="phone_number_parent" id="phone_number_parent" required class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 py-3 px-4 bg-gray-50" value="{{ old('phone_number_parent') }}">
                    </div>
                </div>
            </div>

            <!-- Bagian 3: Paket Kompetensi & Mapel Pilihan -->
            <div>
                <h3 class="text-lg font-bold text-gray-900 border-b pb-2 mb-4 flex items-center gap-2">
                    <span class="w-6 h-6 bg-cyan-100 text-cyan-600 rounded-full flex items-center justify-center text-xs">3</span>
                    Paket & Mapel Pilihan
                </h3>
                
                <div class="mb-6">
                    <label for="competency_id" class="block text-sm font-medium text-gray-700 mb-2">Pilih Paket Kompetensi</label>
                    <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-5 gap-4">
                        @foreach($competencyPackages as $package)
                            <label class="cursor-pointer relative">
                                <input type="radio" name="competency_id" value="{{ $package->id }}" class="peer sr-only" required {{ old('competency_id') == $package->id ? 'checked' : '' }} onchange="updateMapelLimit(this)">
                                <div class="p-4 rounded-xl border-2 border-gray-200 hover:border-cyan-300 peer-checked:border-cyan-600 peer-checked:bg-cyan-50 transition text-center">
                                    <div class="font-bold text-gray-900">{{ $package->competencies_package }}</div>
                                    <div class="text-xs text-gray-500 mt-1">Pilih {{ filter_var($package->competencies_package, FILTER_SANITIZE_NUMBER_INT) }} Mapel</div>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div id="mapel-container" class="bg-gray-50 p-6 rounded-xl border border-gray-200 opacity-50 pointer-events-none transition-all duration-300">
                    <div class="flex justify-between items-center mb-4">
                        <label class="block text-sm font-medium text-gray-700">Mapel Pilihan</label>
                        <span id="selection-counter" class="text-xs font-bold text-cyan-600 bg-cyan-100 px-2 py-1 rounded-full">Pilih Paket Terlebih Dahulu</span>
                    </div>
                    
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
                        @foreach($lessons as $lesson)
                            <label class="flex items-center space-x-3 p-3 bg-white rounded-lg border border-gray-200 hover:bg-gray-50 cursor-pointer transition">
                                <input type="checkbox" name="electives[]" value="{{ $lesson->id }}" class="mapel-checkbox form-checkbox h-5 w-5 text-cyan-600 rounded border-gray-300 focus:ring-cyan-500" onchange="checkLimit()">
                                <span class="text-sm text-gray-700 font-medium">{{ $lesson->name }}</span>
                            </label>
                        @endforeach
                    </div>
                    <p class="text-xs text-gray-500 mt-3">* Anda hanya dapat memilih mapel sesuai kuota paket yang dipilih.</p>
                </div>
            </div>

            <div class="pt-6">
                <button type="submit" class="w-full flex justify-center py-4 px-4 border border-transparent rounded-xl shadow-sm text-sm font-bold text-white bg-gradient-to-r from-cyan-600 to-blue-600 hover:from-cyan-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 transition transform hover:-translate-y-0.5">
                    Daftar Sekarang
                </button>
            </div>
        </form>
    </div>

    <script>
        let maxSelection = 0;
        const mapelContainer = document.getElementById('mapel-container');
        const selectionCounter = document.getElementById('selection-counter');
        const checkboxes = document.querySelectorAll('.mapel-checkbox');

        function updateMapelLimit(radio) {
            // Ambil angka dari teks paket (misal "Paket 3" -> 3)
            // Kita cari elemen div di dalam label yang berisi teks paket
            const labelDiv = radio.nextElementSibling;
            const packageText = labelDiv.querySelector('.font-bold').innerText;
            const match = packageText.match(/\d+/); // Cari angka
            
            if (match) {
                maxSelection = parseInt(match[0]);
                
                // Aktifkan container mapel
                mapelContainer.classList.remove('opacity-50', 'pointer-events-none');
                
                // Reset checkbox jika ganti paket
                checkboxes.forEach(cb => {
                    cb.checked = false;
                    cb.disabled = false;
                    cb.parentElement.classList.remove('opacity-50');
                });

                updateCounter();
            }
        }

        function checkLimit() {
            const checkedCount = document.querySelectorAll('.mapel-checkbox:checked').length;

            if (checkedCount >= maxSelection) {
                checkboxes.forEach(cb => {
                    if (!cb.checked) {
                        cb.disabled = true;
                        cb.parentElement.classList.add('opacity-50', 'cursor-not-allowed');
                    }
                });
            } else {
                checkboxes.forEach(cb => {
                    cb.disabled = false;
                    cb.parentElement.classList.remove('opacity-50', 'cursor-not-allowed');
                });
            }
            updateCounter();
        }

        function updateCounter() {
            const checkedCount = document.querySelectorAll('.mapel-checkbox:checked').length;
            selectionCounter.innerText = `Terpilih: ${checkedCount} / ${maxSelection}`;
            
            if (checkedCount === maxSelection) {
                selectionCounter.classList.remove('bg-cyan-100', 'text-cyan-600');
                selectionCounter.classList.add('bg-green-100', 'text-green-600');
            } else {
                selectionCounter.classList.add('bg-cyan-100', 'text-cyan-600');
                selectionCounter.classList.remove('bg-green-100', 'text-green-600');
            }
        }
    </script>
</body>
</html>
