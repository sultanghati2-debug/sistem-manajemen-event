<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    // Menampilkan daftar semua event untuk Admin
    public function index()
    {
        $events = Event::withCount('users')->latest()->get();
        return view('admin.events.index', compact('events'));
    }

    // Menampilkan detail event & daftar pendaftar
    public function show(Event $event)
    {
        $event->load('users');
        return view('admin.events.show', compact('event'));
    }

    // Menghapus event
    public function destroy(Event $event)
    {
        if ($event->image_path) {
            Storage::disk('public')->delete($event->image_path);
        }
        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil dihapus');
    }
    
    // Tambahkan method store, edit, update sesuai kebutuhan CRUD kamu di sini
}