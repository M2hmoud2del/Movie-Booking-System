<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'genre',
        'duration',
        'release_date',
        'rating',
        'status',
        'poster',
        'director',
        'cast',
        'description'
    ];
    protected $casts = [
        'release_date' => 'datetime',
    ];

    public function showtimes()
    {
        return $this->hasMany(Showtime::class);
    }
    
}
