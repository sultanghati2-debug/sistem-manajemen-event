<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany; // Import yang benar

class Event extends Model
{
    protected $fillable = ['title', 'description', 'event_date', 'location', 'image_path'];

    protected $casts = [
    'event_date' => 'datetime',
];
    /**
     * Definisi relasi Many-to-Many ke User melalui tabel pivot 'registrations'
     */
public function users()
{
    // Pastikan ini adalah satu-satunya relasi yang kamu gunakan
    return $this->belongsToMany(\App\Models\User::class, 'event_user', 'event_id', 'user_id')->withTimestamps();
}
}