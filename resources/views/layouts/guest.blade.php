<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Nusantara Land') }}</title>

        <!-- ========================================== -->
        <!-- TAMBAHAN: FAVICON LOGO NUSANTARA LAND      -->
        <!-- ========================================== -->
        <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><image href=%22{{ asset('logo/logo-nusantara.png') }}%22 width=%22100%22 height=%22100%22 /></svg>">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <!-- Tailwind CSS via CDN (Sesuaikan jika Anda pakai Vite) -->
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        
        <style>
            body { font-family: 'Figtree', sans-serif; }
            .bg-nusantara-dark { background-color: #0f3d2e; }
            .text-nusantara-gold { color: #fbbf24; }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <!-- Background Pattern Hijau Nusantara -->
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-nusantara-dark relative overflow-hidden" 
             style="background-image: radial-gradient(rgba(255,255,255,0.07) 1px, transparent 1px); background-size: 20px 20px;">
            
            <!-- Efek Cahaya di Belakang -->
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-green-600 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-yellow-500 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob animation-delay-2000"></div>

            <!-- Logo Baru -->
            <div class="relative z-10 mb-6 flex flex-col items-center">
                <a href="/" class="flex items-center gap-3">
                    <div class="w-16 h-16 bg-white rounded-full overflow-hidden border-4 border-nusantara-gold shadow-lg flex items-center justify-center p-1">
                        <img src="{{ asset('logo/logo-nusantara.png') }}" alt="Logo Nusantara Land" class="w-full h-full object-cover rounded-full">
                    </div>
                    <span class="text-3xl font-extrabold text-white tracking-wider">
                        NUSANTARA <span class="text-nusantara-gold">LAND</span>
                    </span>
                </a>
            </div>

            <!-- Kotak Form -->
            <div class="relative z-10 w-full sm:max-w-md mt-2 px-6 py-8 bg-white shadow-2xl overflow-hidden sm:rounded-3xl">
                {{ $slot }}
            </div>

            <!-- Footer Teks -->
            <div class="relative z-10 mt-8 text-green-200 text-sm">
                &copy; {{ date('Y') }} Nusantara Land. Melestarikan Budaya Bangsa.
            </div>
        </div>
    </body>
</html>