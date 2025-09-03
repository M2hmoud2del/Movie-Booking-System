<?php

namespace App\Http\Controllers\User;



use App\Http\Controllers\Controller;   // لازم عشان middleware يشتغل
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function __construct()
    {
        // لازم المستخدم يكون عامل تسجيل دخول
        $this->middleware('auth');
    }

    public function payments()
    {
        // كل الحجوزات الخاصة بالمستخدم مع الفيلم والشو تايم
$bookings = Booking::with(['showtime.movie'])->get();

        // الأفلام الفريدة من الحجوزات
        $movies = $bookings->map(function ($b) {
            return $b->showtime->movie;
        })->filter()->unique('id');

        return view('user.payments', compact('bookings', 'movies'));
    }
}
