<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAINTEKMU EVENT</title>
    
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-900 font-sans antialiased">

    <section class="relative min-h-screen flex items-center overflow-hidden border-b border-gray-800">
        
        @if($heroEvent && $heroEvent->image)
            <div class="absolute inset-0 z-0">
                <img src="{{ \Illuminate\Support\Str::startsWith($heroEvent->image, 'events/') ? asset('storage/' . $heroEvent->image) : asset($heroEvent->image) }}" 
                     alt="{{ $heroEvent->title }}" 
                     class="w-full h-full object-cover object-center opacity-40"
                     onerror="this.style.display='none'; this.parentElement.className='absolute inset-0 z-0 bg-gradient-to-br from-indigo-955 via-purple-955 to-slate-955 opacity-60';">
                <div class="absolute inset-0 bg-gradient-to-r from-gray-955 via-gray-900/80 to-transparent"></div>
            </div>
        @else
            <div class="absolute inset-0 z-0 bg-gradient-to-br from-indigo-955 via-purple-955 to-slate-955 opacity-60"></div>
        @endif

        <div class="container mx-auto px-6 md:px-12 relative z-10 py-20">
            <div class="max-w-3xl">
                @if($heroEvent)
                    <div class="inline-flex items-center gap-2 bg-indigo-600/80 backdrop-blur-md text-white text-xs font-semibold px-3 py-1.5 rounded-full mb-6 uppercase tracking-wider">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        {{ \Carbon\Carbon::parse($heroEvent->event_date)->translatedFormat('d F Y - H:i') }} WIB
                    </div>

                    <h1 class="text-4xl md:text-6xl font-extrabold text-white tracking-tight mb-4 leading-tight">
                        {{ $heroEvent->title }}
                    </h1>

                    <p class="text-lg md:text-xl text-gray-300 mb-8 leading-relaxed max-w-2xl">
                        {{ \Illuminate\Support\Str::limit($heroEvent->description, 160, '...') }}
                    </p>

                    <div class="flex items-center gap-2 text-gray-300 mb-8">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        </svg>
                        <span class="font-medium text-sm md:text-base">{{ $heroEvent->location }}</span>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="/events/{{ $heroEvent->id }}" class="inline-flex justify-center items-center bg-indigo-600 hover:bg-indigo-500 text-white font-semibold px-8 py-3.5 rounded-lg transition duration-300 shadow-lg shadow-indigo-600/20 text-center">
                            Detail Event
                        </a>
                        <a href="#semua-event" class="inline-flex justify-center items-center bg-white/10 hover:bg-white/20 text-white font-semibold px-8 py-3.5 rounded-lg transition duration-300 backdrop-blur-sm border border-white/10 text-center">
                            Lilihat Event Lainnya
                        </a>
                    </div>
                @else
                    <div class="inline-flex items-center gap-2 bg-emerald-600/20 text-emerald-400 text-xs font-semibold px-3 py-1.5 rounded-full mb-6 uppercase tracking-wider">
                        Selamat Datang
                    </div>
                    <h1 class="text-4xl md:text-6xl font-extrabold text-white tracking-tight mb-4 leading-tight">
                        Temukan Event Seru di Sekitarmu
                    </h1>
                    <p class="text-lg md:text-xl text-gray-300 mb-8 max-w-2xl">
                        Jangan lewatkan momen berharga. Jelajahi dan ikuti berbagai seminar, workshop, konser, dan festival menarik yang akan datang.
                    </p>
                    <a href="#semua-event" class="inline-flex bg-indigo-600 hover:bg-indigo-500 text-white font-semibold px-8 py-3.5 rounded-lg transition duration-300 shadow-lg">
                        Jelajahi Event Sekarang
                    </a>
                @endif
            </div>
        </div>
    </section>

<section id="semua-event" class="py-16 bg-slate-900">
    <div class="container mx-auto px-4 max-w-7xl">
        
        <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
            <h2 class="text-3xl font-bold text-white">Semua Event</h2>
            
            @auth
                <div class="flex flex-col items-center sm:items-end">
                    <a href="/dashboard" class="inline-flex items-center gap-2 bg-slate-800 hover:bg-slate-700 border border-slate-600 text-white font-medium px-5 py-2.5 rounded-lg transition duration-300 shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali ke Dashboard
                    </a>
                    <p class="text-xs text-slate-500 mt-2">Login sebagai: <span class="font-semibold text-indigo-400">{{ Auth::user()->name }}</span></p>
                </div>
            @else
                <a href="{{ route('login') }}" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-500 text-white font-medium px-5 py-2.5 rounded-lg transition duration-300 shadow-md">
                    Login untuk Mendaftar
                </a>
            @endauth
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            @forelse($events as $event)
                <div class="bg-slate-800 border border-slate-700 rounded-xl overflow-hidden shadow-lg transition-all duration-300 hover:shadow-blue-500/20 hover:-translate-y-1 flex flex-col">
                    
                    <div class="relative h-52 bg-slate-700 w-full">
                        @if($event->image)
                            <img src="{{ \Illuminate\Support\Str::startsWith($event->image, 'events/') ? asset('storage/' . $event->image) : asset($event->image) }}" alt="{{ $event->title }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center text-slate-500">
                                <svg class="w-12 h-12 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span class="text-sm">Gambar Tidak Tersedia</span>
                            </div>
                        @endif
                    </div>

                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="text-xl font-bold text-white mb-2">{{ $event->title }}</h3>
                        
                        <p class="text-sm text-blue-400 mb-4 font-medium flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            {{ $event->event_date ? \Carbon\Carbon::parse($event->event_date)->translatedFormat('d F Y') : 'Tanggal TBA' }}
                        </p>
                        
                        <p class="text-slate-300 text-sm mb-6 flex-grow line-clamp-3">
                            {{ $event->description }}
                        </p>
                        
                        <a href="{{ route('events.show', $event->id) }}" class="mt-auto block w-full text-center bg-blue-600 hover:bg-blue-500 text-white font-semibold py-2.5 rounded-lg transition duration-300">
                            Detail Event
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-16 bg-slate-800 border border-slate-700 rounded-xl">
                    <p class="text-slate-400 text-lg">Belum ada event yang tersedia saat ini.</p>
                </div>
            @endforelse
            
        </div>
    </div>
</section>
</body>
</html>