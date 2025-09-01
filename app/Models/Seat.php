<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    protected $fillable = ['screen_id', 'seat_row', 'seat_number'];

    public function screen()
    {
        return $this->belongsTo(Screen::class);
    }

    public function bookedSeats()
    {
        return $this->hasMany(BookedSeat::class);
    }
}
