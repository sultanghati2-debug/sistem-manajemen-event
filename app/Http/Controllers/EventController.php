<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::query()
            ->where('event_date', '>=', now())
            ->orderBy('event_date', 'asc')
            ->get();

        return view('home', compact('events'));
    }
}