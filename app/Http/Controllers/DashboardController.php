<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        {
        return view('dashboard');
    }
        // Mengambil data role dari user yang sedang login
        $role = $request->user()->role;

        if ($role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('user.dashboard');
    }
}