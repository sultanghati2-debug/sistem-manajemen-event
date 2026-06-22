<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
    // Ambil semua event
    $events = \App\Models\Event::all();
    
    // Ambil 1 event pertama untuk Hero Section (atau bisa pakai logika lain)
    $heroEvent = \App\Models\Event::latest()->first();
    
    // Kirim keduanya ke view
    return view('welcome', compact('events', 'heroEvent'));
    }
}