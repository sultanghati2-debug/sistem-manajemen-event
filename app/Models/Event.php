<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // Menentukan kolom mana saja yang boleh diisi (mass assignable)
    protected $fillable = [
        'title',
        'description',
        'image_path',
        'event_date',
        'location',
    ];

    // Otomatis mengonversi field tanggal menjadi objek Carbon
    protected function casts(): array
    {
        return [
            'event_date' => 'datetime',
        ];
    }
}