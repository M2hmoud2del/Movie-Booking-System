<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
     public function movies()
    {
        $movies = Movie:: select('id', 'name', 'poster', 'genre', 'duration', 'status','rating' )->get();
          
        return view('user.movies.movies', compact('movies'));
    }
}
