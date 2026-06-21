<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-2">
                    Selamat datang, {{ Auth::user()->name }}
                </h3>
                <p class="text-gray-600">
                    Ini adalah halaman khusus admin. Hanya pengguna dengan role
                    <span class="font-semibold">admin</span> yang bisa mengakses halaman ini.
                </p>

                <div class="mt-6 border-t border-gray-200 pt-6">
                    <h4 class="text-md font-medium text-gray-800 mb-3">Menu Admin</h4>
                    <ul class="list-disc list-inside text-gray-600 space-y-1">
                        <li>Kelola Event</li>
                        <li>Kelola Pengguna</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>