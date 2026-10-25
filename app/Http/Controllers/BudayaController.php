<?php

namespace App\Http\Controllers;

class BudayaController extends Controller
{
    public function index()
    {
        $provinsi = [
            [
                'nama' => 'Sumatera Barat',
                'pulau' => 'Sumatera',
                'rumah' => 'Rumah Gadang',
                'tari' => 'Tari Piring',
                'makanan' => 'Rendang',
                'musik' => 'Saluang',
                'deskripsi' => 'Sumatera Barat terkenal dengan budaya Minangkabau, rumah Gadang, dan tradisi kulinernya.',
                'warna' => '#FDE68A',
                'emoji' => '🏠',
            ],
            [
                'nama' => 'Jawa Tengah',
                'pulau' => 'Jawa',
                'rumah' => 'Joglo',
                'tari' => 'Tari Gambyong',
                'makanan' => 'Lumpia Semarang',
                'musik' => 'Gamelan',
                'deskripsi' => 'Jawa Tengah memiliki tradisi wayang, gamelan, batik, dan berbagai seni keraton.',
                'warna' => '#BBF7D0',
                'emoji' => '🎭',
            ],
            [
                'nama' => 'Bali',
                'pulau' => 'Bali',
                'rumah' => 'Rumah Adat Bali',
                'tari' => 'Tari Kecak',
                'makanan' => 'Ayam Betutu',
                'musik' => 'Gamelan Bali',
                'deskripsi' => 'Bali dikenal dengan seni tari, ukiran, upacara adat, dan tradisi yang masih dijaga.',
                'warna' => '#BFDBFE',
                'emoji' => '💃',
            ],
            [
                'nama' => 'Sulawesi Selatan',
                'pulau' => 'Sulawesi',
                'rumah' => 'Tongkonan',
                'tari' => 'Tari Pakarena',
                'makanan' => 'Coto Makassar',
                'musik' => 'Kecapi',
                'deskripsi' => 'Sulawesi Selatan memiliki beragam budaya Bugis, Makassar, dan Toraja.',
                'warna' => '#DDD6FE',
                'emoji' => '🏡',
            ],
            [
                'nama' => 'Papua',
                'pulau' => 'Papua',
                'rumah' => 'Honai',
                'tari' => 'Tari Yospan',
                'makanan' => 'Papeda',
                'musik' => 'Tifa',
                'deskripsi' => 'Papua memiliki keragaman budaya, musik tifa, dan tradisi masyarakat dari berbagai wilayah.',
                'warna' => '#FBCFE8',
                'emoji' => '🥁',
            ],
            [
                'nama' => 'Kalimantan Timur',
                'pulau' => 'Kalimantan',
                'rumah' => 'Rumah Lamin',
                'tari' => 'Tari Hudoq',
                'makanan' => 'Nasi Bekepor',
                'musik' => 'Sampe',
                'deskripsi' => 'Kalimantan Timur memiliki tradisi masyarakat Dayak dan Kutai serta rumah adat Lamin.',
                'warna' => '#FED7AA',
                'emoji' => '🌳',
            ],
        ];

        return view('budaya.index', compact('provinsi'));
    }

