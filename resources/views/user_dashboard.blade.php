<x-app-layout>
    <div class="py-12 bg-slate-900 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            
            <h2 class="text-2xl font-bold text-white mb-6">Halo, Peserta Aktif! 👋</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                <div class="bg-slate-800 p-6 rounded-xl border border-slate-700">
                    <p class="text-slate-400">EVENT DIIKUTI</p>
                    <h3 class="text-3xl font-bold text-white">{{ $registeredEvents->count() }}</h3>
                </div>
                <div class="bg-slate-800 p-6 rounded-xl border border-slate-700">
                    <p class="text-slate-400">SERTIFIKAT TERSEDIA</p>
                    <h3 class="text-3xl font-bold text-white">0</h3>
                </div>
            </div>

            <h3 class="text-xl font-bold text-white mb-4">Tiket Saya</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($registeredEvents as $event)
                    <div class="bg-slate-800 border border-slate-700 rounded-xl overflow-hidden hover:border-blue-500 transition">
                        @if($event->image_path)
                            <img src="{{ asset('storage/' . $event->image_path) }}" class="w-full h-40 object-cover">
                        @endif
                        <div class="p-5">
                            <h3 class="text-white font-bold text-lg">{{ $event->title }}</h3>
                            <p class="text-slate-400 text-sm mt-1">📅 {{ \Carbon\Carbon::parse($event->event_date)->format('d F Y') }}</p>
                            <div class="mt-4">
                                <a href="{{ route('events.show', $event->id) }}" class="text-blue-400 hover:text-blue-300 font-semibold text-sm">
                                    Lihat Detail &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full p-8 bg-slate-800 rounded-xl border border-slate-700 text-center">
                        <p class="text-slate-400">Kamu belum mendaftar di event manapun.</p>
                        <a href="{{ route('home') }}" class="text-blue-500 hover:underline mt-2 inline-block">Cari Event Menarik</a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>