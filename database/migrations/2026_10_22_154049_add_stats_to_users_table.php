<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Cek satu per satu, jika belum ada baru tambahkan
            if (!Schema::hasColumn('users', 'points')) {
                $table->integer('points')->default(0);
            }
            if (!Schema::hasColumn('users', 'level')) {
                $table->integer('level')->default(1);
            }
            if (!Schema::hasColumn('users', 'streak')) {
                $table->integer('streak')->default(0);
            }
            if (!Schema::hasColumn('users', 'provinces_visited')) {
                $table->integer('provinces_visited')->default(0);
            }
            if (!Schema::hasColumn('users', 'total_provinces')) {
                $table->integer('total_provinces')->default(38);
            }
            if (!Schema::hasColumn('users', 'badges_collected')) {
                $table->integer('badges_collected')->default(0);
            }
            if (!Schema::hasColumn('users', 'total_badges')) {
                $table->integer('total_badges')->default(8);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Hanya hapus kolom yang kita tambahkan di file ini (bukan points/level)
            $table->dropColumn([
                'streak', 
                'provinces_visited', 
                'total_provinces', 
                'badges_collected', 
                'total_badges'
            ]);
        });
    }
};