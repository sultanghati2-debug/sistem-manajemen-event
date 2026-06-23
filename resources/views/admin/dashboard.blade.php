<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - SAINTEKMU EVENT</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 font-sans antialiased text-slate-300">

    <header class="bg-slate-800 border-b border-slate-700 px-6 py-4 flex justify-between items-center sticky top-0 z-50 shadow-md">
        <div class="flex items-center gap-4">
            <a href="{{ url('/') }}" class="w-10 h-10 bg-indigo-600 rounded-lg flex items-center justify-center font-bold text-white shadow-lg shadow-indigo-600/20 hover:bg-indigo-500 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
            </a>
            <h1 class="text-xl font-bold text-white">SAINTEKMU <span class="text-indigo-400">Admin</span></h1>
        </div>
        
        <div class="flex items-center gap-4">
            <span class="text-sm font-medium hidden sm:block text-slate-300">
                Halo, <span class="text-indigo-400 font-semibold">{{ Auth::user()->name ?? 'Admin' }}</span>
            </span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-sm bg-rose-600/10 border border-rose-600/30 text-rose-400 hover:bg-rose-600 hover:text-white px-4 py-2 rounded-lg transition duration-300">
                    Logout
                </button>
            </form>
        </div>
    </header>

    <main class="container mx-auto px-4 py-8 max-w-7xl">
        
        <div class="mb-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="text-3xl font-bold text-white mb-1">Dashboard Admin</h2>
                <p class="text-slate-400">Kelola semua event, pantau peserta, dan atur sistem dari satu tempat.</p>
            </div>
            
            <a href="{{ route('admin.events.create') }}" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-500 text-white font-medium px-5 py-2.5 rounded-lg transition duration-300 shadow-md shadow-indigo-600/20 whitespace-nowrap">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
    </svg>
    Buat Event Baru
</a>
        </div>

       <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            
            <div class="bg-slate-800 border border-slate-700 rounded-xl p-6 shadow-lg flex items-center gap-4 hover:border-slate-500 transition-colors">
                <div class="p-3 bg-blue-500/10 text-blue-400 rounded-lg border border-blue-500/20">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <div>
                    <h3 class="text-slate-400 text-sm font-medium">Total Event</h3>
                    <p class="text-2xl font-bold text-white mt-1">{{ $totalEvents }}</p>
                </div>
            </div>

            <div class="bg-slate-800 border border-slate-700 rounded-xl p-6 shadow-lg flex items-center gap-4 hover:border-slate-500 transition-colors">
                <div class="p-3 bg-emerald-500/10 text-emerald-400 rounded-lg border border-emerald-500/20">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <div>
                    <h3 class="text-slate-400 text-sm font-medium">Total Peserta</h3>
                    <p class="text-2xl font-bold text-white mt-1 flex items-center gap-2">
                        148 <span class="text-xs text-emerald-400 font-normal bg-emerald-400/10 px-2 py-0.5 rounded-full">+12%</span>
                    </p>
                </div>
            </div>

            <div class="bg-slate-800 border border-slate-700 rounded-xl p-6 shadow-lg flex items-center gap-4 hover:border-slate-500 transition-colors">
                <div class="p-3 bg-purple-500/10 text-purple-400 rounded-lg border border-purple-500/20">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <h3 class="text-slate-400 text-sm font-medium">Pendaftaran Hari Ini</h3>
                    <p class="text-2xl font-bold text-white mt-1">
                        12
                    </p>
                </div>
            </div>
            
        </div>

        <div class="bg-slate-800 border border-slate-700 rounded-xl shadow-lg overflow-hidden">
            <div class="bg-slate-800 border border-slate-700 rounded-xl shadow-lg overflow-hidden">
            <div class="px-6 py-5 border-b border-slate-700 bg-slate-800/50 flex justify-between items-center">
                <h3 class="text-lg font-bold text-white">Kelola Event</h3>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-900/50 text-slate-400 text-sm uppercase tracking-wider border-b border-slate-700">
                            <th class="px-6 py-4 font-medium">Judul Event</th>
                            <th class="px-6 py-4 font-medium">Tanggal</th>
                            <th class="px-6 py-4 font-medium">Lokasi</th>
                            <th class="px-6 py-4 font-medium text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-700 text-slate-300">
                        @forelse($events as $event)
                        <tr class="hover:bg-slate-700/50 transition duration-200">
                            <td class="px-6 py-4">
                                <div class="font-semibold text-white">{{ $event->title }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                {{ $event->event_date ? \Carbon\Carbon::parse($event->event_date)->translatedFormat('d F Y') : '-' }}
                            </td>
                            <td class="px-6 py-4 text-sm">{{ $event->location }}</td>
                            <td class="px-6 py-4 flex justify-end gap-2">
                            <a href="{{ route('events.show', $event->id) }}" target="_blank" class="bg-slate-600/50 text-slate-300 hover:bg-slate-500 hover:text-white px-3 py-1.5 rounded text-sm transition">Lihat</a>

                            <a href="{{ route('admin.events.edit', $event->id) }}" class="bg-blue-600/20 text-blue-400 hover:bg-blue-600 hover:text-white px-3 py-1.5 rounded text-sm transition">Edit</a>
                            
                            <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus event ini secara permanen?');" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-rose-600/20 text-rose-400 hover:bg-rose-600 hover:text-white px-3 py-1.5 rounded text-sm transition">Hapus</button>
                            </form>
                        </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-slate-400">
                                Belum ada event yang dibuat.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        </div>

    </main>

</body>
</html>