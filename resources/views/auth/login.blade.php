<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="text-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Selamat Datang Kembali! 👋</h2>
        <p class="text-sm text-gray-500 mt-1">Masuk untuk melanjutkan petualangan budaya.</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-bold text-gray-700 mb-1.5">Alamat Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                class="w-full border border-gray-300 rounded-xl shadow-sm focus:border-yellow-400 focus:ring focus:ring-yellow-400/20 px-4 py-3.5 bg-gray-50 text-base text-gray-800 transition-colors">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password dengan Ikon Mata -->
        <div>
            <div class="flex justify-between items-center mb-1.5">
                <label for="password" class="block text-sm font-bold text-gray-700">Kata Sandi</label>
                @if (Route::has('password.request'))
                    <!-- TOMBOL LUPA SANDI DENGAN ?direct=1 -->
                    <a class="text-xs text-green-600 hover:text-green-800 font-semibold" href="{{ route('password.request') }}?direct=1">
                        Lupa sandi?
                    </a>
                @endif
            </div>
            
            <div class="relative">
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    class="w-full border border-gray-300 rounded-xl shadow-sm focus:border-yellow-400 focus:ring focus:ring-yellow-400/20 px-4 py-3.5 bg-gray-50 text-base text-gray-800 pr-12 transition-colors">
                
                <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none">
                    <i id="eye-icon" class="fas fa-eye"></i>
                </button>
            </div>
            
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500" name="remember">
            <label for="remember_me" class="ml-2 text-sm text-gray-600">Ingat saya</label>
        </div>

        <!-- Tombol Masuk -->
        <div class="pt-2">
            <button type="submit" class="w-full bg-[#0f3d2e] hover:bg-green-900 text-white font-bold py-3 rounded-xl transition shadow-lg flex justify-center items-center gap-2">
                <i class="fas fa-sign-in-alt"></i> MASUK
            </button>
        </div>

        <!-- Link ke Register -->
        <div class="text-center mt-6 pt-4 border-t border-gray-100">
            <p class="text-sm text-gray-600">Belum punya akun?</p>
            <a href="{{ route('register') }}" class="mt-2 inline-block w-full bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold py-2.5 rounded-xl transition text-sm">
                Daftar / Register
            </a>
        </div>
    </form>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            
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