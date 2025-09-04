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

    
            return view('user.history.history',);
}
}