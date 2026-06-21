@extends('layouts.user')

@yield('title', 'Dashboard Utama')

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-white tracking-tight">Halo, {{ Auth::user()->name ?? 'Peserta' }}! 👋</h1>
        <p class="text-gray-450 mt-1">Selamat datang di portal akun kamu. Cek status agenda dan kegiatanmu di sini.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="bg-gray-900 p-6 rounded-2xl border border-gray-800 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-gray-500 mb-1">Event Diikuti</p>
                <h3 class="text-3xl font-extrabold text-white">0</h3>
            </div>
            <div class="p-3 bg-indigo-650/10 text-indigo-400 rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                </svg>
            </div>
        </div>

        <div class="bg-gray-900 p-6 rounded-2xl border border-gray-800 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-gray-500 mb-1">Sertifikat Tersedia</p>
                <h3 class="text-3xl font-extrabold text-white">0</h3>
            </div>
            <div class="p-3 bg-emerald-650/10 text-emerald-400 rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8 text-center">
        <div class="w-12 h-12 bg-gray-800 rounded-xl flex items-center justify-center mx-auto mb-4 text-gray-450">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <h3 class="text-lg font-bold text-white mb-1">Kamu belum mendaftar di event manapun</h3>
        <p class="text-sm text-gray-400 max-w-md mx-auto mb-6">Jelajahi berbagai agenda seru di halaman utama dan lakukan pendaftaran untuk mulai berpartisipasi.</p>
        <a href="/" class="inline-flex bg-indigo-600 hover:bg-indigo-500 text-white text-sm font-semibold px-5 py-2.5 rounded-xl transition duration-350">
            Cari Event Menarik
        </a>
    </div>
@endsection