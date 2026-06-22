<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Event;
use Carbon\Carbon;

class GenerateAutomationCertificates extends Command
{
    // Ini adalah perintah yang akan dijalankan di terminal nanti
    protected $signature = 'app:generate-certificates';

    // Deskripsi tugas robot ini
    protected $description = 'Otomatis membuat sertifikat untuk event yang sudah selesai minimal 1 minggu yang lalu';

    public function handle()
    {
        // 1. Ambil batas waktu (Hari ini dikurangi 7 hari)
        $batasWaktu = Carbon::now()->subWeek();

        // 2. Cari event yang tanggalnya <= batas waktu
        // Contoh: Jika hari ini tanggal 23 Juni, maka mencari event tanggal 16 Juni ke bawah
        $events = Event::where('event_date', '<=', $batasWaktu)->get();

        if ($events->isEmpty()) {
            $this->info('Tidak ada event yang memenuhi syarat (minimal 1 minggu setelah acara).');
            return;
        }

        foreach ($events as $event) {
            $this->info("Memproses sertifikat untuk event: {$event->title}");

            // 3. Ambil semua user yang ikut event ini
            foreach ($event->users as $user) {
                
                // Cek apakah user ini sudah punya sertifikat atau belum
                if (is_null($user->pivot->certificate_path)) {
                    
                    // Nanti di sini ditaruh kode PDF Generator (seperti Barryvdh/Laravel-DomPDF)
                    // Sementara kita simpan nama file dummy dulu untuk pembuktian logika
                    $namaFileSertifikat = "certificates/cert_{$event->id}_{$user->id}.pdf";

                    // Update tabel pivot event_user
                    $event->users()->updateExistingPivot($user->id, [
                        'certificate_path' => $namaFileSertifikat,
                        'updated_at' => Carbon::now()
                    ]);
                }
            }
        }

        $this->info('Proses otomatisasi pembuatan sertifikat selesai dilakukan!');
    }
}