<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
 public function index()
{
    // Jika admin, arahkan ke dashboard admin
    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    
    // Jika user, arahkan ke rute user.dashboard
    return redirect()->route('user.dashboard');
}

public function userDashboard()
{
    $registeredEvents = auth()->user()->events()->latest()->get();
    return view('user_dashboard', compact('registeredEvents'));
}
}