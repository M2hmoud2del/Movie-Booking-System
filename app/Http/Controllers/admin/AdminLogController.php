<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AdminLog;
use App\Models\User;

class AdminLogController extends Controller
{
    public function index()
    {
        $logs = AdminLog::with('admin')->latest()->paginate(10);
        $admins = User::where('role', 'admin')->get();
        return view('admin.admins.logs', compact('logs', 'admins'));
    }

    public function show($id)
    {
        $log = AdminLog::with('admin')->findOrFail($id);
        return view('admin.admins.logs-show', compact('log'));
    }
}
