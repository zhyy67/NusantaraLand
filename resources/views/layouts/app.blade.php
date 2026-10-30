<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Nusantara Land')</title>

    <!-- ========================================== -->
    <!-- TAMBAHAN: FAVICON LOGO NUSANTARA LAND      -->
    <!-- ========================================== -->
    <link rel="icon" type="image/png" href="{{ asset('logo/logo-nusantara.png') }}">

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f3f4f6; }

        /* Custom Colors */
        .bg-nusantara-dark { background-color: #0f3d2e; }
        .bg-nusantara-gold { background-color: #fbbf24; }
        .text-nusantara-gold { color: #fbbf24; }

        /* Pattern Background untuk Hero */
        .hero-pattern {
            background-color: #0d5c46;
            background-image: radial-gradient(#1a7a5e 1px, transparent 1px);
            background-size: 20px 20px;
        }

        /* Styling Progress Bar */
        .progress-bar-bg { background-color: #e5e7eb; border-radius: 9999px; height: 8px; }
        .progress-bar-fill { background-color: #fbbf24; height: 8px; border-radius: 9999px; }

        /* Styling Leaderboard */
        .leaderboard-row.current-user {
            background-color: #fffbeb;
            border: 1px solid #fbbf24;
        }
    </style>

    @stack('styles')
</head>
<body class="text-gray-800">

@php
    // Ambil user yang login dengan aman
    $authUser = auth()->user();
@endphp

    <!-- Navbar -->
    <nav class="bg-nusantara-dark text-white py-4 px-6 shadow-md">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            
            <!-- Logo Baru -->
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                <div class="w-12 h-12 bg-white rounded-full overflow-hidden border-2 border-nusantara-gold shadow-sm flex items-center justify-center p-0.5">
                    <img src="{{ asset('logo/logo-nusantara.png') }}" alt="Logo Nusantara Land" class="w-full h-full object-cover rounded-full">
                </div>
                <div class="text-xl font-bold tracking-wider">
                    NUSANTARA <span class="text-nusantara-gold">LAND</span>
                </div>
            </a>

            <!-- Menu Navigasi (Desktop) -->
            <div class="hidden md:flex gap-8 font-medium text-sm items-center">
                <a href="{{ route('dashboard') }}"
                   class="{{ request()->routeIs('dashboard') ? 'text-nusantara-gold' : 'hover:text-nusantara-gold' }} transition">
                    Beranda
                </a>

                {{-- Misi & Peringkat sekarang diarahkan ke anchor di halaman Kuis --}}
                <a href="{{ route('kuis.index') }}#misi"
                   class="hover:text-nusantara-gold transition">Misi</a>

                <a href="{{ route('kuis.index') }}"
                   class="{{ request()->routeIs('kuis.*') ? 'text-nusantara-gold' : 'hover:text-nusantara-gold' }} transition">
                    Kuis
                </a>

                <a href="{{ route('kuis.index') }}#peringkat"
                   class="hover:text-nusantara-gold transition">Peringkat</a>

                <a href="{{ route('avatar.index') }}"
                   class="{{ request()->routeIs('avatar.*') ? 'text-nusantara-gold' : 'hover:text-nusantara-gold' }} transition">
                    Kostumisasi
                </a>
            </div>

            <!-- User Info -->
            @auth
            <div class="flex items-center gap-2">

                <!-- Poin -->
                <div class="bg-gray-800 rounded-full h-9 px-4 flex items-center gap-2 border border-gray-600">
                    <i class="fas fa-star text-nusantara-gold text-xs"></i>
                    <span class="text-sm font-bold">{{ $authUser->points ?? 0 }} poin</span>
                </div>

                <!-- Level & Avatar -->
                <a href="{{ route('profile.edit') }}" class="bg-yellow-500 text-black rounded-full h-9 px-4 flex items-center gap-2 font-bold hover:bg-yellow-400 transition">
                    <span class="bg-black text-white rounded-full w-5 h-5 flex items-center justify-center text-xs">
                        {{ strtoupper(substr($authUser->name ?? 'U', 0, 1)) }}
                    </span>
                    <span class="text-sm">Lv {{ $authUser->level ?? 1 }}</span>
                </a>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}" class="inline-flex m-0">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-sm font-bold rounded-full h-9 px-4 flex items-center gap-2 transition" title="Logout">
                        <i class="fas fa-sign-out-alt"></i> Keluar
                    </button>
                </form>

            </div>
            @endauth

            <!-- Menu Login (Jika belum login) -->
            @guest
            <div class="flex items-center gap-3">
                <a href="{{ route('login') }}" class="text-sm font-semibold hover:text-nusantara-gold transition">Login</a>
                <a href="{{ route('register') }}" class="text-sm font-semibold bg-nusantara-gold text-black px-4 py-2 rounded-full hover:bg-yellow-500 transition">Register</a>
            </div>
            @endguest
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto p-4 md:p-6 pb-20">
        @yield('content')
    </main>

    <!-- INI PENTING: Tempat JavaScript dari halaman lain (seperti @push('scripts')) -->
    @stack('scripts')

</body>
</html>