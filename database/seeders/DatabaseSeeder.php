<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        // Data 1 (Untuk Hero Section)
        Event::create([
            'title' => 'Reuni Akbar Alumni MQ Al-Mu\'min Vol 3',
            'description' => 'Menjalin kembali tali silaturahmi antar alumni dengan tema Satu Nadi Satu Sanad. Jangan lewatkan momen penuh berkah ini.',
            'event_date' => '2026-08-15 08:00:00',
            'location' => 'Auditorium Utama Al-Mu\'min',
            'image_path' => null
        ]);

        // Data 2 (Untuk Grid Cards)
        Event::create([
            'title' => 'Workshop UI/UX Design untuk Pemula',
            'description' => 'Pelajari fondasi utama pembuatan produk digital yang estetik dan ramah pengguna bersama praktisi berpengalaman.',
            'event_date' => '2026-09-01 10:00:00',
            'location' => 'Live Via Zoom Meeting',
            'image_path' => null
        ]);

        // Data 3 (Untuk Grid Cards)
        Event::create([
            'title' => 'Nobar Akbar Pertandingan BRI Liga 1',
            'description' => 'Mari merapatkan barisan mendukung tim kebanggaan dalam laga penentu pekan ini. Disediakan doorprize menarik.',
            'event_date' => '2026-09-10 19:30:00',
            'location' => 'Halaman Kantor Desa Sirnagalih',
            'image_path' => null
        ]);
    }
}