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
            // Cari dan urutkan dari yang terbaru
            $events = \App\Models\Event::where('title', 'like', '%' . $search . '%')
                        ->orWhere('location', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%')
                        ->latest()
                        ->get();
        } else {
            // Jika tidak ada pencarian, tampilkan semua event dari yang terbaru
            $events = \App\Models\Event::latest()->get();
        }
        
        // Ambil 1 event pertama untuk Hero Section
        $heroEvent = \App\Models\Event::latest()->first();
        
        // Kirim $events, $heroEvent, dan $search ke view
        return view('welcome', compact('events', 'heroEvent', 'search'));
    }
}