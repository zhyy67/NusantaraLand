<x-guest-layout>
    <div class="text-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Buat Akun Baru 🌟</h2>
        <p class="text-sm text-gray-500 mt-1">Bergabunglah menjadi Sultan Nusantara!</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-bold text-gray-700 mb-1.5">Nama Lengkap</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                class="w-full border border-gray-300 rounded-xl shadow-sm focus:border-yellow-400 focus:ring focus:ring-yellow-400/20 px-4 py-3.5 bg-gray-50 text-base text-gray-800 transition-colors">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-bold text-gray-700 mb-1.5">Alamat Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                class="w-full border border-gray-300 rounded-xl shadow-sm focus:border-yellow-400 focus:ring focus:ring-yellow-400/20 px-4 py-3.5 bg-gray-50 text-base text-gray-800 transition-colors">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password dengan Ikon Mata -->
        <div>
            <label for="password" class="block text-sm font-bold text-gray-700 mb-1.5">Kata Sandi</label>
            <div class="relative">
                <input id="password" type="password" name="password" required autocomplete="new-password"
                    class="w-full border border-gray-300 rounded-xl shadow-sm focus:border-yellow-400 focus:ring focus:ring-yellow-400/20 px-4 py-3.5 bg-gray-50 text-base text-gray-800 pr-12 transition-colors">
                <button type="button" onclick="togglePassword('password', 'eye-icon-1')" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none">
                    <i id="eye-icon-1" class="fas fa-eye"></i>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password dengan Ikon Mata -->
        <div>
            <label for="password_confirmation" class="block text-sm font-bold text-gray-700 mb-1.5">Konfirmasi Kata Sandi</label>
            <div class="relative">
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                    class="w-full border border-gray-300 rounded-xl shadow-sm focus:border-yellow-400 focus:ring focus:ring-yellow-400/20 px-4 py-3.5 bg-gray-50 text-base text-gray-800 pr-12 transition-colors">
                <button type="button" onclick="togglePassword('password_confirmation', 'eye-icon-2')" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none">
                    <i id="eye-icon-2" class="fas fa-eye"></i>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Tombol Daftar -->
        <div class="pt-4">
            <button type="submit" class="w-full bg-[#0f3d2e] hover:bg-green-900 text-white font-bold py-3.5 rounded-xl transition shadow-lg flex justify-center items-center gap-2">
                <i class="fas fa-user-plus"></i> DAFTAR SEKARANG
            </button>
        </div>

        <!-- Link ke Login -->
        <div class="text-center mt-6 pt-4 border-t border-gray-100">
            <p class="text-sm text-gray-600">Sudah punya akun?</p>
            <a href="{{ route('login') }}" class="mt-2 inline-block w-full bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold py-2.5 rounded-xl transition text-sm">
                Masuk ke Akun
            </a>
        </div>
    </form>

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
</x-guest-layout>