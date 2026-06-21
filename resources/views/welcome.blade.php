<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page Event</title>
    
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-900 font-sans antialiased">

    <section class="relative min-h-screen flex items-center overflow-hidden">
        
        @if($heroEvent && $heroEvent->image_path)
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('storage/' . $heroEvent->image_path) }}" alt="{{ $heroEvent->title }}" class="w-full h-full object-cover object-center opacity-40">
                <div class="absolute inset-0 bg-gradient-to-r from-gray-950 via-gray-900/80 to-transparent"></div>
            </div>
        @else
            <div class="absolute inset-0 z-0 bg-gradient-to-br from-indigo-950 via-purple-950 to-slate-950 opacity-60"></div>
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

</body>
</html>