<x-app-layout>
    <div class="py-12 bg-slate-900 min-h-screen text-slate-100">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-slate-800 border border-slate-700 shadow-2xl rounded-2xl overflow-hidden">
                
                @if($event->image_path)
                    <div class="h-80 w-full overflow-hidden">
                        <img src="{{ asset('storage/' . $event->image_path) }}" alt="{{ $event->title }}" class="w-full h-full object-cover">
                    </div>
                @endif

                <div class="p-8">
                    <h1 class="text-4xl font-extrabold text-white mb-4">{{ $event->title }}</h1>
                    
                    <div class="flex items-center space-x-6 text-slate-400 mb-8 pb-8 border-b border-slate-700">
                        <div class="flex items-center">
                            <span class="mr-2">📅</span>
                            {{ $event->event_date ? \Carbon\Carbon::parse($event->event_date)->translatedFormat('d F Y') : 'TBA' }}
                        </div>
                        <div class="flex items-center">
                            <span class="mr-2">📍</span>
                            {{ $event->location }}
                        </div>
                    </div>

                    <div class="prose prose-invert max-w-none text-slate-300 leading-relaxed mb-10">
                        <h3 class="text-white font-bold text-xl mb-3">Tentang Event</h3>
                        <p>{{ $event->description }}</p>
                    </div>

                    <div class="pt-6 border-t border-slate-700">
                        @auth
                            @if(Auth::user()->role === 'admin')
                                <a href="{{ route('admin.events.index') }}" class="inline-block bg-slate-700 hover:bg-slate-600 text-white font-semibold px-6 py-3 rounded-xl transition">
                                    &larr; Kembali ke Kelola Event
                                </a>
                            @else
                                {{-- Optimasi: Menggunakan exists() agar query database tidak lambat --}}
                                @if($event->users()->where('user_id', Auth::id())->exists())
                                    <button disabled class="bg-green-600 text-white font-semibold px-8 py-3 rounded-xl opacity-70 cursor-not-allowed">
                                        ✓ Anda Sudah Terdaftar
                                    </button>
                                @else
                                    <a href="{{ route('events.register.form', $event->id) }}" class="inline-block bg-blue-600 hover:bg-blue-500 text-white font-semibold px-8 py-3 rounded-xl transition transform hover:scale-105">
                                        Daftar Event Ini
                                    </a>
                                @endif
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="inline-block bg-blue-600 hover:bg-blue-500 text-white font-semibold px-8 py-3 rounded-xl transition">
                                Login untuk Mendaftar
                            </a>
                        @endauth
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>