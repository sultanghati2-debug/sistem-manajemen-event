<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <div class="mb-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Selamat datang, {{ Auth::user()->name }}</h3>
                        <p class="text-gray-600">
                            Ini adalah halaman khusus admin. Hanya pengguna dengan role <strong>admin</strong> yang bisa mengakses halaman ini.
                        </p>
                    </div>

                    <hr class="border-gray-200 my-6">

                    <div>
                        <h4 class="text-lg font-semibold text-gray-800 mb-4">Menu Admin</h4>
                        <ul class="list-disc list-inside space-y-3 text-blue-600">
                            <li>
                                <a href="{{ route('admin.events.index') }}" class="hover:text-blue-800 hover:underline transition duration-150">
                                    Kelola Event
                                </a>
                            </li>
                            <li>
                                <span class="text-gray-500">Kelola Pengguna (Coming Soon)</span>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>