<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#050B14] text-white p-8">

    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold">Edit Event</h1>
            <a href="{{ route('admin.events.index') }}" class="text-gray-400 hover:text-white transition">← Kembali</a>
        </div>

        <form action="{{ route('admin.events.update', $event->id) }}" method="POST" enctype="multipart/form-data" 
              class="bg-[#0B1120] border border-gray-800 rounded-3xl p-8 shadow-2xl space-y-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-400 text-sm font-bold mb-2">Nama Event</label>
                    <input type="text" name="title" value="{{ $event->title }}" required 
                           class="w-full bg-[#0f172a] border border-gray-800 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-indigo-600 outline-none transition">
                </div>
                    <div>
                        <label class="block text-gray-400 text-sm font-bold mb-2">Tanggal & Waktu Event</label>
                        <input type="datetime-local" name="event_date" 
                            value="{{ \Carbon\Carbon::parse($event->event_date)->format('Y-m-d\TH:i') }}" required 
                            class="w-full bg-[#0f172a] border border-gray-800 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-indigo-600 outline-none transition">
                    </div>  
                </div>

            <div>
                <label class="block text-gray-400 text-sm font-bold mb-2">Lokasi</label>
                <input type="text" name="location" value="{{ $event->location }}" required 
                       class="w-full bg-[#0f172a] border border-gray-800 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-indigo-600 outline-none transition">
            </div>

            <div>
                <label class="block text-gray-400 text-sm font-bold mb-2">Poster / Gambar Event</label>
                @if($event->image)
                    <div class="mb-4">
                        <p class="text-xs text-gray-500 mb-2">Poster saat ini:</p>
                        <img src="{{ asset('storage/' . $event->image) }}" alt="Poster Event" class="w-48 h-auto rounded-xl shadow-lg border border-gray-700">
                    </div>
                @endif
                <input type="file" name="image" accept="image/*" 
                       class="w-full bg-[#0f172a] border border-gray-800 rounded-xl px-4 py-3 text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-600 file:text-white hover:file:bg-indigo-500">
                <p class="text-xs text-gray-500 mt-2">Kosongkan jika tidak ingin mengubah gambar.</p>
            </div>

            <div>
                <label class="block text-gray-400 text-sm font-bold mb-2">Deskripsi</label>
                <textarea name="description" rows="4" required 
                          class="w-full bg-[#0f172a] border border-gray-800 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-indigo-600 outline-none transition">{{ $event->description }}</textarea>
            </div>

            <div class="flex justify-end gap-4 pt-4 border-t border-gray-800">
                <a href="{{ route('admin.events.index') }}" class="px-6 py-3 text-gray-400 hover:text-white transition">Batal</a>
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 text-white px-8 py-3 rounded-xl font-bold transition shadow-lg shadow-indigo-600/20">
                    Update Event
                </button>
            </div>
        </form>

        @if ($errors->any())
    <div class="bg-red-600 text-white p-4 rounded-xl mb-6">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    </div>

</body>
</html>