@extends('layouts.admin')

@yield('title', 'Dashboard Overview')

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-white tracking-tight">Selamat Datang Kembali, Admin!</h1>
        <p class="text-slate-400 mt-1">Berikut adalah ringkasan performa data portal sistem saat ini.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-slate-955 p-6 rounded-2xl border border-slate-800 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-500 mb-1">Total Event</p>
                <h3 class="text-3xl font-extrabold text-white">3</h3>
            </div>
            <div class="p-3 bg-indigo-600/10 text-indigo-400 rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
        </div>

        <div class="bg-slate-950 p-6 rounded-2xl border border-slate-800 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-500 mb-1">Pendaftar Baru</p>
                <h3 class="text-3xl font-extrabold text-white">48</h3>
            </div>
            <div class="p-3 bg-emerald-600/10 text-emerald-400 rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </div>
        </div>

        <div class="bg-slate-950 p-6 rounded-2xl border border-slate-800 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-500 mb-1">Lokasi Aktif</p>
                <h3 class="text-3xl font-extrabold text-white">2</h3>
            </div>
            <div class="p-3 bg-rose-600/10 text-rose-400 rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-slate-950 border border-slate-800 rounded-2xl p-6">
        <h3 class="text-lg font-bold text-white mb-2">Petunjuk Navigasi Admin</h3>
        <p class="text-sm text-slate-400 leading-relaxed">
            Gunakan sidebar menu di sebelah kiri untuk berpindah modul halaman. Modul **Manajemen Event** digunakan untuk menambah, mengubah, atau menghapus data event yang tayang di landing page depan.
        </p>
    </div>
@endsection