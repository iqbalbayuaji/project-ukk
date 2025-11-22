<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('school_grades', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            $table->string('grade'); // 1-12
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('school_grades');
    }
};
