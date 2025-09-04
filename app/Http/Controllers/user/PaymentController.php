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
        // كل الحجوزات الخاصة بالمستخدم مع الفيلم والشو تايم
$bookings = Booking::with(['showtime.movie'])->where('user_id', Auth::id())->get();

        // الأفلام الفريدة من الحجوزات
        $movies = $bookings->map(function ($b) {
            return $b->showtime->movie;
        })->filter()->unique('id');

        return view('user.payments.payments', compact('bookings', 'movies'));
    }
}