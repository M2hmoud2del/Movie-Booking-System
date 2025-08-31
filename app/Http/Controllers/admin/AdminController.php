<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admins.index', ['admins' => User::all()]);
    }

    public function create()
    {
        return view('admin.admins.create');
    }

    public function store(Request $request)
    {
        // Logic to store new admin
    }

    public function edit($id)
    {
        return view('admin.admins.edit',['id' => $id]);
    }

        public function show($id)
    {
        return view('admin.admins.show');
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
