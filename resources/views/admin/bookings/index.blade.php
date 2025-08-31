@extends('admin.layouts.app')

@section('title', 'Bookings Management - Movie Booking System')

@section('page-title', 'Bookings Management')

@section('header-actions')
<div class="search-box">
    <i class="fas fa-search"></i>
    <input type="text" placeholder="Search bookings...">
</div>
<a href="{{ route('admin.bookings.create') }}" class="btn-primary">
    <i class="fas fa-plus"></i> New Booking
</a>
@endsection


@section('content')
<!-- Filters -->
<div class="filters">
    <select class="filter-select">
        <option>All Bookings</option>
        <option>Today</option>
        <option>This Week</option>
        <option>This Month</option>
    </select>
    
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
                <td>2023-06-15 19:30</td>
                <td>E12, E13</td>
                <td>$25.00</td>
                <td>Confirmed</td>
                <td>
                    <a href="{{ route('admin.bookings.show', 1) }}" class="action-btn"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('admin.bookings.edit', 1) }}" class="action-btn"><i class="fas fa-edit"></i></a>
                    <button class="action-btn"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
            <tr>
                <td>#BK002</td>
                <td>Jane Smith</td>
                <td>The Batman</td>
                <td>2023-06-15 20:00</td>
                <td>F5, F6</td>
                <td>$28.00</td>
                <td>Confirmed</td>
                <td>
                    <a href="{{ route('admin.bookings.show', 2) }}" class="action-btn"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('admin.bookings.edit', 2) }}" class="action-btn"><i class="fas fa-edit"></i></a>
                    <button class="action-btn"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
            <tr>
                <td>#BK003</td>
                <td>Robert Johnson</td>
                <td>Black Panther: Wakanda Forever</td>
                <td>2023-06-16 18:00</td>
                <td>G8, G9</td>
                <td>$26.00</td>
                <td>Pending</td>
                <td>
                    <a href="{{ route('admin.bookings.show', 3) }}" class="action-btn"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('admin.bookings.edit', 3) }}" class="action-btn"><i class="fas fa-edit"></i></a>
                    <button class="action-btn"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
            <tr>
                <td>#BK004</td>
                <td>Sarah Williams</td>
                <td>Top Gun: Maverick</td>
                <td>2023-06-16 21:15</td>
                <td>H3, H4</td>
                <td>$30.00</td>
                <td>Confirmed</td>
                <td>
                    <a href="{{ route('admin.bookings.show', 4) }}" class="action-btn"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('admin.bookings.edit', 4) }}" class="action-btn"><i class="fas fa-edit"></i></a>
                    <button class="action-btn"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
    
    <!-- Table Footer -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
        <div style="color: var(--text-secondary); font-size: 14px;">
            Showing 1 to 4 of 1,248 entries
        </div>
        <div style="display: flex; gap: 10px;">
            <button class="action-btn">Previous</button>
            <button class="action-btn" style="background: var(--accent);">1</button>
            <button class="action-btn">2</button>
            <button class="action-btn">3</button>
            <button class="action-btn">Next</button>
        </div>
    </div>
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
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    
    .btn-primary:hover {
        background: #c40811;
    }

    .action-btn {
        background: rgba(255, 255, 255, 0.1);
        border: none;
        padding: 8px 12px;
        border-radius: 6px;
        cursor: pointer;
        margin-right: 5px;
        color: var(--text);
        transition: background 0.3s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    
    .action-btn:hover {
        background: rgba(255, 255, 255, 0.2);
    }
</style>
@endpush