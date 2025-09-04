<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;

class DashboardController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('admin.dashboard', compact('movies'));
    }
}
