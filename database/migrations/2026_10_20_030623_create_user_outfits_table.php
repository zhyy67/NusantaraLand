<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_outfits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('outfit_id')->constrained()->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['user_id', 'outfit_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_outfits');
    }
};