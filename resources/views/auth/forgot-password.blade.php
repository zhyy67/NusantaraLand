<x-guest-layout>
    <div class="text-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Lupa Kata Sandi? 🔑</h2>
        <p class="text-sm text-gray-500 mt-2">
            Masukkan alamat email Anda. Kami akan mengirimkan tautan untuk mengatur ulang kata sandi Anda.
        </p>
    </div>

    <!-- Session Status -->
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600 bg-green-50 p-3 rounded-lg border border-green-200">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-bold text-gray-700 mb-1.5">Alamat Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                class="w-full border border-gray-300 rounded-xl shadow-sm focus:border-yellow-400 focus:ring focus:ring-yellow-400/20 px-4 py-3.5 bg-gray-50 text-base text-gray-800 transition-colors">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Tombol Kirim -->
        <div class="pt-4">
            <button type="submit" class="w-full bg-[#0f3d2e] hover:bg-green-900 text-white font-bold py-3.5 rounded-xl transition shadow-lg flex justify-center items-center gap-2">
                <i class="fas fa-paper-plane"></i> KIRIM TAUTAN RESET
            </button>
        </div>

        <!-- Link Kembali -->
        <div class="text-center mt-6 pt-4 border-t border-gray-100">
            <a href="{{ route('login') }}" class="text-sm text-green-600 hover:text-green-800 font-semibold">
                ← Kembali ke Halaman Masuk
            </a>
        </div>
    </form>
</x-guest-layout>