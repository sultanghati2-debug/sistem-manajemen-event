<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        // Mengambil semua data event dari database
        $events = Event::all();
        
        // Mengirim ke file welcome.blade.php
        return view('welcome', compact('events'));
    }
}