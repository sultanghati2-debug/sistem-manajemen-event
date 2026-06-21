<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        // 1. Ambil 1 event terdekat untuk Hero Section
        $heroEvent = Event::where('event_date', '>=', now())
                          ->orderBy('event_date', 'asc')
                          ->first();

        // 2. Ambil semua event yang akan datang (kecuali yang sudah masuk Hero) untuk Grid Cards
        // Kita batasi misalnya maksimal 6 data
        $events = Event::where('event_date', '>=', now())
                       ->when($heroEvent, function ($query, $heroEvent) {
                           return $query->where('id', '!=', $heroEvent->id);
                       })
                       ->orderBy('event_date', 'asc')
                       ->take(6)
                       ->get();

        return view('welcome', compact('heroEvent', 'events'));
    }
}