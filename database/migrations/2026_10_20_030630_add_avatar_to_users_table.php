<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('avatar_style')->default('default'); // Menyimpan gaya avatar
        $table->string('avatar_color')->default('#059669'); // Menyimpan warna/aksesoris
    });
}

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropConstrainedForeignId('equipped_outfit_id');
            $table->dropColumn('avatar_body');
        });
    }
};