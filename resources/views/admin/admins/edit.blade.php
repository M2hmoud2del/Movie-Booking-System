@extends('admin.layouts.app')

@section('title', 'Edit Admin - Movie Booking System')

@section('header')
<div class="header">
    <h1 class="page-title">Edit Administrator</h1>
    <div class="header-actions">
        <a href="{{ route('admin.admins.index') }}" class="btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Admins
        </a>
        <div class="user-info">
            <div class="user-img">AD</div>
            <div>
                <div style="font-weight: 600;">Admin User</div>
                <div style="font-size: 13px; color: var(--text-secondary);">Administrator</div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">Edit Admin Information</h2>
    </div>
    
    <form>
        <div class="form-row" style="display: flex; gap: 20px; margin-bottom: 20px;">
            <div class="form-group" style="flex: 1;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Full Name *</label>
                <input type="text" value="John Doe" style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
            </div>
            
            <div class="form-group" style="flex: 1;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Email Address *</label>
                <input type="email" value="john.doe@cinemax.com" style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
            </div>
        </div>
        
        <div class="form-row" style="display: flex; gap: 20px; margin-bottom: 20px;">
            <div class="form-group" style="flex: 1;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Phone Number</label>
                <input type="tel" value="(555) 123-4567" style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
            </div>
        </div>
        
        <div class="form-row" style="display: flex; gap: 20px; margin-bottom: 20px;">
            <div class="form-group" style="flex: 1;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">New Password (leave blank to keep current)</label>
                <input type="password" style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
            </div>
            
            <div class="form-group" style="flex: 1;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Confirm New Password</label>
                <input type="password" style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
            </div>
        </div>
        
        <div class="form-actions" style="display: flex; gap: 15px; margin-top: 30px;">
            <button type="submit" class="btn-primary">
                <i class="fas fa-save"></i> Update Admin
            </button>
            <a href="{{ route('admin.admins.index') }}" class="btn-secondary">
                <i class="fas fa-times"></i> Cancel
            </a>
        </div>
    </form>
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
    
    .btn-primary {
        background: var(--accent);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    
    .btn-primary:hover {
        background: #c40811;
    }
</style>
@endpush
