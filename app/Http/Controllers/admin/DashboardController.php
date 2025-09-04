<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\User;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        $movies = Movie::orderBy('created_at', 'desc')->take(5)->get();

        // Example stats (replace with actual queries as needed)
        $totalMovies = Movie::count();
        $moviesShowing = Movie::where('status', 'now_showing')->count();
        $totalCustomers = User::where('role','user')->count();
        $totalRevenue = Booking::where('status', 'completed')->sum('amount');

        return view('admin.dashboard', compact(
            'movies',
            'totalMovies',
            'moviesShowing',
            'totalCustomers',
            'totalRevenue'
        ));
    }
}
