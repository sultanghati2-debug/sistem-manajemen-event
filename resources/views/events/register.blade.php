<x-app-layout>
    <div class="py-12 bg-slate-900 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-800 border border-slate-700 overflow-hidden shadow-lg sm:rounded-xl p-8">
                
                <h2 class="text-2xl font-bold text-white mb-6">Formulir Pendaftaran Event</h2>
                
                <div class="mb-6 p-4 bg-slate-700 rounded-lg border border-slate-600">
                    <h3 class="text-lg font-semibold text-blue-400">{{ $event->title }}</h3>
                    <p class="text-slate-300 text-sm mt-1">
                        🗓 {{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('d F Y') }} | 📍 {{ $event->location }}
                    </p>
                </div>

                <form action="{{ route('events.register.process', $event->id) }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-slate-300 mb-2">Nama Lengkap</label>
                        <input type="text" value="{{ Auth::user()->name }}" disabled class="w-full bg-slate-900 border border-slate-600 text-slate-400 rounded-md shadow-sm py-2 px-3 cursor-not-allowed">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-slate-300 mb-2">Email</label>
                        <input type="email" value="{{ Auth::user()->email }}" disabled class="w-full bg-slate-900 border border-slate-600 text-slate-400 rounded-md shadow-sm py-2 px-3 cursor-not-allowed">
                    </div>

                    <div class="mb-8 flex items-start">
                        <div class="flex items-center h-5">
                            <input id="terms" type="checkbox" required class="w-4 h-4 bg-slate-900 border-slate-600 rounded text-blue-600 focus:ring-blue-500">
                        </div>
                        <label for="terms" class="ml-2 text-sm text-slate-300">
                            Saya mengonfirmasi bahwa data di atas benar dan bersedia mengikuti event ini sesuai jadwal yang ditentukan.
                        </label>
                    </div>

                    <div class="flex items-center justify-end space-x-4">
                        <a href="{{ route('events.show', $event->id) }}" class="text-slate-400 hover:text-white transition">Batal</a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-300">
                            Konfirmasi Pendaftaran
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>