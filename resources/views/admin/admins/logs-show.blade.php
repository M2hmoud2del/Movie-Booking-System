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
        <div>
            <div style="margin-bottom: 25px;">
                <h2 style="font-size: 20px; margin-bottom: 15px; color: var(--text);">Action Details</h2>
                
                <div style="display: grid; grid-template-columns: 120px 1fr; gap: 15px; margin-bottom: 15px;">
                    <div style="color: var(--text-secondary);">Log ID:</div>
                    <div style="color: var(--text); font-weight: 500;">#LOG002</div>
                    
                    <div style="color: var(--text-secondary);">Admin:</div>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <div style="width: 36px; height: 36px; border-radius: 50%; background: rgba(33, 150, 243, 0.2); display: flex; align-items: center; justify-content: center; color: #2196f3;">JS</div>
                        <div>Jane Smith<br><span style="font-size: 12px; color: var(--text-secondary);">Content Manager</span></div>
                    </div>
                    
                    <div style="color: var(--text-secondary);">Action:</div>
                    <div><span class="badge badge-info">Create</span></div>
                    
                    <div style="color: var(--text-secondary);">Module:</div>
                    <div style="color: var(--text); font-weight: 500;">Movies</div>
                    
                    <div style="color: var(--text-secondary);">Date & Time:</div>
                    <div style="color: var(--text); font-weight: 500;">2023-06-16 13:15:42</div>
                    
                    <div style="color: var(--text-secondary);">IP Address:</div>
                    <div style="color: var(--text); font-weight: 500;">192.168.1.102</div>
                    
                    <div style="color: var(--text-secondary);">User Agent:</div>
                    <div style="color: var(--text); font-weight: 500; font-size: 13px;">Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36</div>
                </div>
            </div>
        </div>
        
        <div>
            <div style="margin-bottom: 25px;">
                <h2 style="font-size: 20px; margin-bottom: 15px; color: var(--text);">Description</h2>
                <div style="background: rgba(255, 255, 255, 0.05); padding: 20px; border-radius: 8px;">
                    <p style="color: var(--text); line-height: 1.6; margin-bottom: 15px;">
                        Created new movie "Spider-Man: Across the Spider-Verse" with the following details:
                    </p>
                    <ul style="color: var(--text); line-height: 1.8; padding-left: 20px;">
                        <li>Title: Spider-Man: Across the Spider-Verse</li>
                        <li>Duration: 140 minutes</li>
                        <li>Rating: PG</li>
                        <li>Genre: Animation, Action, Adventure</li>
                        <li>Release Date: 2023-06-02</li>
                        <li>Director: Joaquim Dos Santos, Kemp Powers, Justin K. Thompson</li>
                        <li>Cast: Shameik Moore, Hailee Steinfeld, Brian Tyree Henry</li>
                    </ul>
                </div>
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
    
    .badge-info {
        background: rgba(33, 150, 243, 0.2);
        color: #2196f3;
    }
</style>
@endpush