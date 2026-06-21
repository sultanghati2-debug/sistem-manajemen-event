<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page Event</title>
    
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-900 font-sans antialiased">

    <section class="relative min-h-screen flex items-center overflow-hidden border-b border-gray-800">
        
        @if($heroEvent && $heroEvent->image_path)
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('storage/' . $heroEvent->image_path) }}" alt="{{ $heroEvent->title }}" class="w-full h-full object-cover object-center opacity-40">
                <div class="absolute inset-0 bg-gradient-to-r from-gray-950 via-gray-900/80 to-transparent"></div>
            </div>
        @else
            <div class="absolute inset-0 z-0 bg-gradient-to-br from-indigo-950 via-purple-955 to-slate-955 opacity-60"></div>
        @endif

        <div class="container mx-auto px-6 md:px-12 relative z-10 py-20">
            <div class="max-w-3xl">
                @if($heroEvent)
                    <div class="inline-flex items-center gap-2 bg-indigo-600/80 backdrop-blur-md text-white text-xs font-semibold px-3 py-1.5 rounded-full mb-6 uppercase tracking-wider">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        {{ $heroEvent->event_date->translatedFormat('d F Y - H:i') }} WIB
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
                            Lihat Event Lainnya
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

    <section id="semua-event" class="py-20 bg-gray-950">
        <div class="container mx-auto px-6 md:px-12">
            
            <div class="mb-12 text-center md:text-left">
                <h2 class="text-3xl font-bold text-white tracking-tight">
                    Jelajahi Event Mendatang
                </h2>
                <p class="mt-2 text-gray-400">
                    Temukan dan ikuti berbagai kegiatan seru yang akan diselenggarakan dalam waktu dekat.
                </p>
            </div>

            @if($events->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($events as $event)
                        <div class="bg-gray-900 rounded-2xl overflow-hidden shadow-md hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 flex flex-col group border border-gray-800">
                            
                            <div class="relative h-48 overflow-hidden bg-gray-950">
                                @if($event->image_path)
                                    <img src="{{ asset('storage/' . $event->image_path) }}" alt="{{ $event->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-indigo-600 to-purple-800 flex items-center justify-center opacity-70">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white/30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif
                                
                                <div class="absolute top-4 left-4 bg-gray-900/90 backdrop-blur-sm text-indigo-400 px-3 py-1 rounded-md text-xs font-bold shadow-sm border border-gray-800">
                                    {{ $event->event_date->translatedFormat('d M Y') }}
                                </div>
                            </div>

                            <div class="p-6 flex flex-col flex-grow">
                                <div class="flex items-center gap-4 text-xs text-gray-400 mb-3">
                                    <span class="flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        {{ $event->event_date->translatedFormat('H:i') }} WIB
                                    </span>
                                    <span class="flex items-center gap-1 truncate max-w-[155px]">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-rose-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        </svg>
                                        {{ $event->location }}
                                    </span>
                                </div>

                                <h3 class="text-xl font-bold text-white mb-2 line-clamp-2 group-hover:text-indigo-400 transition-colors">
                                    {{ $event->title }}
                                </h3>

                                <p class="text-gray-400 text-sm mb-6 line-clamp-3 leading-relaxed">
                                    {{ $event->description }}
                                </p>

                                <div class="mt-auto pt-4 border-t border-gray-800">
                                    <a href="/events/{{ $event->id }}" class="inline-flex items-center text-sm font-semibold text-indigo-400 hover:text-indigo-300 gap-1 group/btn">
                                        Lihat Detail 
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform group-hover/btn:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-16 bg-gray-900 rounded-2xl border border-gray-800 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-white">Belum ada event lain</h3>
                    <p class="mt-1 text-sm text-gray-400">Kembali lagi nanti untuk melihat pembaruan event menarik selanjutnya.</p>
                </div>
            @endif

        </div>
    </section>

</body>
</html>