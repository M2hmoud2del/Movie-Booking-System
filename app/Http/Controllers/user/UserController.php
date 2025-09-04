<?php

namespace App\Http\Controllers\user;
use App\Models\Movie;
use App\Models\Showtime;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    
    public function dashboard()
    {
        return view('user.dashboard.dashboard');
    }

    public function movies()
    {
        return view('user.movies.movies');
    }

public function showtimes()
    {
        $showtimes = Showtime::with('movie', 'screen')->get();
        return view('user.Showtimes.Showtimes', compact('showtimes'));
    }

    public function payments()
    {
        return view('user.payments.payments');
    }

    
    public function history()
    {
        return view('user.history.history');
    }


}
