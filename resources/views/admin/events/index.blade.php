<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Event - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#050B14] text-white p-8">

    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold">Manajemen Event</h1>
                <p class="text-gray-400">Kelola semua daftar acara di sistem.</p>
            </div>
            <a href="{{ route('admin.events.create') }}" class="bg-indigo-600 hover:bg-indigo-500 px-6 py-3 rounded-xl font-semibold transition">
                + Tambah Event
            </a>
        </div>

        <div class="bg-[#0B1120] border border-gray-800 rounded-2xl overflow-hidden shadow-xl">
            <table class="w-full text-left">
                <thead class="bg-[#0f172a] border-b border-gray-800 text-gray-400 text-sm">
                    <tr>
                        <th class="p-4">Poster</th>
                        <th class="p-4">Nama Event</th>
                        <th class="p-4">Tanggal</th>
                        <th class="p-4">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800">
                    @forelse($events as $event)
                    <tr class="hover:bg-[#111827] transition">
                        <td class="p-4">
                            @if($event->image)
                                <img src="{{ asset('storage/' . $event->image) }}" alt="Poster" 
                                     class="w-16 h-16 object-cover rounded-lg border border-gray-700 shadow-lg">
                            @else
                                <div class="w-16 h-16 bg-gray-800 rounded-lg flex items-center justify-center text-[10px] text-gray-500">
                                    No Img
                                </div>
                            @endif
                        </td>
                        
                        <td class="p-4 font-medium">{{ $event->title }}</td>
                        <td class="p-4 text-gray-400">{{ \Carbon\Carbon::parse($event->event_date)->format('d F Y') }}</td>
                        
                        <td class="p-4 flex gap-4 items-center">
                            <a href="{{ route('admin.events.edit', $event->id) }}" class="text-indigo-400 hover:text-indigo-300 font-medium">Edit</a>
                            
                            <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus event ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-300 font-medium">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="p-8 text-center text-gray-500">Belum ada event yang dibuat.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>