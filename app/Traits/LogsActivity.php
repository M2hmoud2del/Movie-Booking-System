<?php

namespace App\Traits;

use App\Models\AdminLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

trait LogsActivity
{
    public function logActivity($action, $module, $description = null)
    {
        AdminLog::create([
            'log_id' => strtoupper(Str::random(10)),
            'admin_id' => Auth::id(),
            'action' => $action,
            'module' => $module,
            'description' => $description,
            'action_datetime' => now(),
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }
}
