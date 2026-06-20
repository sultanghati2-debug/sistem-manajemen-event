<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Akun Admin
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@event.com',
            'password' => Hash::make('password'), // default password
            'role' => 'admin',
        ]);

        // Akun User Biasa
        User::create([
            'name' => 'Peserta Aktif',
            'email' => 'user@event.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
    }
}