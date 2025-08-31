@extends('admin.layouts.app')

@section('title', 'Admin Details - Movie Booking System')

@section('header')
<div class="header">
    <h1 class="page-title">Admin Details</h1>
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
        <h2 class="section-title">Admin Information</h2>
        <div class="header-actions">
            <a href="{{ route('admin.admins.edit', 1) }}" class="btn-primary">
                <i class="fas fa-edit"></i> Edit Admin
            </a>
        </div>
    </div>

    <div class="admin-details" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Full Name</label>
            <p style="font-size: 16px; margin-top: 5px;">John Doe</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Email Address</label>
            <p style="font-size: 16px; margin-top: 5px;">john.doe@cinemax.com</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Phone Number</label>
            <p style="font-size: 16px; margin-top: 5px;">(555) 123-4567</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Admin Since</label>
            <p style="font-size: 16px; margin-top: 5px;">January 15, 2023</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Last Login</label>
            <p style="font-size: 16px; margin-top: 5px;">June 15, 2023 14:30</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Total Actions</label>
            <p style="font-size: 16px; margin-top: 5px;">247</p>
        </div>
    </div>
</div>

<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">Recent Activity</h2>
        <a href="#" class="view-all">View All Activity</a>
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th>Action</th>
                <th>Description</th>
                <th>Date & Time</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Created</td>
                <td>Added new movie "Spider-Man: No Way Home"</td>
                <td>2023-06-15 14:25</td>
            </tr>
            <tr>
                <td>Updated</td>
                <td>Modified screening schedule for Screen 3</td>
                <td>2023-06-15 13:40</td>
            </tr>
            <tr>
                <td>Deleted</td>
                <td>Removed expired promotion</td>
                <td>2023-06-15 12:15</td>
            </tr>
            <tr>
                <td>Created</td>
                <td>Added new customer account</td>
                <td>2023-06-15 11:20</td>
            </tr>
            <tr>
                <td>Updated</td>
                <td>Changed ticket prices for weekend shows</td>
                <td>2023-06-15 10:05</td>
            </tr>
        </tbody>
    </table>
</div>

<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">Admin Actions</h2>
    </div>

    <div style="display: flex; gap: 15px;">
        <a href="{{ route('admin.admins.edit', 1) }}" class="btn-primary">
            <i class="fas fa-edit"></i> Edit Admin
        </a>

        <button class="btn-danger" onclick="confirmDelete()">
            <i class="fas fa-trash"></i> Delete Admin
        </button>

        <button class="btn-secondary">
            <i class="fas fa-envelope"></i> Send Message
        </button>

        <button class="btn-secondary">
            <i class="fas fa-key"></i> Reset Password
        </button>
    </div>
</div>
@endsection

@push('styles')
<style>
    .btn {
        padding: 10px 20px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
    }

    .btn-primary {
        background: var(--accent);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-primary:hover {
        background: #c40811;
    }

    .btn-secondary {
        padding: 10px 20px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(255, 255, 255, 0.1);
        color: var(--text);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .btn-secondary:hover {
        background: rgba(255, 255, 255, 0.2);
    }

    .btn-danger {
        background: rgba(231, 76, 60, 0.8);
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

    .btn-danger:hover {
        background: rgba(231, 76, 60, 1);
    }
</style>
@endpush

@push('scripts')
<script>
    function confirmDelete() {
        if (confirm('Are you sure you want to delete this admin? This action cannot be undone.')) {
            // Here you would typically submit a form or make an AJAX request to delete the admin
            alert('Admin deletion process would be triggered here.');
        }
    }
</script>
@endpush