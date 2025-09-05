<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Showtime;

use Illuminate\Support\Facades\Auth;

use function Psy\sh;

class HistoryController extends Controller
{
     public function history(){
        $bookings = Booking::with('showtime.movie' )->where('user_id', Auth::id())->get();
                          
       
            return view('user.history.history',compact('bookings'));
}
}