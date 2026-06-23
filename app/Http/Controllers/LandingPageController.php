<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(Request $request)
    {
        // Tangkap request pencarian
        $search = $request->input('search');

        // Cek apakah ada kata kunci pencarian
        if ($search) {
            // Jika ada, cari event yang judulnya mengandung kata kunci tersebut
            $events = \App\Models\Event::where('title', 'like', '%' . $search . '%')
            ->orWhere('location', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%')
            ->get();
        } else {
            // Jika tidak ada pencarian, tampilkan semua event
            $events = \App\Models\Event::all();
        }
        
        // Ambil 1 event pertama untuk Hero Section
        $heroEvent = \App\Models\Event::latest()->first();
        
        // Kirim $events, $heroEvent, dan $search ke view
        return view('welcome', compact('events', 'heroEvent', 'search'));
    }
}