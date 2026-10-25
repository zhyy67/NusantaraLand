@extends('layouts.app')

@section('title', 'Kuis Budaya - Nusantara Land')

@section('content')
<div class="max-w-5xl mx-auto py-6 px-4">

    <!-- HEADER HIJAU TOSKA -->
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

    <!-- Konten Kuis -->
    @if ($alreadyCompleted)
        <div class="bg-white rounded-3xl p-8 shadow-sm text-center border border-gray-100">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">✅ Kuis sudah diselesaikan</h2>
            <p class="text-gray-600 mb-6">Kamu sudah pernah menyelesaikan kuis daerah ini. Coba jelajahi budaya daerah lainnya!</p>
            <div class="flex flex-wrap justify-center gap-3">
                <a href="{{ route('kuis.index') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 px-6 rounded-xl transition shadow-md">🗺️ Pilih Daerah Lain</a>
                <a href="{{ route('dashboard') }}" class="bg-gray-700 hover:bg-gray-600 text-white font-bold py-3 px-6 rounded-xl transition shadow-md">🏠 Dashboard</a>
            </div>
        </div>
    @else
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
                <div class="pt-4">
                    <button type="submit" class="w-full md:w-auto bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold py-3.5 px-10 rounded-xl shadow-lg shadow-emerald-500/30 transition transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                        <i class="fas fa-check-circle"></i> KIRIM JAWABAN
                    </button>
                </div>
            @endif
        </form>
    @endif

    <!-- Tombol Navigasi Bawah (Hanya muncul jika belum selesai) -->
    @if (!$alreadyCompleted)
        <div class="flex flex-wrap gap-3 mt-8">
            <a href="{{ route('budaya.index') }}" class="bg-gray-700 hover:bg-gray-600 text-white font-bold py-3 px-6 rounded-xl transition shadow-md flex items-center gap-2">
                <span>🗺️</span> Informasi Budaya
            </a>
            <a href="{{ route('dashboard') }}" class="bg-gray-700 hover:bg-gray-600 text-white font-bold py-3 px-6 rounded-xl transition shadow-md flex items-center gap-2">
                <span>🏠</span> Dashboard
            </a>
        </div>
    @endif

</div>
@endsection