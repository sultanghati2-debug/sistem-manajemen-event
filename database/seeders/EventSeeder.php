<?php

namespace Database\Seeders;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        Event::create([
            'title' => 'Festival Teknologi 2026',
            'description' => 'Ajang kumpul developer tahunan dengan pembicara ahli di bidang web modern.',
            'image_path' => 'events/teknologi.png', // File placeholder
            'event_date' => Carbon::now()->addDays(10),
            'location' => 'Gedung Sate, Bandung',
        ]);

        Event::create([
            'title' => 'Konser Musik Indie',
            'description' => 'Malam panggung musik indie dengan band-band lokal terbaik.',
            'image_path' => 'events/konser.png',
            'event_date' => Carbon::now()->addDays(20),
            'location' => 'Stadion Pakansari, Bogor',
        ]);
    }
}