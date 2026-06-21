<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - @yield('title', 'SaintekMu')</title>
    
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-slate-900 font-sans antialiased text-slate-200">

    <div class="flex min-h-screen">
        <aside class="w-64 bg-slate-950 border-r border-slate-800 flex flex-col fixed inset-y-0 left-0 z-20">
            <div class="h-16 flex items-center px-6 border-b border-slate-800">
                <span class="text-lg font-bold tracking-wider text-indigo-400">SAINTEKMU <span class="text-white text-xs bg-indigo-600 px-1.5 py-0.5 rounded ml-1">ADMIN</span></span>
            </div>

            <nav class="flex-1 px-4 py-6 space-y-1">
                <a href="/admin/dashboard" class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl bg-indigo-600 text-white transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z" />
                    </svg>
                    Dashboard
                </a>

                <a href="#" class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl text-slate-400 hover:bg-slate-900 hover:text-white transition-all group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-500 group-hover:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Manajemen Event
                </a>
            </nav>

            <div class="p-4 border-t border-slate-800 bg-slate-950">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-full bg-indigo-500 flex items-center justify-center font-bold text-sm text-white">
                            A
                        </div>
                        <div class="truncate max-w-[120px]">
                            <p class="text-xs font-semibold text-white leading-tight">Admin Utama</p>
                            <p class="text-[10px] text-slate-500 truncate">admin@saintekmu.com</p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-slate-500 hover:text-rose-400 transition-colors p-1 rounded-lg hover:bg-slate-900">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <div class="flex-1 pl-64 flex flex-col">
            <header class="h-16 bg-slate-950/50 backdrop-blur-md border-b border-slate-800 flex items-center justify-between px-8 sticky top-0 z-10">
                <div class="flex items-center gap-2">
                    <h2 class="text-sm font-semibold text-slate-405">Overview</h2>
                </div>
                
                <div class="text-xs text-slate-500 font-medium">
                    {{ now()->translatedFormat('l, d F Y') }}
                </div>
            </header>

            <main class="flex-1 p-8 bg-slate-900">
                @yield('content')
            </main>
        </div>
    </div>

</body>
</html>