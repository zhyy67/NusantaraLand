<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_misi_progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('misi_harian_id')->constrained('misi_harian')->cascadeOnDelete();
            $table->integer('progress')->default(0);
            $table->boolean('selesai')->default(false);
            $table->date('tanggal'); // Untuk reset otomatis tiap hari
            $table->timestamps();

            // Mencegah duplikasi data di hari yang sama
            $table->unique(['user_id', 'misi_harian_id', 'tanggal']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_misi_progress');
    }
};