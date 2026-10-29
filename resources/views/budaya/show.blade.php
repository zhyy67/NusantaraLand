@extends('layouts.app')

@section('title', 'Profil Budaya - ' . $budaya['nama'])

@section('content')
<div class="max-w-7xl mx-auto py-8 px-4">

    <!-- TOMBOL KEMBALI -->
    <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 text-sm font-bold text-red-700 hover:text-red-900 mb-4 transition">
        ← Kembali ke Peta Budaya
    </a>

    <!-- LAYOUT GRID: KIRI (KONTEN UTAMA), KANAN (SIDEBAR) -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- ========================================== -->
        <!-- KIRI: KARTU UTAMA PROFIL & NILAI BUDAYA -->
        <!-- ========================================== -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- KARTU PROFIL BUDAYA -->
            <div class="bg-white rounded-3xl p-6 md:p-8 shadow-sm border border-gray-100">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <span class="bg-red-600 text-white text-xs font-bold px-3 py-1 rounded-full">{{ strtoupper($budaya['nama']) }}</span>
                        <h1 class="text-3xl md:text-4xl font-extrabold text-gray-800 mt-3">Profil & Nilai Budaya</h1>
                        <p class="text-sm text-gray-500 mt-1">Ibu Kota: <strong>{{ $budaya['ibu_kota'] ?? 'Belum tersedia' }}</strong></p>
                    </div>
                </div>

                <!-- Deskripsi -->
                <div class="mb-6">
                    <h2 class="text-lg font-bold text-gray-800 flex items-center gap-2 mb-2">📖 Penjelasan Materi</h2>
                    <p class="text-gray-600 leading-relaxed text-sm">{{ $budaya['deskripsi'] }}</p>
                </div>

                <!-- Video Edukasi (YouTube Embed) -->
                <div class="mb-6">
                    <h2 class="text-lg font-bold text-gray-800 flex items-center gap-2 mb-2">▶️ Video Edukasi</h2>
                    <div class="relative bg-gray-900 rounded-xl overflow-hidden aspect-video">
                        @if(!empty($budaya['video_id']))
                        <iframe 
                            class="absolute inset-0 w-full h-full"
                            src="https://www.youtube.com/embed/{{ $budaya['video_id'] }}?start={{ $budaya['video_start'] ?? 0 }}" 
                            title="Video Edukasi {{ $budaya['nama'] }}"
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                        </iframe>
                        @else
                            <div class="flex items-center justify-center w-full h-full">
                                <div class="text-center">
                                    <svg class="w-16 h-16 text-red-500 mx-auto mb-2" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                    <p class="text-white text-sm">Video Edukasi sedang disiapkan</p>
                                </div>
                            </div>
                        @endif
                    </div>
                    <p class="text-xs text-gray-500 mt-2 italic text-center">Video Edukasi: {{ $budaya['nama'] }} - Edukasi Budaya</p>
                </div>

                <!-- Pesan Moral -->
                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-r-lg">
                    <p class="text-sm font-bold text-yellow-800 mb-1">💡 Pesan Moral & Karakter</p>
                    <p class="text-xs text-yellow-700 leading-relaxed">{{ $budaya['pesan_moral'] ?? 'Milikilah kebanggaan akan budaya daerahmu!' }}</p>
                </div>
            </div>

            <!-- GRID INFORMASI BUDAYA (DENGAN GAMBAR & PENJELASAN) -->
            <div class="bg-white rounded-3xl p-6 md:p-8 shadow-sm border border-gray-100">
                <h2 class="text-lg font-bold text-gray-800 mb-4">🏛️ Informasi Budaya</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <!-- Rumah Adat -->
                    <div class="bg-blue-50 border border-blue-100 rounded-2xl overflow-hidden">
                        <img src="{{ $budaya['foto_rumah'] }}" alt="Rumah Adat" class="w-full h-40 object-cover">
                        <div class="p-4">
                            <span class="text-xs text-gray-500">🏠 Rumah Adat</span>
                            <p class="text-lg font-bold text-gray-800 mt-1">{{ $budaya['rumah'] }}</p>
                           <p class="text-xs text-gray-600 mt-2 leading-relaxed">{{ $budaya['desc_rumah'] ?? 'Rumah adat khas ' . $budaya['nama'] . '.' }}</p>
                        </div>
                    </div>

                    <!-- Tarian Daerah -->
                    <div class="bg-pink-50 border border-pink-100 rounded-2xl overflow-hidden">
                        <img src="{{ $budaya['foto_tari'] }}" alt="Tarian Daerah" class="w-full h-40 object-cover">
                        <div class="p-4">
                            <span class="text-xs text-gray-500">💃 Tarian Daerah</span>
                            <p class="text-lg font-bold text-gray-800 mt-1">{{ $budaya['tari'] }}</p>
                            <p class="text-xs text-gray-600 mt-2 leading-relaxed">{{ $budaya['desc_tari'] ?? 'Tarian tradisional ' . $budaya['nama'] . '.' }}</p>
                        </div>
                    </div>

                    <!-- Makanan Khas -->
                    <div class="bg-yellow-50 border border-yellow-100 rounded-2xl overflow-hidden">
                        <img src="{{ $budaya['foto_makanan'] }}" alt="Makanan Khas" class="w-full h-40 object-cover">
                        <div class="p-4">
                            <span class="text-xs text-gray-500">🍛 Makanan Khas</span>
                            <p class="text-lg font-bold text-gray-800 mt-1">{{ $budaya['makanan'] }}</p>
                            <p class="text-xs text-gray-600 mt-2 leading-relaxed">{{ $budaya['desc_makanan'] ?? 'Kuliner khas ' . $budaya['nama'] . '.' }}</p>
                        </div>
                    </div>
                    <!-- Alat Musik -->
                    <div class="bg-purple-50 border border-purple-100 rounded-2xl overflow-hidden">
                        <img src="{{ $budaya['foto_musik'] }}" alt="Alat Musik" class="w-full h-40 object-cover">
                        <div class="p-4">
                            <span class="text-xs text-gray-500">🎵 Alat Musik</span>
                            <p class="text-lg font-bold text-gray-800 mt-1">{{ $budaya['musik'] }}</p>
                            <p class="text-xs text-gray-600 mt-2 leading-relaxed">{{ $budaya['desc_musik'] ?? 'Alat musik tradisional ' . $budaya['nama'] . '.' }}</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- ========================================== -->
        <!-- KANAN: SIDEBAR (FAKTA & KUIS) -->
        <!-- ========================================== -->
        <div class="lg:col-span-1 space-y-6">

            <!-- FAKTA & KEUNIKAN -->
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">
                <h2 class="text-lg font-bold text-gray-800 flex items-center gap-2 mb-4">💡 Fakta & Keunikan</h2>
                
                <div class="space-y-4">
                    <div class="bg-yellow-50 p-4 rounded-xl border border-yellow-100">
                        <p class="text-xs font-bold text-yellow-800 mb-1">✨ KEUNIKAN UTAMA</p>
                        <p class="text-xs text-gray-600 leading-relaxed">{{ $budaya['keunikan'] ?? 'Provinsi ini memiliki keunikan budaya yang khas.' }}</p>
                    </div>
                    <div class="bg-blue-50 p-4 rounded-xl border border-blue-100">
                        <p class="text-xs font-bold text-blue-800 mb-1">🚀 FAKTA UNIK</p>
                        <p class="text-xs text-gray-600 leading-relaxed">{{ $budaya['fakta_unik'] ?? 'Provinsi ini memiliki warisan budaya yang menarik.' }}</p>
                    </div>
                </div>
            </div>

            <!-- TOMBOL MAIN KUIS -->
            <a href="{{ route('kuis.index') }}" class="block bg-emerald-600 hover:bg-emerald-700 text-white text-center font-bold py-3 px-4 rounded-xl transition shadow-md">
                🎯 Main Kuis Sekarang
            </a>

        </div>

    </div>

</div>
@endsection