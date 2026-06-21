@if($events->count() > 0)
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($events as $event)
            <a href="{{ route('login') }}" class="bg-gray-900 rounded-2xl overflow-hidden shadow-md hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 flex flex-col group border border-gray-800 cursor-pointer block">
                
                <div class="relative h-48 overflow-hidden bg-gray-950">
                    @if($event->image_path && file_exists(storage_path('app/public/' . $event->image_path)))
                        <img src="{{ asset('storage/' . $event->image_path) }}" 
                             alt="{{ $event->title }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                             onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\"w-full h-full bg-gradient-to-br from-indigo-600 to-purple-800 flex items-center justify-center opacity-70\"><svg class=\"h-12 w-12 text-white/30\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"1.5\" d=\"M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z\" /></svg></div>';">
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
                        <div class="inline-flex items-center text-sm font-semibold text-indigo-400 group-hover:text-indigo-300 gap-1">
                            Lihat Detail 
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </div>

            </a>
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