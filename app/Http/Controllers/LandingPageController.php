<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
        public function index(Request $request)
    {
        // 1. Tangkap request pencarian
        $search = $request->input('search');

        // Ambil semua event
        $events = \App\Models\Event::all();
        
        // Ambil 1 event pertama untuk Hero Section (atau bisa pakai logika lain)
        $heroEvent = \App\Models\Event::latest()->first();
        
        // 2. Kirim $events, $heroEvent, DAN $search ke view
        return view('welcome', compact('events', 'heroEvent', 'search'));
    }
}