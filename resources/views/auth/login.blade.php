<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="text-center mb-5 sm:mb-8">
        <h2 class="font-playfair text-2xl sm:text-3xl font-bold text-white mb-1 sm:mb-2">Selamat Datang</h2>
        <p class="text-[#D7CCC8] text-xs sm:text-sm">Masuk untuk mengelola Aksara Coffee</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block font-inter text-xs sm:text-sm font-medium text-white mb-1">{{ __('Email') }}</label>
            <input id="email" class="block w-full px-3 sm:px-4 py-2.5 sm:py-3 rounded-lg sm:rounded-xl bg-white/5 border border-white/20 text-white text-sm placeholder-white/50 focus:border-[#D4A574] focus:ring focus:ring-[#D4A574]/30 focus:outline-none transition" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Masukkan email anda" />
            <x-input-error :messages="$errors->get('email')" class="mt-1.5 sm:mt-2 text-red-400 text-xs sm:text-sm" />
        </div>

        <!-- Password -->
        <div class="mt-4 sm:mt-5">
            <label for="password" class="block font-inter text-xs sm:text-sm font-medium text-white mb-1">{{ __('Password') }}</label>
            <input id="password" class="block w-full px-3 sm:px-4 py-2.5 sm:py-3 rounded-lg sm:rounded-xl bg-white/5 border border-white/20 text-white text-sm placeholder-white/50 focus:border-[#D4A574] focus:ring focus:ring-[#D4A574]/30 focus:outline-none transition"
                            type="password"
                            name="password"
                            required autocomplete="current-password" placeholder="Masukkan password anda" />
            <x-input-error :messages="$errors->get('password')" class="mt-1.5 sm:mt-2 text-red-400 text-xs sm:text-sm" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between mt-4 sm:mt-5">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" class="rounded border-white/20 bg-white/5 text-[#D4A574] shadow-sm focus:ring-[#D4A574]/50 focus:ring-offset-0" name="remember">
                <span class="ms-2 text-xs sm:text-sm text-[#D7CCC8]">{{ __('Ingat saya') }}</span>
            </label>

            <!-- @if (Route::has('password.request'))
                <a class="text-xs sm:text-sm text-[#D4A574] hover:text-white transition-colors focus:outline-none" href="{{ route('password.request') }}">
                    {{ __('Lupa password?') }}
                </a>
            @endif -->
        </div>

        <div class="mt-6 sm:mt-8">
            <button type="submit" class="w-full flex justify-center py-2.5 sm:py-3 px-4 border border-transparent rounded-lg sm:rounded-xl shadow-lg text-sm font-bold text-white bg-[#D4A574] hover:bg-[#C49464] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#D4A574] transition transform hover:-translate-y-0.5 active:translate-y-0">
                {{ __('Masuk ke Dashboard') }}
            </button>
        </div>
    </form>
</x-guest-layout>
