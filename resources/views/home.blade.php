<x-guest-layout>
    <div class="max-w-4xl mx-auto py-10 px-4">
        <h1 class="text-2xl font-bold mb-6">Event Mendatang</h1>

        @if ($events->isEmpty())
            <p class="text-gray-500">Belum ada event yang tersedia saat ini.</p>
        @else
            <div class="grid gap-4">
                @foreach ($events as $event)
                    <div class="border rounded-lg p-4 shadow-sm flex gap-4">
                        @if ($event->image_path)
                            <img src="{{ asset('storage/' . $event->image_path) }}"
                                 alt="{{ $event->title }}"
                                 class="w-32 h-32 object-cover rounded">
                        @endif

                        <div>
                            <h2 class="text-lg font-semibold">{{ $event->title }}</h2>
                            <p class="text-sm text-gray-600">
                                {{ $event->event_date->format('d M Y, H:i') }} &middot; {{ $event->location }}
                            </p>
                            <p class="mt-2">{{ $event->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="mt-8">
            @auth
                <a href="{{ route('dashboard') }}" class="underline">Ke Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="underline">Login</a>
                <a href="{{ route('register') }}" class="underline ml-4">Daftar</a>
            @endauth
        </div>
    </div>
</x-guest-layout>