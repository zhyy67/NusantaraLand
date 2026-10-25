<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel.
     */
    public function up(): void
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('region_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->timestamps();
        });
    }

    /**
     * Batalkan migrasi untuk menghapus tabel.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};


