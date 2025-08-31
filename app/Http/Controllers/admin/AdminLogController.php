<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class AdminLogController extends Controller
{
    public static function index()
    {
        $logs = [
            [
                'id' => 1,
                'timestamp' => '2023-06-16 14:30:25',
                'admin' => 'John Doe',
                'role' => 'Administrator',
                'action' => 'Login',
                'module' => 'Authentication',
                'description' => 'User logged in successfully',
                'ip_address' => '192.168.1.101',
            ],
            [
                'id' => 2,
                'timestamp' => '2023-06-16 13:15:42',
                'admin' => 'Jane Smith',
                'role' => 'Content Manager',
                'action' => 'Create',
                'module' => 'Movies',
                'description' => 'Created new movie "Spider-Man: Across the Spider-Verse"',
                'ip_address' => '192.168.1.102',
            ],
        ];

        return view('admin.admins.logs', ['logs' => $logs]);
    }

    public static function show($id)
    {
        $log = [
            'id' => $id,
            'timestamp' => '2023-06-16 14:30:25',
            'admin' => 'John Doe',
            'role' => 'Administrator',
            'action' => 'Login',
            'module' => 'Authentication',
            'description' => 'User logged in successfully',
            'ip_address' => '192.168.1.101',
        ];

        return view('admin.admins.logs-show', ['log' => $log]);
    }
}
