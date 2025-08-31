<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class BookingController extends Controller
{
    public function index()
    {
        return view('admin.bookings.index', ['admins' => User::all()]);
    }

    public function create()
    {
        return view('admin.bookings.create');
    }

    public function store(Request $request)
    {
        // Logic to store new admin
    }

    public function edit($id)
    {
        return view('admin.bookings.edit',['id' => $id]);
    }

        public function show($id)
    {
        return view('admin.bookings.show',['id' => $id]);
    }

    public function update(Request $request, $id)
    {
        // Logic to update admin
    }

    public function destroy($id)
    {
        // Logic to delete admin
    }
}
