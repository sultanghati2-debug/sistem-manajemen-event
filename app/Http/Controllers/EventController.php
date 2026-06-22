<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    // Menampilkan detail event untuk User
    public function show($id)
{
    // Gunakan 'with' agar data users diambil dalam 1 query saja
    $event = Event::with('users')->findOrFail($id); 
    return view('events.show', compact('event'));
}
public function registerForm($id)
    {
        $event = Event::findOrFail($id);
        return view('events.register', compact('event'));
    }

    // Menampilkan form pendaftaran
public function processRegister(Request $request, $id)
{
    $event = \App\Models\Event::findOrFail($id);
    $event->users()->syncWithoutDetaching([auth()->id()]);

    // PASTIKAN MEMANGGIL ROUTE INI:
    return redirect()->route('user.dashboard')->with('success', 'Berhasil mendaftar!');
}
}