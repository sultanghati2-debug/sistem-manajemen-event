<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// 1. Route Publik (Landing Page)
Route::get('/', [EventController::class, 'index'])->name('landing');

// 2. Route yang butuh Login (Area Terkunci)
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Titik kumpul setelah login (Breeze akan melempar ke sini secara default)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // -- AREA KHUSUS ADMIN --
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard'); // Mengarah ke resources/views/admin/dashboard.blade.php
        })->name('dashboard');
    });

    // -- AREA KHUSUS USER/PESERTA --
    Route::middleware(['role:user'])->prefix('user')->name('user.')->group(function () {
        Route::get('/dashboard', function () {
            return view('user.dashboard'); // Mengarah ke resources/views/user/dashboard.blade.php
        })->name('dashboard');
    });

    // Profil bawaan Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';