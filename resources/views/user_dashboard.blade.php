<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ruang Pengguna - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#050B14] text-white flex h-screen overflow-hidden">

    <aside class="w-64 bg-[#0B1120] border-r border-gray-800 flex flex-col justify-between hidden md:flex">
        <div>
            <div class="p-6 flex items-center gap-3">
                <span class="text-xl font-bold tracking-widest text-indigo-400">SAINTEKMU</span>
                <span class="bg-emerald-900/50 text-emerald-400 text-[10px] font-bold px-2 py-0.5 rounded border border-emerald-800/50">USER</span>
            </div>
            
            <nav class="px-4 space-y-2 mt-4">
                <a href="{{ route('user.dashboard') }}" class="flex items-center gap-3 bg-indigo-600 text-white px-4 py-3.5 rounded-xl font-semibold shadow-lg shadow-indigo-600/20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>
                    Beranda
                </a>
               <a href="/#semua-event" class="flex items-center gap-3 text-gray-400 hover:text-white px-4 py-3.5 rounded-xl font-medium transition duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                </svg>Lihat Event
                </a>
            </nav>
        </div>

        <div class="p-5 border-t border-gray-800 flex items-center justify-between">
            <div class="flex items-center gap-3 overflow-hidden">
                <div class="w-10 h-10 rounded-full bg-indigo-600 flex items-center justify-center font-bold text-white shrink-0">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div class="flex flex-col truncate">
                    <span class="text-sm font-semibold text-white truncate">{{ Auth::user()->name }}</span>
                    <span class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</span>
                </div>
            </div>
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-gray-500 hover:text-red-400 transition ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </button>
            </form>
        </div>
    </aside>

    <main class="flex-1 flex flex-col h-screen overflow-y-auto">
        <header class="flex justify-between items-center px-8 py-5 border-b border-gray-800 bg-[#0B1120]/50 backdrop-blur-sm sticky top-0 z-10">
            <h2 class="text-gray-400 text-sm font-medium">Ruang Pengguna</h2>
            <div class="text-gray-500 text-sm font-medium">{{ \Carbon\Carbon::now()->format('l, d F Y') }}</div>
        </header>

        <div class="p-8 max-w-5xl">
            <div class="mb-10">
                <h1 class="text-4xl font-extrabold text-white mb-3">Halo, {{ explode(' ', Auth::user()->name)[0] }}! 👋</h1>
                <p class="text-gray-400 text-lg">Selamat datang di portal akun kamu. Cek status agenda dan kegiatanmu di sini.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                <div class="bg-[#0f172a] border border-gray-800 rounded-2xl p-6 flex justify-between items-center shadow-lg">
                    <div>
                        <p class="text-gray-500 text-xs font-bold tracking-widest mb-2 uppercase">Event Diikuti</p>
                        <p class="text-5xl font-extrabold text-white">{{ $registeredEvents->count() ?? 0 }}</p>
                    </div>
                    <div class="text-indigo-500 bg-indigo-500/10 p-4 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                        </svg>
                    </div>
                </div>

                <div class="bg-[#0f172a] border border-gray-800 rounded-2xl p-6 flex justify-between items-center shadow-lg">
                    <div>
                        <p class="text-gray-500 text-xs font-bold tracking-widest mb-2 uppercase">Sertifikat Tersedia</p>
                        <p class="text-5xl font-extrabold text-white">{{ $certificateCount ?? 0 }}</p>
                    </div>
                    <div class="text-emerald-500 bg-emerald-500/10 p-4 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div id="tiket">
                @if(isset($registeredEvents) && $registeredEvents->count() > 0)
                    <h3 class="text-xl font-bold text-white mb-6">Tiket Saya</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($registeredEvents as $event)
                            <div class="bg-[#111827] border border-gray-800 rounded-2xl p-6 hover:border-indigo-500/50 transition duration-300">
                                <h4 class="text-xl font-bold text-white mb-3">{{ $event->title }}</h4>
                                <div class="flex items-center gap-2 text-gray-400 text-sm mb-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('d F Y') }}
                                </div>
                                <a href="{{ route('events.show', $event->id) }}" class="text-indigo-400 hover:text-indigo-300 text-sm font-medium flex items-center gap-1">
                                    Lihat Detail <span>&rarr;</span>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="bg-[#0f172a] border border-gray-800 rounded-3xl p-12 flex flex-col items-center text-center mt-4 shadow-lg">
                        <div class="w-14 h-14 rounded-full border border-gray-600 flex items-center justify-center text-gray-400 mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-3">Kamu belum mendaftar di event manapun</h3>
                        <p class="text-gray-400 mb-8 max-w-md">Jelajahi berbagai agenda seru di halaman utama dan lakukan pendaftaran untuk mulai berpartisipasi.</p>
                        <a href="/#semua-event" class="bg-indigo-600 hover:bg-indigo-500 text-white font-semibold px-8 py-3.5 rounded-xl transition shadow-lg shadow-indigo-600/20">
                        Cari Event Menarik
                        </a>
                    </div>
                @endif
            </div>

        </div>
    </main>
</body>
</html>