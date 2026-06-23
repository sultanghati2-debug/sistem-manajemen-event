<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Cek apakah user sudah login dan role-nya sesuai dengan parameter di route
        if (!Auth::check() || $request->user()->role !== $role) {
            // Jika tidak sesuai, lempar pesan error 403 (Terlarang)
            abort(403, 'Akses ditolak! Anda tidak memiliki izin untuk melihat halaman ini.');
        }

        return $next($request);
    }
}