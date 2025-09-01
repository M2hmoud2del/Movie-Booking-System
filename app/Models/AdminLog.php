<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'log_id', 'admin_id', 'action', 'module',
        'action_datetime', 'ip_address', 'user_agent', 'description'
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
