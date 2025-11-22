<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // Data Pribadi Siswa
            $table->string('name');
            $table->string('place_birth');
            $table->date('date_birth');
            $table->enum('gender', ['L', 'P']);
            $table->string('NIS')->unique();
            $table->string('school');
            $table->string('address');

            // Kontak
            $table->bigInteger('phone_number_user');
            $table->bigInteger('phone_number_parent');

            // Relasi Kelas Sekolah
            $table->foreignId('education_levels_id')
                  ->constrained('education_levels')
                  ->onDelete('restrict');

            $table->foreignId('school_grades_id')
                  ->constrained('school_grades')
                  ->onDelete('restrict');

            // Relasi Kelas Bimbel
            $table->foreignId('class_id')
                  ->nullable()
                  ->constrained('class')
                  ->nullOnDelete();

            // Relasi Kompetensi
            $table->foreignId('competency_id')
                  ->nullable()
                  ->constrained('competency')
                  ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
