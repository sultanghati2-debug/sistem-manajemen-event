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
    $user = auth()->user();
    
    // Mengambil event yang diikuti
    $registeredEvents = $user->events;
    
    // Menghitung berapa banyak sertifikat yang sudah tersedia (tidak NULL)
    $certificateCount = $user->events()->wherePivotNotNull('certificate_path')->count();

    return view('user_dashboard', compact('registeredEvents', 'certificateCount'));
}
}