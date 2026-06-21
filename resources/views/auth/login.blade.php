<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center items-center bg-gray-950 font-sans antialiased px-4 relative overflow-hidden">
        
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-indigo-600/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-purple-600/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="w-full sm:max-w-md bg-gray-900 border border-gray-800/80 p-8 rounded-2xl shadow-xl backdrop-blur-sm relative z-10">
            
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold tracking-wider text-white">
                    SAINTEK<span class="text-indigo-500">MU</span>
                </h2>
                <p class="text-sm text-gray-450 mt-2">Silakan masuk ke akun Anda untuk melanjutkan</p>
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-gray-400 mb-2">Alamat Email</label>
                    <input id="email" class="block w-full px-4 py-3 rounded-xl bg-gray-955 border border-gray-800 text-white placeholder-gray-500 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 outline-none transition text-sm" 
                           type="email" 
                           name="email" 
                           :value="old('email')" 
                           required 
                           autofocus 
                           autocomplete="username" 
                           placeholder="nama@email.com" />
                    <x-input-error :messages="$errors->get('email')" class="mt-1.5 text-xs text-rose-400" />
                </div>

                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-gray-400">Kata Sandi</label>
                        @if (Route::has('password.request'))
                            <a class="text-xs text-indigo-400 hover:text-indigo-300 transition-colors" href="{{ route('password.request') }}">
                                Lupa sandi?
                            </a>
                        @endif
                    </div>
                    <input id="password" class="block w-full px-4 py-3 rounded-xl bg-gray-955 border border-gray-800 text-white placeholder-gray-500 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 outline-none transition text-sm" 
                           type="password" 
                           name="password" 
                           required 
                           autocomplete="current-password" 
                           placeholder="••••••••" />
                    <x-input-error :messages="$errors->get('password')" class="mt-1.5 text-xs text-rose-400" />
                </div>

                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" class="w-4 h-4 rounded border-gray-800 bg-gray-955 text-indigo-600 focus:ring-indigo-500 focus:ring-offset-gray-900 focus:ring-1" name="remember">
                    <label for="remember_me" class="ml-2 text-sm text-gray-400 cursor-pointer select-none">Ingat akun saya</label>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full justify-center inline-flex items-center bg-indigo-600 hover:bg-indigo-500 text-white font-semibold px-6 py-3 rounded-xl transition duration-300 shadow-lg shadow-indigo-600/20 text-sm cursor-pointer">
                        Masuk Sekarang
                    </button>
                </div>
            </form>

            @if (Route::has('register'))
                <div class="text-center mt-6 pt-4 border-t border-gray-850/50">
                    <p class="text-sm text-gray-400">
                        Belum punya akun? 
                        <a href="{{ route('register') }}" class="text-indigo-400 hover:text-indigo-300 font-semibold transition-colors ml-1">
                            Daftar di sini
                        </a>
                    </p>
                </div>
            @endif

        </div>
    </div>
</x-guest-layout>