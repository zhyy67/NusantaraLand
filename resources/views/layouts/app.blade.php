<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Nusantara Land')</title>

    <link rel="icon" type="image/png" href="{{ asset('logo/logo-nusantara.png') }}">

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f3f4f6; }

        .bg-nusantara-dark { background-color: #0f3d2e; }
        .bg-nusantara-gold { background-color: #fbbf24; }
        .text-nusantara-gold { color: #fbbf24; }

        .hero-pattern {
            background-color: #0d5c46;
            background-image: radial-gradient(#1a7a5e 1px, transparent 1px);
            background-size: 20px 20px;
        }

        .progress-bar-bg { background-color: #e5e7eb; border-radius: 9999px; height: 8px; }
        .progress-bar-fill { background-color: #fbbf24; height: 8px; border-radius: 9999px; }

        .leaderboard-row.current-user {
            background-color: #fffbeb;
            border: 1px solid #fbbf24;
        }

        /* Mencegah scroll horizontal di HP */
        html, body {
            overflow-x: hidden;
            width: 100%;
        }
    </style>

    @stack('styles')
</head>
<body class="text-gray-800">

@php
    $authUser = auth()->user();
@endphp

    <!-- Navbar -->
    <nav class="bg-nusantara-dark text-white py-3 px-4 md:px-6 shadow-md w-full relative z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center gap-2">
            
            <!-- Logo Baru -->
            <a href="{{ route('dashboard') }}" class="flex items-center gap-2 md:gap-3 shrink-0">
                <div class="w-9 h-9 md:w-12 md:h-12 bg-white rounded-full overflow-hidden border-2 border-nusantara-gold shadow-sm flex items-center justify-center p-0.5">
                    <img src="{{ asset('logo/logo-nusantara.png') }}" alt="Logo Nusantara Land" class="w-full h-full object-cover rounded-full">
                </div>
                <div class="text-sm md:text-xl font-bold tracking-wider whitespace-nowrap">
                    NUSANTARA <span class="text-nusantara-gold">LAND</span>
                </div>
            </a>

            <!-- ============================================== -->
            <!-- MENU NAVIGASI (Desktop: Tampil | HP: Dropdown) -->
            <!-- ============================================== -->
            <div id="nav-menu" class="hidden md:flex flex-col md:flex-row absolute md:relative top-full left-0 w-full md:w-auto bg-[#0a2a20] md:bg-transparent p-4 md:p-0 gap-4 md:gap-8 font-medium text-sm items-center shadow-lg md:shadow-none border-t border-gray-700 md:border-none transition-all duration-300">
                <a href="{{ route('dashboard') }}"
                   class="{{ request()->routeIs('dashboard') ? 'text-nusantara-gold' : 'hover:text-nusantara-gold' }} transition w-full md:w-auto text-center md:text-left py-2 md:py-0">
                    Beranda
                </a>
                <a href="{{ route('kuis.index') }}#misi" class="hover:text-nusantara-gold transition w-full md:w-auto text-center md:text-left py-2 md:py-0">Misi</a>
                <a href="{{ route('kuis.index') }}"
                   class="{{ request()->routeIs('kuis.*') ? 'text-nusantara-gold' : 'hover:text-nusantara-gold' }} transition w-full md:w-auto text-center md:text-left py-2 md:py-0">
                    Kuis
                </a>
                <a href="{{ route('kuis.index') }}#peringkat" class="hover:text-nusantara-gold transition w-full md:w-auto text-center md:text-left py-2 md:py-0">Peringkat</a>
                <a href="{{ route('avatar.index') }}"
                   class="{{ request()->routeIs('avatar.*') ? 'text-nusantara-gold' : 'hover:text-nusantara-gold' }} transition w-full md:w-auto text-center md:text-left py-2 md:py-0">
                    Kostumisasi
                </a>
            </div>

            <!-- User Info & Tombol Hamburger -->
            <div class="flex items-center gap-1 md:gap-2 ml-auto">
                @auth
                    <!-- Poin (Tampil di HP versi mini) -->
                    <div class="flex bg-gray-800 rounded-full h-7 md:h-9 px-2 md:px-4 items-center gap-1 md:gap-2 border border-gray-600 shrink-0">
                        <i class="fas fa-star text-nusantara-gold text-[9px] md:text-xs"></i>
                        <span class="text-[9px] md:text-sm font-bold whitespace-nowrap">{{ $authUser->points ?? 0 }}</span>
                    </div>

                    <!-- Level & Avatar (Tampil di HP versi mini) -->
                    <a href="{{ route('profile.edit') }}" class="flex bg-yellow-500 text-black rounded-full h-7 md:h-9 px-1.5 md:px-4 items-center gap-1 md:gap-2 font-bold hover:bg-yellow-400 transition shrink-0">
                        <span class="bg-black text-white rounded-full w-4 h-4 md:w-5 md:h-5 flex items-center justify-center text-[9px] md:text-xs">
                            {{ strtoupper(substr($authUser->name ?? 'U', 0, 1)) }}
                        </span>
                        <!-- Tampil Lv di Desktop, Angka saja di HP -->
                        <span class="text-[9px] md:text-sm whitespace-nowrap hidden sm:inline">Lv {{ $authUser->level ?? 1 }}</span>
                        <span class="text-[9px] font-bold sm:hidden">{{ $authUser->level ?? 1 }}</span>
                    </a>

                    <!-- Logout (Hanya Icon di HP) -->
                    <form method="POST" action="{{ route('logout') }}" class="inline-flex m-0 shrink-0">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-sm font-bold rounded-full h-7 md:h-9 px-2 md:px-4 flex items-center gap-1 md:gap-2 transition" title="Logout">
                            <i class="fas fa-sign-out-alt text-[10px] md:text-sm"></i> 
                            <span class="hidden sm:inline">Keluar</span>
                        </button>
                    </form>
                @endauth

                @guest
                    <div class="flex items-center gap-2 md:gap-3">
                        <a href="{{ route('login') }}" class="text-xs md:text-sm font-semibold hover:text-nusantara-gold transition">Login</a>
                        <a href="{{ route('register') }}" class="text-xs md:text-sm font-semibold bg-nusantara-gold text-black px-3 md:px-4 py-1.5 md:py-2 rounded-full hover:bg-yellow-500 transition">Register</a>
                    </div>
                @endguest

                <!-- TOMBOL HAMBURGER (Hanya Muncul di HP) -->
                <button id="hamburger-btn" class="md:hidden text-white text-xl ml-1 focus:outline-none p-1 shrink-0">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto p-3 md:p-6 pb-20 w-full">
        @yield('content')
    </main>

    @stack('scripts')

    <!-- Script Toggle Menu Hamburger -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btn = document.getElementById('hamburger-btn');
            const menu = document.getElementById('nav-menu');
            const icon = btn.querySelector('i');

            btn.addEventListener('click', function() {
                menu.classList.toggle('hidden');
                menu.classList.toggle('flex');
                
                // Ubah ikon ☰ menjadi ❌ saat terbuka
                if (menu.classList.contains('flex')) {
                    icon.classList.remove('fa-bars');
                    icon.classList.add('fa-times');
                } else {
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                }
            });
        });
    </script>

</body>
</html>