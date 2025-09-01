@extends('admin.layouts.app')

@section('title', 'Log Details - Movie Booking System')

@section('page-title', 'Log Details')

@section('header-actions')
<a href="{{ route('admin.admins.logs.index') }}" class="btn-secondary">
    <i class="fas fa-arrow-left"></i> Back to Logs
</a>
@endsection

@section('content')
<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">Activity Log Information</h2>
    </div>
    
    <div class="log-details" style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
        <!-- Action Details -->
        <div>
            <div style="margin-bottom: 25px;">
                <h2 style="font-size: 20px; margin-bottom: 15px; color: var(--text);">Action Details</h2>
                
                <div style="display: grid; grid-template-columns: 120px 1fr; gap: 15px; margin-bottom: 15px;">
                    
                    <div style="color: var(--text-secondary);">Log ID:</div>
                    <div style="color: var(--text); font-weight: 500;">#{{ $log->log_id }}</div>
                    
                    <div style="color: var(--text-secondary);">Admin:</div>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        @if($log->admin)
                            <div style="width: 36px; height: 36px; border-radius: 50%; background: rgba(33, 150, 243, 0.2); display: flex; align-items: center; justify-content: center; color: #2196f3;">
                                {{ strtoupper(substr($log->admin->name,0,2)) }}
                            </div>
                            <div>
                                {{ $log->admin->name }}<br>
                                <span style="font-size: 12px; color: var(--text-secondary);">
                                    {{ $log->admin->role }}
                                </span>
                            </div>
                        @else
                            <span style="color: var(--text-secondary);">System</span>
                        @endif
                    </div>
                    
                    <div style="color: var(--text-secondary);">Action:</div>
                    <div>
                        <span class="badge 
                            @if($log->action == 'Login') badge-success
                            @elseif($log->action == 'Create') badge-info
                            @elseif($log->action == 'Update') badge-warning
                            @elseif($log->action == 'Delete') badge-error
                            @else badge @endif">
                            {{ $log->action }}
                        </span>
                    </div>
                    
                    <div style="color: var(--text-secondary);">Module:</div>
                    <div style="color: var(--text); font-weight: 500;">{{ $log->module ?? 'N/A' }}</div>
                    
                    <div style="color: var(--text-secondary);">Date & Time:</div>
                    <div style="color: var(--text); font-weight: 500;">{{ $log->action_datetime }}</div>
                    
                    <div style="color: var(--text-secondary);">IP Address:</div>
                    <div style="color: var(--text); font-weight: 500;">{{ $log->ip_address ?? 'N/A' }}</div>
                    
                    <div style="color: var(--text-secondary);">User Agent:</div>
                    <div style="color: var(--text); font-weight: 500; font-size: 13px;">
                        {{ $log->user_agent ?? 'N/A' }}
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Description -->
        <div>
            <div style="margin-bottom: 25px;">
                <h2 style="font-size: 20px; margin-bottom: 15px; color: var(--text);">Description</h2>
                <div style="background: rgba(255, 255, 255, 0.05); padding: 20px; border-radius: 8px;">
                    <p style="color: var(--text); line-height: 1.6; margin-bottom: 15px;">
                        {{ $log->description ?? 'No description provided.' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .btn-secondary {
        background: rgba(255, 255, 255, 0.1);
        color: var(--text);
        border: 1px solid rgba(255, 255, 255, 0.1);
        padding: 10px 20px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    
    .btn-secondary:hover {
        background: rgba(255, 255, 255, 0.2);
    }
    
    .badge {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
    }
    .badge-success { background: rgba(76, 175, 80, 0.2); color: #4caf50; }
    .badge-warning { background: rgba(255, 193, 7, 0.2); color: #ffc107; }
    .badge-error { background: rgba(244, 67, 54, 0.2); color: #f44336; }
    .badge-info { background: rgba(33, 150, 243, 0.2); color: #2196f3; }
</style>
@endpush
