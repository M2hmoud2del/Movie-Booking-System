@extends('admin.layouts.app')

@section('title', 'Reports - Movie Booking System')

@section('header')
<div class="header">
    <h1 class="page-title">Reports & Analytics</h1>
    <div class="header-actions">
        <div class="search-box">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Search reports...">
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
<!-- Date Range Selector -->
<div class="filters">
    <div class="filter-group">
        <label style="margin-right: 10px; color: var(--text-secondary);">Date Range:</label>
        <select class="filter-select">
            <option>Last 7 Days</option>
            <option>Last 30 Days</option>
            <option>Last 90 Days</option>
            <option>Custom Range</option>
        </select>
    </div>
    
    <div class="filter-group">
        <label style="margin-right: 10px; color: var(--text-secondary);">Report Type:</label>
        <select class="filter-select">
            <option>Booking Summary</option>
            <option>Revenue Report</option>
            <option>Customer Analytics</option>
            <option>Movie Performance</option>
        </select>
    </div>
    
    <button class="btn-primary">
        <i class="fas fa-download"></i> Export Report
    </button>
</div>

<!-- Report Summary Cards -->
<div class="stats-container">
    <div class="stat-card">
        <div class="stat-icon" style="background: rgba(46, 204, 113, 0.2); color: #2ecc71;">
            <i class="fas fa-ticket-alt"></i>
        </div>
        <div class="stat-text">
            <h3>348</h3>
            <p>Bookings (Last 7 Days)</p>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-icon" style="background: rgba(52, 152, 219, 0.2); color: #3498db;">
            <i class="fas fa-money-bill-wave"></i>
        </div>
        <div class="stat-text">
            <h3>$8,240</h3>
            <p>Revenue (Last 7 Days)</p>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-icon" style="background: rgba(155, 89, 182, 0.2); color: #9b59b6;">
            <i class="fas fa-users"></i>
        </div>
        <div class="stat-text">
            <h3>214</h3>
            <p>New Customers (Last 7 Days)</p>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-icon" style="background: rgba(243, 156, 18, 0.2); color: #f39c12;">
            <i class="fas fa-percentage"></i>
        </div>
        <div class="stat-text">
            <h3>78%</h3>
            <p>Occupancy Rate</p>
        </div>
    </div>
</div>

<!-- Booking Trends Chart Section -->
<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">Booking Trends</h2>
        <a href="#" class="view-all">View Detailed Report</a>
    </div>
    
    <div style="background: var(--secondary); border-radius: 8px; padding: 20px; height: 300px; display: flex; align-items: center; justify-content: center;">
        <div style="text-align: center; color: var(--text-secondary);">
            <i class="fas fa-chart-line" style="font-size: 48px; margin-bottom: 15px;"></i>
            <p>Booking trends chart visualization would appear here</p>
        </div>
    </div>
</div>

<!-- Top Movies Report -->
<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">Top Performing Movies</h2>
        <a href="#" class="view-all">View All</a>
    </div>
    
    <table class="data-table">
        <thead>
            <tr>
                <th>Movie</th>
                <th>Screen</th>
                <th>Showtimes</th>
                <th>Bookings</th>
                <th>Revenue</th>
                <th>Occupancy</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Spider-Man: No Way Home</td>
                <td>Screen 3</td>
                <td>7:30 PM, 10:00 PM</td>
                <td>142</td>
                <td>$3,550</td>
                <td>92%</td>
            </tr>
            <tr>
                <td>The Batman</td>
                <td>Screen 1</td>
                <td>8:00 PM, 11:00 PM</td>
                <td>128</td>
                <td>$3,200</td>
                <td>88%</td>
            </tr>
            <tr>
                <td>Black Panther: Wakanda Forever</td>
                <td>Screen 2</td>
                <td>6:00 PM, 9:00 PM</td>
                <td>118</td>
                <td>$2,950</td>
                <td>85%</td>
            </tr>
            <tr>
                <td>Top Gun: Maverick</td>
                <td>Screen 4</td>
                <td>5:30 PM, 9:30 PM</td>
                <td>96</td>
                <td>$2,400</td>
                <td>78%</td>
            </tr>
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
        align-items: center;
    }
    
    .filter-group {
        display: flex;
        align-items: center;
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