    public function show(string $nama)
    {
        $semuaProvinsi = [
            // --- DATA YOGYAKARTA DENGAN FOTO ---
            'di-yogyakarta' => [
                'nama' => 'DI Yogyakarta',
                'rumah' => 'Rumah Joglo',
                'tari' => 'Tari Serimpi',
                'makanan' => 'Gudeg',
                'musik' => 'Gamelan',
                'deskripsi' => 'DI Yogyakarta adalah kota budaya yang kental dengan adat keraton, batik, dan seni tradisional.',
                'foto_rumah' => 'https://images.unsplash.com/photo-1596443686812-2f45229eeb39?w=600&q=80',
                'foto_tari' => 'https://images.unsplash.com/photo-1584813731602-6c9f91f5c35e?w=600&q=80',
                'foto_makanan' => 'https://images.unsplash.com/photo-1626202844466-9c11b3a6b66e?w=600&q=80',
                'foto_musik' => 'https://images.unsplash.com/photo-1583164237413-3e9b8a672c56?w=600&q=80',
            ],
            // ------------------------------------

            'sumatera-barat' => [
                'nama' => 'Sumatera Barat',
                'rumah' => 'Rumah Gadang',
                'tari' => 'Tari Piring',
                'makanan' => 'Rendang',
                'musik' => 'Saluang',
                'deskripsi' => 'Sumatera Barat dikenal dengan budaya Minangkabau dan tradisi merantau.',
                'foto_rumah' => 'https://images.unsplash.com/photo-1596443686812-2f45229eeb39?w=600&q=80',
                'foto_tari' => 'https://images.unsplash.com/photo-1584813731602-6c9f91f5c35e?w=600&q=80',
                'foto_makanan' => 'https://images.unsplash.com/photo-1626202844466-9c11b3a6b66e?w=600&q=80',
                'foto_musik' => 'https://images.unsplash.com/photo-1583164237413-3e9b8a672c56?w=600&q=80',
            ],
            'jawa-tengah' => [
                'nama' => 'Jawa Tengah',
                'rumah' => 'Joglo',
                'tari' => 'Tari Gambyong',
                'makanan' => 'Lumpia Semarang',
                'musik' => 'Gamelan',
                'deskripsi' => 'Jawa Tengah memiliki kekayaan seni wayang, gamelan, dan batik.',
                'foto_rumah' => 'https://images.unsplash.com/photo-1596443686812-2f45229eeb39?w=600&q=80',
                'foto_tari' => 'https://images.unsplash.com/photo-1584813731602-6c9f91f5c35e?w=600&q=80',
                'foto_makanan' => 'https://images.unsplash.com/photo-1626202844466-9c11b3a6b66e?w=600&q=80',
                'foto_musik' => 'https://images.unsplash.com/photo-1583164237413-3e9b8a672c56?w=600&q=80',
            ],
            'bali' => [
                'nama' => 'Bali',
                'rumah' => 'Rumah Adat Bali',
                'tari' => 'Tari Kecak',
                'makanan' => 'Ayam Betutu',
                'musik' => 'Gamelan Bali',
                'deskripsi' => 'Bali dikenal dengan seni tari, ukiran, dan tradisi adatnya.',
                'foto_rumah' => 'https://images.unsplash.com/photo-1537996194471-e657df975ab4?w=600&q=80',
                'foto_tari' => 'https://images.unsplash.com/photo-1584813731602-6c9f91f5c35e?w=600&q=80',
                'foto_makanan' => 'https://images.unsplash.com/photo-1626202844466-9c11b3a6b66e?w=600&q=80',
                'foto_musik' => 'https://images.unsplash.com/photo-1583164237413-3e9b8a672c56?w=600&q=80',
            ],
            'sulawesi-selatan' => [
                'nama' => 'Sulawesi Selatan',
                'rumah' => 'Tongkonan',
                'tari' => 'Tari Pakarena',
                'makanan' => 'Coto Makassar',
                'musik' => 'Kecapi',
                'deskripsi' => 'Daerah ini memiliki budaya Bugis, Makassar, dan Toraja.',
                'foto_rumah' => 'https://images.unsplash.com/photo-1596443686812-2f45229eeb39?w=600&q=80',
                'foto_tari' => 'https://images.unsplash.com/photo-1584813731602-6c9f91f5c35e?w=600&q=80',
                'foto_makanan' => 'https://images.unsplash.com/photo-1626202844466-9c11b3a6b66e?w=600&q=80',
                'foto_musik' => 'https://images.unsplash.com/photo-1583164237413-3e9b8a672c56?w=600&q=80',
            ],
            'papua' => [
                'nama' => 'Papua',
                'rumah' => 'Honai',
                'tari' => 'Tari Yospan',
                'makanan' => 'Papeda',
                'musik' => 'Tifa',
                'deskripsi' => 'Papua memiliki beragam bahasa, kesenian, dan tradisi masyarakat adat.',
                'foto_rumah' => 'https://images.unsplash.com/photo-1596443686812-2f45229eeb39?w=600&q=80',
                'foto_tari' => 'https://images.unsplash.com/photo-1584813731602-6c9f91f5c35e?w=600&q=80',
                'foto_makanan' => 'https://images.unsplash.com/photo-1626202844466-9c11b3a6b66e?w=600&q=80',
                'foto_musik' => 'https://images.unsplash.com/photo-1583164237413-3e9b8a672c56?w=600&q=80',
            ],
            'kalimantan-timur' => [
                'nama' => 'Kalimantan Timur',
                'rumah' => 'Rumah Lamin',
                'tari' => 'Tari Hudoq',
                'makanan' => 'Nasi Bekepor',
                'musik' => 'Sampe',
                'deskripsi' => 'Kalimantan Timur memiliki kekayaan budaya Dayak dan Kutai.',
                'foto_rumah' => 'https://images.unsplash.com/photo-1596443686812-2f45229eeb39?w=600&q=80',
                'foto_tari' => 'https://images.unsplash.com/photo-1584813731602-6c9f91f5c35e?w=600&q=80',
                'foto_makanan' => 'https://images.unsplash.com/photo-1626202844466-9c11b3a6b66e?w=600&q=80',
                'foto_musik' => 'https://images.unsplash.com/photo-1583164237413-3e9b8a672c56?w=600&q=80',
            ],
        ];

        // Fallback (jika provinsi belum ada datanya)
        if (!isset($semuaProvinsi[$nama])) {
            $semuaProvinsi[$nama] = [
                'nama' => ucwords(str_replace('-', ' ', $nama)),
                'rumah' => 'Data belum tersedia',
                'tari' => 'Data belum tersedia',
                'makanan' => 'Data belum tersedia',
                'musik' => 'Data belum tersedia',
                'deskripsi' => 'Informasi budaya untuk provinsi ini sedang dilengkapi.',
                'foto_rumah' => 'https://via.placeholder.com/600x400?text=Gambar+Belum+Ada',
                'foto_tari' => 'https://via.placeholder.com/600x400?text=Gambar+Belum+Ada',
                'foto_makanan' => 'https://via.placeholder.com/600x400?text=Gambar+Belum+Ada',
                'foto_musik' => 'https://via.placeholder.com/600x400?text=Gambar+Belum+Ada',
            ];
        }

        return view('budaya.show', [
            'budaya' => $semuaProvinsi[$nama],
        ]);
    }
}