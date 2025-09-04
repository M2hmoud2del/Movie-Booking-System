<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {
        $numbookings = Booking::where('user_id', Auth::id())
            ->distinct('showtime_id')
            ->count('showtime_id');
        $totalSpent = Booking::where('user_id', Auth::id())->sum('amount');
        return view('user.dashboard.dashboard',compact('numbookings', 'totalSpent'));
    }
}
