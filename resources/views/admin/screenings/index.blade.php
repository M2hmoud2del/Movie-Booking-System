@extends('admin.layouts.app')

@section('title', 'Screenings Management - Movie Booking System')

@section('header')
<div class="header">
    <h1 class="page-title">Screenings Management</h1>
    <div class="header-actions">
        <div class="search-box">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Search screenings...">
        </div>
        <a href="{{ route('admin.screenings.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i> New Screening
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
<!-- Filters -->
<div class="filters">
    <select class="filter-select">
        <option>All Screens</option>
        <option>Screen 1</option>
        <option>Screen 2</option>
        <option>Screen 3</option>
        <option>Screen 4</option>
    </select>
    
    <select class="filter-select">
        <option>All Movies</option>
        <option>Spider-Man: No Way Home</option>
        <option>The Batman</option>
        <option>Black Panther: Wakanda Forever</option>
        <option>Top Gun: Maverick</option>
    </select>
    
    <select class="filter-select">
        <option>All Dates</option>
        <option>Today</option>
        <option>This Week</option>
        <option>This Month</option>
    </select>
</div>

<!-- Screenings Table -->
<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">All Screenings</h2>
        <a href="#" class="view-all">Export CSV</a>
    </div>
    
    <table class="data-table">
        <thead>
            <tr>
                <th>Movie</th>
                <th>Screen</th>
                <th>Date</th>
                <th>Showtimes</th>
                <th>Available Seats</th>
                <th>Ticket Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Spider-Man: No Way Home</td>
                <td>Screen 3</td>
                <td>2023-06-15</td>
                <td>7:30 PM, 10:00 PM</td>
                <td>45/120</td>
                <td>$12.50</td>
                <td>
                    <a href="{{ route('admin.screenings.show', 1) }}" class="action-btn"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('admin.screenings.edit', 1) }}" class="action-btn"><i class="fas fa-edit"></i></a>
                    <button class="action-btn"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
            <tr>
                <td>The Batman</td>
                <td>Screen 1</td>
                <td>2023-06-15</td>
                <td>8:00 PM, 11:00 PM</td>
                <td>32/150</td>
                <td>$14.00</td>
                <td>
                    <a href="{{ route('admin.screenings.show', 2) }}" class="action-btn"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('admin.screenings.edit', 2) }}" class="action-btn"><i class="fas fa-edit"></i></a>
                    <button class="action-btn"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
            <tr>
                <td>Black Panther: Wakanda Forever</td>
                <td>Screen 2</td>
                <td>2023-06-16</td>
                <td>6:00 PM, 9:00 PM</td>
                <td>78/120</td>
                <td>$13.50</td>
                <td>
                    <a href="{{ route('admin.screenings.show', 3) }}" class="action-btn"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('admin.screenings.edit', 3) }}" class="action-btn"><i class="fas fa-edit"></i></a>
                    <button class="action-btn"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
            <tr>
                <td>Top Gun: Maverick</td>
                <td>Screen 4</td>
                <td>2023-06-16</td>
                <td>5:30 PM, 9:30 PM</td>
                <td>15/100</td>
                <td>$15.00</td>
                <td>
                    <a href="{{ route('admin.screenings.show', 4) }}" class="action-btn"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('admin.screenings.edit', 4) }}" class="action-btn"><i class="fas fa-edit"></i></a>
                    <button class="action-btn"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
    
    <!-- Table Footer -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
        <div style="color: var(--text-secondary); font-size: 14px;">
            Showing 1 to 4 of 24 entries
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