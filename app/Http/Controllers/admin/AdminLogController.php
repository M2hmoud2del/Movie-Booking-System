<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AdminLog;
use App\Models\User;
use Illuminate\Http\Request;

class AdminLogController extends Controller
{
    public function index(Request $request)
    {
        $admins = User::where('role', 'admin')->get();

        $logsQuery = AdminLog::with('admin')->latest();

        if ($request->filled('action')) {
            $logsQuery->where('action', $request->action);
        }

        if ($request->filled('admin_id')) {
            $logsQuery->where('admin_id', $request->admin_id);
        }

        if ($request->filled('module')) {
            $logsQuery->where('module', $request->module);
        }

        $logs = $logsQuery->paginate(10)->withQueryString();

        return view('admin.admins.logs', compact('logs', 'admins'));
    }

    public function show($id)
    {
        $log = AdminLog::with('admin')->findOrFail($id);
        return view('admin.admins.logs-show', compact('log'));
    }
}
