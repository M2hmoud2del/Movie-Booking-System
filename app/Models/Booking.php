<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'showtime_id', 'amount', 'status', 'payment_method'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function showtime()
    {
        return $this->belongsTo(Showtime::class);
    }

    public function bookedSeats()
    {
        return $this->hasMany(BookedSeat::class);
    }
    public function seats()
    {
        return $this->hasManyThrough(Seat::class, BookedSeat::class, 'booking_id', 'id', 'id', 'seat_id');
    }
}