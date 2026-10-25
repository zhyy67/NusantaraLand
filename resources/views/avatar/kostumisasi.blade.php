<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kostumisasi Karakter - Nusantara Land</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #0f172a; margin: 0; overflow-x: hidden; }
    </style>
</head>
<body class="text-white min-h-screen">

    <div class="p-4 md:p-8 max-w-7xl mx-auto">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('avatar.index') }}" class="flex items-center gap-2 bg-slate-800 hover:bg-slate-700 px-4 py-2 rounded-xl text-sm font-semibold transition">
                ← Kembali
            </a>
            <div class="flex items-center gap-2 bg-slate-800 border border-slate-700 px-4 py-1.5 rounded-full text-yellow-400 font-bold text-sm">
                <span>⭐</span> {{ number_format($user->points ?? 0) }} Poin
            </div>
        </div>

        <!-- Notifikasi -->
        @if (session('success'))
            <div class="bg-emerald-500/20 text-emerald-400 p-4 rounded-xl mb-4 border border-emerald-500/30 text-center font-bold">
                ✓ {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="bg-rose-500/20 text-rose-400 p-4 rounded-xl mb-4 border border-rose-500/30 text-center font-bold">
                ✗ {{ session('error') }}
            </div>
        @endif

        <!-- MAIN GRID -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">

            <!-- KANAN: PREVIEW -->
           <div class="lg:col-span-5 lg:order-2 bg-slate-800/80 border border-slate-700/60 rounded-3xl p-6 flex flex-col items-center justify-center min-h-[420px] shadow-2xl sticky top-24">
                <h3 class="text-xs uppercase font-extrabold tracking-widest text-slate-400 mb-4">Pratinjau Karakter</h3>

                @php
                    $currentActive = session('active_avatar', 'default');
                    $activeData = $masterAvatars[$currentActive] ?? $masterAvatars['default'];
                    $isPng = str_contains($activeData['emoji'] ?? '', '.png');
                @endphp

                <div class="relative w-56 h-64 bg-slate-900/90 rounded-2xl border-2 border-slate-700 flex items-center justify-center overflow-hidden shadow-inner">
                    
                    @if($isPng)
                        <!-- Jika PNG, tampilkan gambar itu saja -->
                        <img src="{{ asset('image/avatar/' . $activeData['emoji']) }}" class="w-full h-full object-contain p-2 z-20" alt="{{ $activeData['nama'] }}">
                    @else
                        <!-- Jika Default / Emoji, tampilkan outfit-defauld -->
                        <img src="{{ asset('image/avatar/outfit-defauld.png') }}" class="absolute inset-0 w-full h-full object-contain p-2 z-10" alt="Karakter">
                        @if($currentActive !== 'default' && !empty($activeData['emoji']))
                            <div class="absolute inset-0 flex items-center justify-center z-20" style="padding-top: 10%;">
                                <div class="text-8xl drop-shadow-lg">{{ $activeData['emoji'] }}</div>
                            </div>
                        @endif
                    @endif
                </div>

                <div class="mt-4 text-center">
                    <h4 class="text-xl font-bold text-white">{{ $activeData['nama'] }}</h4>
                    <p class="text-xs text-emerald-400 mt-1 font-semibold">✓ Sedang Dipakai</p>
                </div>

                <form action="{{ route('avatar.update') }}" method="POST" class="w-full mt-6">
                    @csrf
                    <input type="hidden" name="avatar" id="inputActiveAvatar" value="{{ $currentActive }}">
                    <button type="submit" class="w-full py-3.5 px-6 rounded-2xl bg-emerald-500 hover:bg-emerald-600 text-slate-950 font-extrabold text-base transition shadow-lg shadow-emerald-500/20">
                        Pakai Set Ini
                    </button>
                </form>
            </div>

            <!-- KIRI: GRID KOSTUM (DIKELOMPOKKAN PER PULAU) -->
            <div class="lg:col-span-7 lg:order-1 space-y-6">
                <div class="flex items-center justify-between border-b border-slate-800 pb-3">
                    <h2 class="text-2xl font-black text-white flex items-center gap-2">🎭 Set Baju Nusantara</h2>
                    <span class="text-xs text-slate-400">Selesaikan kuis daerah untuk membuka set!</span>
                </div>

                @foreach($groupedAvatars as $grupName => $avatars)
                    <!-- JUDUL KATEGORI PULAU -->
                    <div class="mt-6 mb-3">
                        <h3 class="text-lg font-bold text-slate-300 flex items-center gap-2 border-b border-slate-700 pb-2">
                             {{ $grupName }}
                        </h3>
                    </div>

                    <!-- GRID KOSTUM DALAM GRUP -->
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 mb-6">
                        @foreach($avatars as $key => $av)
                            @php
                                $isUnlocked = in_array($key, $unlocked);
                                $isActive = $currentActive == $key;
                                $isItemPng = str_contains($av['emoji'] ?? '', '.png');
                            @endphp
                            
                            <div onclick="selectOutfit('{{ $key }}', '{{ $av['nama'] }}', '{{ $av['warna'] }}', '{{ $av['emoji'] }}', {{ $isUnlocked ? 'true' : 'false' }})" 
                                 class="outfit-card cursor-pointer bg-slate-800/50 hover:bg-slate-800 border-2 {{ $isActive ? 'border-emerald-500' : 'border-slate-700' }} hover:border-slate-500 rounded-2xl p-4 flex flex-col items-center relative transition transform hover:-translate-y-1">
                                
                                @if(!$isUnlocked)
                                    <span class="absolute top-2 left-2 bg-rose-500/20 text-rose-400 text-[10px] font-extrabold px-2 py-0.5 rounded-full border border-rose-500/30">Terkunci</span>
                                @elseif($isActive)
                                    <span class="absolute top-2 left-2 bg-emerald-500/20 text-emerald-400 text-[10px] font-extrabold px-2 py-0.5 rounded-full border border-emerald-500/30">Dipakai</span>
                                @else
                                    <span class="absolute top-2 left-2 bg-blue-500/20 text-blue-400 text-[10px] font-extrabold px-2 py-0.5 rounded-full border border-blue-500/30">Terbuka</span>
                                @endif
                                
                                <!-- KOTAK GAMBAR -->
                                <div class="w-24 h-28 my-2 relative flex items-center justify-center rounded-xl overflow-hidden bg-slate-700">
                                    
                                    @if($key === 'default')
                                        <img src="{{ asset('image/avatar/outfit-defauld.png') }}" class="w-full h-full object-contain p-1">
                                    @elseif($isItemPng)
                                        <img src="{{ asset('image/avatar/' . $av['emoji']) }}" class="w-full h-full object-contain p-1">
                                    @else
                                        <span class="text-6xl">{{ $av['emoji'] }}</span>
                                    @endif
                                </div>

                                <h5 class="text-sm font-bold text-white text-center line-clamp-1">{{ $av['nama'] }}</h5>
                                
                                @if(!$isUnlocked)
                                    @if(($av['harga'] ?? 0) > 0)
                                        <!-- TOMBOL BELI -->
                                        <form action="{{ route('avatar.beli') }}" method="POST" class="mt-2 w-full" onclick="event.stopPropagation()">
                                            @csrf
                                            <input type="hidden" name="kostum_id" value="{{ $key }}">
                                            <button type="submit" class="w-full bg-yellow-500 hover:bg-yellow-600 text-black font-bold text-xs py-1.5 px-3 rounded-lg transition flex items-center justify-center gap-1">
                                                🪙 Beli {{ $av['harga'] }} Poin
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-[11px] text-rose-400 font-semibold mt-1">Selesaikan Kuis</span>
                                    @endif
                                @elseif($isActive)
                                    <span class="text-xs text-emerald-400 font-bold mt-1">Sedang Dipakai</span>
                                @else
                                    <span class="text-xs text-gray-400 font-bold mt-1">Klik untuk pilih</span>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    <!-- SCRIPT UNTUK LIVE PREVIEW -->
    <script>
        function selectOutfit(key, name, warna, emoji, isUnlocked) {
            const previewBox = document.querySelector('.relative.w-56.h-64');
            const titleEl = document.querySelector('h4.text-xl.font-bold.text-white');
            const inputEl = document.getElementById('inputActiveAvatar');

            if (isUnlocked) {
                let html = '';
                
                if (emoji && emoji.includes('.png')) {
                    // Jika PNG, tampilkan gambar itu saja
                    html = `<img src="{{ asset('image/avatar/') }}/${emoji}" class="w-full h-full object-contain p-2 z-20" alt="${name}">`;
                } else {
                    // Jika Default/Emoji, tampilkan outfit-defauld
                    html = `<img src="{{ asset('image/avatar/outfit-defauld.png') }}" class="absolute inset-0 w-full h-full object-contain p-2 z-10" alt="Karakter">`;
                    if (key !== 'default' && emoji) {
                        html += `<div class="absolute inset-0 flex items-center justify-center z-20" style="padding-top: 10%;">
                                    <div class="text-8xl drop-shadow-lg">${emoji}</div>
                                 </div>`;
                    }
                }

                previewBox.innerHTML = html;
                
                if (titleEl) titleEl.innerText = name;
                if (inputEl) inputEl.value = key;
            } else {
                alert("Kamu belum membuka kostum ini. Selesaikan kuis atau beli dengan poin!");
            }
        }
    </script>
</body>
</html>