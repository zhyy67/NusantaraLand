@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
<div class="max-w-4xl mx-auto py-8 px-4">
    
    <!-- Judul Halaman (SUDAH DIBUNGKUS KOTAK PUTIH) -->
    <div class="bg-white rounded-3xl p-6 md:p-8 shadow-sm mb-8">
        <div class="flex items-center gap-4">
            <div class="bg-purple-100 text-purple-600 p-3 rounded-xl">
                <i class="fas fa-user text-2xl"></i>
            </div>
            <div>
                <h1 class="text-3xl font-extrabold text-gray-800">Profil Pemain</h1>
                <p class="text-gray-500 mt-1">Kelola informasi akun dan keamanan Anda.</p>
            </div>
        </div>
    </div>

    <!-- Kartu Ringkasan User -->
    <div class="bg-nusantara-dark rounded-3xl p-6 md:p-8 text-white shadow-lg mb-8 flex flex-col md:flex-row items-center gap-6 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#fff 1px, transparent 1px); background-size: 20px 20px;"></div>
        
        <!-- Avatar Inisial -->
        <div class="relative z-10 w-24 h-24 bg-yellow-500 rounded-full flex items-center justify-center text-4xl font-bold text-black border-4 border-yellow-300 shadow-xl">
            {{ strtoupper(substr($user->name, 0, 1)) }}
        </div>

        <!-- Info Singkat -->
        <div class="relative z-10 text-center md:text-left flex-1">
            <h2 class="text-2xl font-bold">{{ $user->name }}</h2>
            <p class="text-green-200">{{ $user->email }}</p>
            
            <div class="flex flex-wrap justify-center md:justify-start gap-3 mt-4">
                <span class="bg-white/10 px-3 py-1 rounded-full text-sm border border-white/20">
                    ⭐ {{ $user->points }} Poin
                </span>
                <span class="bg-yellow-500 text-black px-3 py-1 rounded-full text-sm font-bold">
                    🏆 Level {{ $user->level }}
                </span>
            </div>
        </div>
        
        <!-- Tombol Kostumisasi -->
        <div class="relative z-10">
            <a href="{{ route('avatar.index') }}" class="bg-white text-green-600 hover:bg-green-50 px-5 py-2.5 rounded-xl font-bold transition shadow-md flex items-center gap-2 border border-green-200">
                👕 <span class="text-green-600">Ganti Kostum</span>
            </a>
        </div>
    </div>

    <!-- Form Update Profil (Nama & Email) -->
    <div class="bg-white rounded-3xl p-6 md:p-8 shadow-sm mb-6">
        <h3 class="text-xl font-bold text-gray-800 mb-4">Informasi Akun</h3>
        <p class="text-sm text-gray-500 mb-6">Perbarui nama dan alamat email akun Anda.</p>

        <form method="post" action="{{ route('profile.update') }}" class="space-y-5">
            @csrf
            @method('patch')

            <div>
                <label for="name" class="block text-sm font-bold text-gray-700 mb-2">Nama Lengkap</label>
                <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required
                    class="w-full border border-gray-300 rounded-xl shadow-sm focus:border-yellow-400 focus:ring focus:ring-yellow-400/20 px-4 py-3.5 bg-gray-50 text-base text-gray-800">
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-bold text-gray-700 mb-2">Alamat Email</label>
                <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required
                    class="w-full border border-gray-300 rounded-xl shadow-sm focus:border-yellow-400 focus:ring focus:ring-yellow-400/20 px-4 py-3.5 bg-gray-50 text-base text-gray-800">
                @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="bg-[#0f3d2e] hover:bg-green-900 text-white font-bold py-3 px-6 rounded-xl transition shadow-md">
                    Simpan Perubahan
                </button>
                @if (session('status') === 'profile-updated')
                    <p class="text-sm text-green-600 font-medium">✓ Berhasil disimpan!</p>
                @endif
            </div>
        </form>
    </div>

    <!-- Form Update Password -->
    <div class="bg-white rounded-3xl p-6 md:p-8 shadow-sm mb-6">
        <h3 class="text-xl font-bold text-gray-800 mb-4">Ubah Password</h3>
        <p class="text-sm text-gray-500 mb-6">Pastikan akun Anda menggunakan password yang panjang dan acak agar tetap aman.</p>

        <form method="post" action="{{ route('password.update') }}" class="space-y-5">
            @csrf
            @method('put')

            <!-- Password Saat Ini -->
            <div>
                <label for="current_password" class="block text-sm font-bold text-gray-700 mb-2">Password Saat Ini</label>
                <div class="relative">
                    <input id="current_password" name="current_password" type="password"
                        class="w-full border border-gray-300 rounded-xl shadow-sm focus:border-yellow-400 focus:ring focus:ring-yellow-400/20 px-4 py-3.5 bg-gray-50 text-base text-gray-800 pr-12">
                    <button type="button" onclick="togglePassword('current_password', 'eye-icon-curr')" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none">
                        <i id="eye-icon-curr" class="fas fa-eye"></i>
                    </button>
                </div>
                @error('current_password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Password Baru -->
            <div>
                <label for="password" class="block text-sm font-bold text-gray-700 mb-2">Password Baru</label>
                <div class="relative">
                    <input id="password" name="password" type="password"
                        class="w-full border border-gray-300 rounded-xl shadow-sm focus:border-yellow-400 focus:ring focus:ring-yellow-400/20 px-4 py-3.5 bg-gray-50 text-base text-gray-800 pr-12">
                    <button type="button" onclick="togglePassword('password', 'eye-icon-new')" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none">
                        <i id="eye-icon-new" class="fas fa-eye"></i>
                    </button>
                </div>
                @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Konfirmasi Password Baru -->
            <div>
                <label for="password_confirmation" class="block text-sm font-bold text-gray-700 mb-2">Konfirmasi Password Baru</label>
                <div class="relative">
                    <input id="password_confirmation" name="password_confirmation" type="password"
                        class="w-full border border-gray-300 rounded-xl shadow-sm focus:border-yellow-400 focus:ring focus:ring-yellow-400/20 px-4 py-3.5 bg-gray-50 text-base text-gray-800 pr-12">
                    <button type="button" onclick="togglePassword('password_confirmation', 'eye-icon-conf')" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none">
                        <i id="eye-icon-conf" class="fas fa-eye"></i>
                    </button>
                </div>
                @error('password_confirmation') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="bg-[#0f3d2e] hover:bg-green-900 text-white font-bold py-3 px-6 rounded-xl transition shadow-md">
                    Ubah Password
                </button>
                @if (session('status') === 'password-updated')
                    <p class="text-sm text-green-600 font-medium">✓ Password diubah!</p>
                @endif
            </div>
        </form>
    </div>

    <!-- Hapus Akun -->
    <div class="bg-red-50 rounded-3xl p-6 md:p-8 shadow-sm border border-red-100">
        <h3 class="text-xl font-bold text-red-800 mb-2">Hapus Akun</h3>
        <p class="text-sm text-red-600 mb-6">Setelah akun Anda dihapus, semua sumber daya dan data akan dihapus secara permanen.</p>

        <button type="button" 
            onclick="if (confirm('Apakah Anda yakin ingin menghapus akun ini?')) { document.getElementById('delete-account-form').submit(); }"
            class="bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-6 rounded-xl transition shadow-md">
            Hapus Akun
        </button>

        <form id="delete-account-form" method="post" action="{{ route('profile.destroy') }}" class="hidden">
            @csrf
            @method('delete')
            <input type="password" name="password" placeholder="Masukkan password untuk konfirmasi">
            @error('password', 'userDeletion') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </form>
    </div>

</div>

<!-- JavaScript untuk Toggle Password -->
<script>
    function togglePassword(inputId, iconId) {
        const passwordInput = document.getElementById(inputId);
        const eyeIcon = document.getElementById(iconId);
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    }
</script>
@endsection