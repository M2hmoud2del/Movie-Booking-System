@extends('admin.layouts.app')

@section('title', 'Bookings Management - Movie Booking System')

@section('header')
<div class="header">
    <h1 class="page-title">Bookings Management</h1>
    <div class="header-actions">
        <div class="search-box">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Search bookings...">
        </div>
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
<!-- Filters -->
<div class="filters">
    <select class="filter-select">
        <option>All Status</option>
        <option>Confirmed</option>
        <option>Pending</option>
        <option>Cancelled</option>
    </select>
    
    <select class="filter-select">
        <option>All Movies</option>
        <option>Spider-Man: No Way Home</option>
        <option>The Batman</option>
        <option>Black Panther: Wakanda Forever</option>
    </select>
    
    <select class="filter-select">
        <option>All Dates</option>
        <option>Today</option>
        <option>This Week</option>
        <option>This Month</option>
    </select>
    
    <button class="btn-primary">
        <i class="fas fa-plus"></i> New Booking
    </button>
</div>

<!-- Bookings Table -->
<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">All Bookings</h2>
        <a href="#" class="view-all">Export CSV</a>
    </div>
    
    <table class="data-table">
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Customer</th>
                <th>Movie</th>
                <th>Date & Time</th>
                <th>Seats</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>#BK001</td>
                <td>John Doe</td>
                <td>Spider-Man: No Way Home</td>
                <td>Today, 7:30 PM</td>
                <td>E12, E13</td>
                <td>$25.00</td>
                <td><span class="status active">Confirmed</span></td>
                <td>
                    <button class="action-btn"><i class="fas fa-eye"></i></button>
                    <button class="action-btn"><i class="fas fa-edit"></i></button>
                    <button class="action-btn"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
            <!-- المزيد من الصفوف -->
        </tbody>
    </table>
</div>
@endsection

@push('styles')
<style>
    .filters {
        display: flex;
        gap: 15px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }
    
    .filter-select {
        background: var(--secondary);
        color: var(--text);
        border: 1px solid rgba(255, 255, 255, 0.1);
        padding: 10px 15px;
        border-radius: 6px;
        outline: none;
    }
    
    .btn-primary {
        background: var(--accent);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .btn-primary:hover {
        background: #c40811;
    }
</style>
@endpush