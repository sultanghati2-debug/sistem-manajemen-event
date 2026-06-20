<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image_path',
        'event_date',
        'location',
    ];

    // Konversi kolom event_date menjadi objek Carbon otomatis
    protected function casts(): array
    {
        return [
            'event_date' => 'datetime',
        ];
    }
}