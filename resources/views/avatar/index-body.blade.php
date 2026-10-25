<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karakter Kamu - Nusantara Land</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #0f172a; margin: 0; overflow-x: hidden; }
        
        .bg-nusantara-dark { background-color: #0f3d2e; }
        .bg-nusantara-gold { background-color: #fbbf24; }
        .text-nusantara-gold { color: #fbbf24; }

        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob { animation: blob 7s infinite; }
        .animation-delay-2000 { animation-delay: 2s; }
        .animation-delay-4000 { animation-delay: 4s; }
    </style>
</head>
<body class="text-white min-h-screen">

    <!-- NAVBAR MANUAL -->
    <nav class="bg-nusantara-dark text-white py-4 px-6 shadow-md relative z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
                <div class="w-10 h-10 border-2 border-nusantara-gold rounded-full flex items-center justify-center">
                    <i class="fas fa-star text-nusantara-gold"></i>
                </div>
                <div class="text-xl font-bold tracking-wider">
                    NUSANTARA <span class="text-nusantara-gold">LAND</span>
                </div>
            </a>

            <div class="hidden md:flex gap-8 font-medium text-sm items-center">
                <a href="{{ route('dashboard') }}" class="hover:text-nusantara-gold transition">Beranda</a>
                <a href="{{ route('kuis.index') }}" class="hover:text-nusantara-gold transition">Kuis</a>
                <a href="{{ route('avatar.index') }}" class="hover:text-nusantara-gold transition">Kostumisasi</a>
            </div>

            @auth
            <div class="flex items-center gap-3">
                <div class="bg-gray-800 rounded-full px-4 py-1 flex items-center gap-2 border border-gray-600">
                    <i class="fas fa-star text-nusantara-gold text-xs"></i>
                    <span class="text-sm font-bold">{{ $user->points ?? 0 }} poin</span>
                </div>
                <a href="{{ route('profile.edit') }}" class="bg-yellow-500 text-black rounded-full px-3 py-1 flex items-center gap-2 font-bold hover:bg-yellow-400 transition">
                    <span class="w-6 h-6 rounded-full flex items-center justify-center text-sm bg-black text-white">
                        {{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}
                    </span>
                    <span class="text-sm">Lv {{ $user->level ?? 1 }}</span>
                </a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-sm text-red-300 hover:text-red-100 transition" title="Logout">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
            </div>
            @endauth
        </div>
    </nav>

    <!-- KONTEN UTAMA FULL SCREEN -->
    <div class="min-h-[calc(100vh-72px)] bg-[#0f172a] flex flex-col items-center justify-center p-4 relative overflow-hidden">

        <!-- Background Blob -->
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-emerald-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob pointer-events-none"></div>
        <div class="absolute top-1/2 right-1/4 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob animation-delay-2000 pointer-events-none"></div>
        <div class="absolute bottom-0 left-1/2 w-96 h-96 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob animation-delay-4000 pointer-events-none"></div>

        <!-- KARTU UTAMA -->
        <div class="relative z-10 bg-slate-800/80 border border-slate-700 rounded-3xl p-8 max-w-md w-full text-center shadow-2xl backdrop-blur-md">
            
            <h2 class="text-3xl font-black mb-1">Karakter Kamu</h2>
            <p class="text-xs text-slate-400 mb-6">Tampilan karakter saat ini</p>

            @php
                $currentActive = session('active_avatar', 'default');
                $activeData = $masterAvatars[$currentActive] ?? ['nama' => 'Baju Default', 'warna' => '#6B7280', 'emoji' => ''];
                $isPng = str_contains($activeData['emoji'] ?? '', '.png');
            @endphp

            <!-- KOTAK AVATAR -->
            <div class="relative w-64 h-80 mx-auto rounded-3xl flex flex-col items-center justify-center shadow-inner mb-6 overflow-hidden border-2 border-slate-700 bg-slate-900/50">
                <div class="absolute inset-0 bg-gradient-to-b from-white/5 to-transparent pointer-events-none"></div>

                @if($isPng)
                    <!-- JIKA KOSTUM PNG (SURJAN) -->
                    <img src="{{ asset('image/avatar/' . $activeData['emoji']) }}" 
                         class="absolute inset-0 w-full h-full object-contain p-2 z-20 drop-shadow-lg" 
                         alt="{{ $activeData['nama'] }}">
                @else
                    <!-- JIKA DEFAULT / EMOJI: TAMPILKAN OUTFIT-DEFAULD -->
                    <img src="{{ asset('image/avatar/outfit-defauld.png') }}" 
                         class="absolute inset-0 w-full h-full object-contain p-4 z-10 drop-shadow-2xl" 
                         alt="Karakter Default">
                    
                    <!-- TAMBAHKAN EMOJI JIKA BUKAN DEFAULT -->
                    @if($currentActive !== 'default' && !empty($activeData['emoji']))
                        <div class="absolute inset-0 flex items-center justify-center z-20" style="padding-top: 10%;">
                            <div class="text-9xl drop-shadow-2xl">{{ $activeData['emoji'] }}</div>
                        </div>
                    @endif
                @endif
            </div>

            <!-- INFO KOSTUM -->
            <div class="mb-8">
                <h3 class="text-2xl font-black text-white">{{ $activeData['nama'] }}</h3>
                <span class="inline-flex items-center gap-1 mt-2 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-400 text-xs font-bold border border-emerald-500/30">
                    <span>✓</span> Sedang Dipakai
                </span>
            </div>

            <!-- TOMBOL KOSTUMISASI -->
            <a href="{{ route('avatar.kostumisasi') }}" 
               class="group block w-full py-4 px-6 rounded-2xl bg-emerald-500 hover:bg-emerald-600 text-slate-950 font-extrabold text-base transition shadow-lg shadow-emerald-500/20 mb-3 cursor-pointer relative overflow-hidden">
                <div class="absolute inset-0 bg-white/20 transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>
                <span class="relative z-10 flex items-center justify-center gap-2">
                    👕 Kostumisasi Karakter
                </span>
            </a>

            <!-- TOMBOL KEMBALI -->
            <a href="{{ route('dashboard') }}" class="text-sm text-slate-300 hover:text-white transition inline-flex items-center gap-1 mt-2">
                <span>←</span> Kembali ke Dashboard
            </a>
        </div>
    </div>

</body>
</html>