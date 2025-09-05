<?php

namespace App\Http\Controllers\User;



use App\Http\Controllers\Controller;   // Required so that middleware works
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function __construct()
    {
        // The user must be logged in
        $this->middleware('auth');
    }

    public function payments()
    {
        // All bookings for the user with related movie and showtime
$bookings = Booking::with(['showtime.movie'])->where('user_id', Auth::user()->id)->get();

        // Unique movies from the bookings
        $movies = $bookings->map(function ($b) {
            return $b->showtime->movie;
        })->filter()->unique('id');

        return view('user.payments.payments', compact('bookings', 'movies'));
    }
}