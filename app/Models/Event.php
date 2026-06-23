<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany; // Import yang benar

class Event extends Model
{
    protected $fillable = [
    'title',
    'event_date',
    'location',
    'description',
    'image', // Tambahkan baris ini
];

    protected $casts = [
    'event_date' => 'datetime',
];
    /**
     * Definisi relasi Many-to-Many ke User melalui tabel pivot 'registrations'
     */
public function users()
{
    return $this->belongsToMany(\App\Models\User::class, 'event_user', 'event_id', 'user_id')
                ->withPivot('certificate_path') // Pastikan ini ada!
                ->withTimestamps();
}
}