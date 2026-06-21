<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        // Mengambil 1 data event paling baru yang akan datang
        $heroEvent = Event::where('event_date', '>=', now())
                          ->orderBy('event_date', 'asc')
                          ->first();

        return view('welcome', compact('heroEvent'));
    }
}