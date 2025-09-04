<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    

    public function movies()
    {
        return view('user.movies.movies');
    }

    public function showtimes()
    {
        return view('user.Showtimes.Showtimes');
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
