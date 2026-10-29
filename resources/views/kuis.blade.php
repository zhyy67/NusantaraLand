@extends('layouts.app')

@section('title', 'Kuis Budaya - Nusantara Land')

@section('content')
<div class="max-w-7xl mx-auto py-6 px-4">

    <!-- ============================================================
         HEADER HIJAU TOSKA (TETAP)
    ============================================================ -->
    <div class="bg-gradient-to-br from-[#065f46] to-[#047857] text-white p-8 md:p-10 rounded-3xl mb-8 shadow-xl relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-5 rounded-full -mr-20 -mt-20 pointer-events-none"></div>

        <a href="{{ route('dashboard') }}" class="text-sm text-emerald-200 hover:text-white transition">← Kembali ke Dashboard</a>

        <h1 class="text-3xl md:text-4xl font-extrabold mt-3">🎯 Kuis Budaya Nusantara</h1>
        <p class="text-emerald-100 mt-1">Uji pengetahuanmu tentang kebudayaan dari berbagai daerah di Indonesia!</p>

        <!-- Dropdown Pemilihan Daerah -->
        <div class="mt-5 bg-black/20 p-4 rounded-xl backdrop-blur-sm">
            <form method="GET" action="{{ route('kuis.index') }}" class="flex flex-col sm:flex-row items-center gap-3">
                <label for="daerah-select" class="font-bold text-white whitespace-nowrap">Pilih Daerah:</label>
                <select name="daerah" id="daerah-select" class="flex-1 w-full px-4 py-2 rounded-lg text-gray-800 font-semibold bg-white border-none focus:ring-2 focus:ring-emerald-300">
                    <option value="" disabled {{ !$quizKey ? 'selected' : '' }}>-- Pilih Daerah / Provinsi --</option>
                    @foreach($groupedQuestions as $groupName => $quizzes)
                        <optgroup label="{{ $groupName }}">
                            @foreach($quizzes as $quizKeyName => $quizData)
                                <option value="{{ $quizKeyName }}" {{ $quizKey == $quizKeyName ? 'selected' : '' }}>
                                    {{ $quizData['title'] }}
                                </option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
                <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 text-white font-bold py-2 px-5 rounded-lg transition shadow-md w-full sm:w-auto">
                    Muat Soal
                </button>
            </form>
        </div>

        <!-- Info Statistik -->
        <div class="flex flex-wrap gap-3 mt-4">
            <span class="bg-white/20 backdrop-blur-sm px-4 py-1.5 rounded-full text-sm font-semibold">⭐ Poin: {{ $user->points ?? 0 }}</span>
            <span class="bg-white/20 backdrop-blur-sm px-4 py-1.5 rounded-full text-sm font-semibold">🏆 Level: {{ $user->level ?? 1 }}</span>
            <span class="bg-white/20 backdrop-blur-sm px-4 py-1.5 rounded-full text-sm font-semibold">📝 {{ count($safeQuestions) }} Pertanyaan</span>
        </div>
    </div>

    <!-- Notifikasi Hasil -->
    @if (session('result'))
        <div class="bg-emerald-50 border-2 border-emerald-300 text-emerald-800 p-6 rounded-2xl mb-6 shadow-sm">
            <h2 class="text-2xl font-extrabold mb-2 flex items-center gap-2">🎉 Kuis Selesai!</h2>
            <p class="mb-1">Jawaban benar: <strong>{{ session('result.correct') }}</strong> dari {{ count($safeQuestions) }}.</p>
            <p class="mb-1">Poin yang diperoleh: <strong>+{{ session('result.earned') }}</strong>.</p>
        </div>
    @endif

    @if (session('info'))
        <div class="bg-blue-50 border border-blue-200 text-blue-800 p-4 rounded-xl mb-4">{{ session('info') }}</div>
    @endif

    @if ($errors->any())
        <div class="bg-rose-50 border border-rose-200 text-rose-800 p-4 rounded-xl mb-4">
            <strong>Ada jawaban yang perlu diperbaiki:</strong>
            <ul class="list-disc list-inside mt-2 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <!-- ============================================================
         MAIN LAYOUT: 3 KOLOM
         - Kiri (2 kolom) : Soal Kuis
         - Kanan (1 kolom): Misi + Peringkat
    ============================================================ -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- ============================
             KOLOM KIRI: SOAL KUIS
        ============================ -->
        <div class="lg:col-span-2 space-y-4">

            @if ($alreadyCompleted)
                {{-- Sudah selesai kuis --}}
                <div class="bg-white rounded-3xl p-8 shadow-sm text-center border border-gray-100">
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">✅ Kuis sudah diselesaikan</h2>
                    <p class="text-gray-600 mb-6">Kamu sudah pernah menyelesaikan kuis daerah ini. Coba jelajahi budaya daerah lainnya!</p>
                    <div class="flex flex-wrap justify-center gap-3">
                        <a href="{{ route('kuis.index') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 px-6 rounded-xl transition shadow-md">🗺️ Pilih Daerah Lain</a>
                        <a href="{{ route('dashboard') }}" class="bg-gray-700 hover:bg-gray-600 text-white font-bold py-3 px-6 rounded-xl transition shadow-md">🏠 Dashboard</a>
                    </div>
                </div>
            @else
                {{-- Form Kuis --}}
                <form action="{{ route('kuis.submit') }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="quiz_key" value="{{ $quizKey }}">

                    @forelse ($safeQuestions as $id => $question)
                        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                            <h3 class="text-lg font-bold text-gray-800 mb-4">{{ $id }}. {{ $question['question'] }}</h3>
                            <div class="space-y-2">
                                @foreach ($question['options'] as $index => $option)
                                    <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-emerald-50 hover:border-emerald-400 transition bg-gray-50">
                                        <input type="radio" name="answers[{{ $id }}]" value="{{ $index }}" required
                                            {{ (string) old("answers.$id", '') === (string) $index ? 'checked' : '' }}
                                            class="w-4 h-4 text-emerald-600 focus:ring-emerald-500 accent-emerald-600">
                                        <span class="text-sm text-gray-700">{{ $option }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @empty
                        <div class="bg-rose-50 text-rose-700 p-6 rounded-2xl border border-rose-200">
                            Soal tidak ditemukan untuk key: <strong>{{ $quizKey }}</strong>
                        </div>
                    @endforelse

                    @if(count($safeQuestions) > 0)
                        <div class="pt-2">
                            <button type="submit" class="w-full md:w-auto bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold py-3.5 px-10 rounded-xl shadow-lg shadow-emerald-500/30 transition transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                                <i class="fas fa-check-circle"></i> KIRIM JAWABAN
                            </button>
                        </div>
                    @endif
                </form>
            @endif

            <!-- ============================================================
                 TOMBOL NAVIGASI BAWAH (YANG DIUBAH)
            ============================================================ -->
            <div class="flex flex-wrap gap-3 mt-4">
                <!-- ⬇️ INI DIUBAH DARI route('budaya.index') KE route('dashboard') ⬇️ -->
                <!-- Ubah href-nya menjadi seperti ini -->
                <a href="{{ route('dashboard') }}#peta-budaya" class="bg-gray-700 hover:bg-gray-600 text-white font-bold py-3 px-6 rounded-xl transition shadow-md flex items-center gap-2">
                    <span>🗺️</span> Informasi Budaya
                </a>
                <a href="{{ route('dashboard') }}" class="bg-gray-700 hover:bg-gray-600 text-white font-bold py-3 px-6 rounded-xl transition shadow-md flex items-center gap-2">
                    <span>🏠</span> Dashboard
                </a>
            </div>
        </div>


        <!-- ============================
             KOLOM KANAN: MISI + PERINGKAT
        ============================ -->
        <div class="lg:col-span-1 space-y-6">

            <!-- CARD MISI HARIAN (Dibuat Dinamis) -->
            <div id="misi" class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 scroll-mt-24">
                <h3 class="text-lg font-bold text-gray-800 flex items-center gap-2 mb-1">
                    <span class="text-2xl">🎯</span> Misi Harian
                </h3>
                <p class="text-xs text-gray-500 mb-4">Selesaikan misi di bawah ini untuk mendapatkan poin bonus!</p>

                <div class="space-y-3">
                    @foreach ($misiHarian as $misi)
                        <div class="flex items-center gap-3 p-3 rounded-xl border transition
                            {{ $misi['selesai'] ? 'bg-gray-50 border-gray-100' : 'bg-white border-gray-200 hover:border-emerald-300' }}">
                            <input type="checkbox" {{ $misi['selesai'] ? 'checked' : '' }} disabled
                                class="w-5 h-5 text-emerald-500 rounded focus:ring-emerald-400">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold {{ $misi['selesai'] ? 'text-gray-400 line-through' : 'text-gray-700' }}">
                                    {{ $misi['judul'] }}
                                </p>
                                <p class="text-xs text-gray-500">
                                    Progress: {{ $misi['progress'] }}/{{ $misi['target'] }}
                                </p>
                            </div>
                            <span class="text-xs font-bold {{ $misi['selesai'] ? 'text-gray-400' : 'text-emerald-600' }} whitespace-nowrap">
                                +{{ $misi['reward_poin'] }} Poin
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- CARD PAPAN PERINGKAT (Dibuat Dinamis) -->
            <div id="peringkat" class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 scroll-mt-24">
                <h3 class="text-lg font-bold text-gray-800 flex items-center gap-2 mb-1">
                    <span class="text-2xl">🏆</span> Papan Peringkat
                </h3>
                <p class="text-xs text-gray-500 mb-4">Pemain dengan poin tertinggi di Nusantara Land.</p>

                <div class="space-y-2">
                    @foreach ($topPemain as $index => $pemain)
                        @php
                            $isMe = $pemain->id === auth()->id();
                            $bgClass = match($index) {
                                0 => 'bg-yellow-50 border-yellow-100',
                                1 => 'bg-gray-50 border-gray-100',
                                2 => 'bg-orange-50 border-orange-100',
                                default => 'bg-white border-gray-100',
                            };
                        @endphp
                        <div class="flex items-center gap-3 p-2.5 rounded-lg border {{ $bgClass }}">
                            <span class="text-sm font-bold w-5 text-center
                                {{ $index === 0 ? 'text-yellow-600' : ($index === 1 ? 'text-gray-500' : 'text-orange-500') }}">
                                {{ $index + 1 }}
                            </span>
                            <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold
                                {{ $index === 0 ? 'bg-yellow-200 text-yellow-700' : ($index === 1 ? 'bg-gray-200 text-gray-600' : 'bg-orange-200 text-orange-700') }}">
                                {{ strtoupper(substr($pemain->name, 0, 1)) }}
                            </div>
                            <span class="text-sm font-bold text-gray-800 flex-1 truncate">
                                {{ $isMe ? 'Kamu' : $pemain->name }}
                            </span>
                            <span class="text-xs font-bold text-gray-600 whitespace-nowrap">
                                {{ $pemain->points }} Poin
                            </span>
                        </div>
                    @endforeach

                    @if (!in_array(auth()->id(), $topPemain->pluck('id')->all()))
                        <div class="flex items-center gap-3 p-2.5 rounded-lg bg-emerald-50 border-2 border-emerald-300 mt-3">
                            <span class="text-sm font-bold text-emerald-600 w-5 text-center">
                                {{ $peringkatUser }}
                            </span>
                            <div class="w-8 h-8 rounded-full bg-emerald-200 flex items-center justify-center text-xs font-bold text-emerald-700">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                            <span class="text-sm font-bold text-emerald-800 flex-1">Kamu</span>
                            <span class="text-xs font-bold text-emerald-700">
                                {{ auth()->user()->points }} Poin
                            </span>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>

</div>
@endsection