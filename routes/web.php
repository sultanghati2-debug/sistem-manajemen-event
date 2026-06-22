<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use Illuminate\Support\Facades\Route;

// 1. JALUR UTAMA (Publik)
Route::get('/', [LandingPageController::class, 'index'])->name('home');
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');

// 2. LOGIKA REDIRECT DASHBOARD (Pintu Gerbang Utama)
// Kita arahkan ke satu method untuk menentukan arah user
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// 3. AREA TERPROTEKSI
Route::middleware('auth')->group(function () {

    // --- RUTE PENDAFTARAN ---
    Route::get('/events/{id}/register', [EventController::class, 'registerForm'])->name('events.register.form');
    Route::post('/events/{id}/register', [EventController::class, 'processRegister'])->name('events.register.process');

    // --- AREA ADMIN ---
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', function () { return view('admin.dashboard'); })->name('dashboard');
        Route::resource('events', AdminEventController::class);
    });

    // --- AREA USER ---
   // Area User
Route::middleware(['role:user', 'auth'])->prefix('user')->name('user.')->group(function () {
    // Nama rute ini akan menjadi 'user.dashboard' secara otomatis
    Route::get('/dashboard', [DashboardController::class, 'userDashboard'])->name('dashboard');
});

    // --- PROFIL ---
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';