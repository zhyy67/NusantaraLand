<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    public function run(): void
    {
        $regions = [
            ['name' => 'Sumatera Barat', 'slug' => 'sumatera-barat', 'svg_id' => 'sumatera-barat',
             'description' => 'Rumah bagi budaya Minangkabau dengan Rumah Gadang, Tari Piring, dan rendang.'],
            ['name' => 'Bali', 'slug' => 'bali', 'svg_id' => 'bali',
             'description' => 'Pulau dengan budaya Hindu-Bali yang kuat, terkenal lewat tari dan upacara adat.'],
            ['name' => 'Jawa Tengah', 'slug' => 'jawa-tengah', 'svg_id' => 'jawa-tengah',
             'description' => 'Pusat budaya Jawa dengan batik, wayang, dan keraton.'],
        ];

        foreach ($regions as $r) {
            Region::updateOrCreate(['slug' => $r['slug']], $r);
        }
    }
}