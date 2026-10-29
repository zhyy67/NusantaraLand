<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('misi_harian', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->string('judul');
            $table->integer('target');
            $table->integer('reward_poin');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('misi_harian');
    }
};