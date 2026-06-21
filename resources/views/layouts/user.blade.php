<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - @yield('title', 'SaintekMu')</title>
    
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-950 font-sans antialiased text-gray-200">

    <div class="flex min-h-screen">
        <aside class="w-64 bg-gray-900 border-r border-gray-850 flex flex-col fixed inset-y-0 left-0 z-20">
            <div class="h-16 flex items-center px-6 border-b border-gray-800">
                <span class="text-lg font-bold tracking-wider text-indigo-450">SAINTEKMU <span class="text-xs bg-emerald-600/20 text-emerald-400 px-1.5 py-0.5 rounded ml-1 font-medium">USER</span></span>
            </div>

            <nav class="flex-1 px-4 py-6 space-y-1">
                <a href="/dashboard" class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl bg-indigo-600 text-white transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Beranda
                </a>

                <a href="#" class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl text-gray-400 hover:bg-gray-850 hover:text-white transition-all group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 group-hover:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                    </svg>
                    Tiket Saya
                </a>
            </nav>

            <div class="p-4 border-t border-gray-800 bg-gray-900">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center font-bold text-sm text-white">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center font-bold text-sm text-white">
    {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
</div>
                        </div>
                        <div class="truncate max-w-[120px]">
                            <p class="text-xs font-semibold text-white leading-tight truncate">{{ Auth::user()->name ?? 'User Biasa' }}</p>
                            <p class="text-[10px] text-gray-500 truncate">{{ Auth::user()->email ?? 'user@mail.com' }}</p>
                        </div>
                    </div>
                    
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-500 hover:text-rose-450 transition-colors p-1 rounded-lg hover:bg-gray-850">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <div class="flex-1 pl-64 flex flex-col">
            <header class="h-16 bg-gray-900/50 backdrop-blur-md border-b border-gray-800 flex items-center justify-between px-8 sticky top-0 z-10">
                <h2 class="text-sm font-semibold text-gray-400">Ruang Pengguna</h2>
                <div class="text-xs text-gray-500 font-medium">
                    {{ now()->translatedFormat('l, d F Y') }}
                </div>
            </header>

            <main class="flex-1 p-8 bg-gray-950">
                @yield('content')
            </main>
        </div>
    </div>

</body>
</html>