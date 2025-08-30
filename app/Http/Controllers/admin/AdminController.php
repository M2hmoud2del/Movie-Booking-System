<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    
    public function movies()
    {
        return view('admin.movies');
    }
    
    public function bookings()
    {
        return view('admin.bookings');
    }
    
    public function screenings()
    {
        return view('admin.screenings');
    }
    
    public function customers()
    {
        return view('admin.customers');
    }
    
    public function reports()
    {
        return view('admin.reports');
    }
    public function payments()
    {
        return view('admin.payments');
    }
    
    public function settings()
    {
        return view('admin.settings');
    }
}