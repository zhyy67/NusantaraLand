<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MisiHarianSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('misi_harian')->insert([
            [
                'kode' => 'selesaikan_kuis',
                'judul' => 'Selesaikan 1 Kuis',
                'target' => 1,
                'reward_poin' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'jelajahi_provinsi',
                'judul' => 'Jelajahi 3 Provinsi',
                'target' => 3,
                'reward_poin' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}