@extends('admin.layouts.app')

@section('title', 'Admin Dashboard - Movie Booking System')

@section('page-title', 'Admin Dashboard')

@section('header-actions')
<div class="search-box">
    <i class="fas fa-search"></i>
    <input type="text" placeholder="Search...">
</div>
@endsection


@section('content')
<!-- Stats Cards -->
<div class="stats-container">
    <div class="stat-card">
        <div class="stat-icon" style="background: rgba(46, 204, 113, 0.2); color: #2ecc71;">
            <i class="fas fa-ticket-alt"></i>
        </div>
        <div class="stat-text">
            <h3>1,248</h3>
            <p>Total Bookings</p>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-icon" style="background: rgba(52, 152, 219, 0.2); color: #3498db;">
            <i class="fas fa-video"></i>
        </div>
        <div class="stat-text">
            <h3>24</h3>
            <p>Movies Showing</p>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-icon" style="background: rgba(155, 89, 182, 0.2); color: #9b59b6;">
            <i class="fas fa-users"></i>
        </div>
        <div class="stat-text">
            <h3>5,842</h3>
            <p>Total Customers</p>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-icon" style="background: rgba(231, 76, 60, 0.2); color: #e74c3c;">
            <i class="fas fa-money-bill-wave"></i>
        </div>
        <div class="stat-text">
            <h3>$28,540</h3>
            <p>Total Revenue</p>
        </div>
    </div>
</div>

<!-- Now Showing Section -->
<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">Now Showing</h2>
        <a href="{{route('admin.screenings.index')}}" class="view-all">View All</a>
    </div>
    
    <table class="data-table">
        <thead>
            <tr>
                <th>Movie Title</th>
                <th>Duration</th>
                <th>Screen</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Spider-Man: No Way Home</td>
                <td>2h 28m</td>
                <td>Screen 3</td>
                <td><span class="status active">Now Showing</span></td>
                <td>
                    <a href="{{route('admin.screenings.edit',1)}}" class="action-btn"><i class="fas fa-edit"></i></a>
                    <a href="{{route('admin.screenings.destroy',1)}}" class="action-btn"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            <tr>
                <td>The Batman</td>
                <td>2h 56m</td>
                <td>Screen 1</td>
                <td><span class="status active">Now Showing</span></td>
                <td>
                    <a href="{{route('admin.screenings.edit',1)}}" class="action-btn"><i class="fas fa-edit"></i></a>
                    <a href="{{route('admin.screenings.destroy',1)}}" class="action-btn"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            <tr>
                <td>Black Panther: Wakanda Forever</td>
                <td>2h 41m</td>
                <td>Screen 2</td>
                <td><span class="status active">Now Showing</span></td>
                <td>
                    <a href="{{route('admin.screenings.edit',1)}}" class="action-btn"><i class="fas fa-edit"></i></a>
                    <a href="{{route('admin.screenings.destroy',1)}}" class="action-btn"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            <tr>
                <td>Top Gun: Maverick</td>
                <td>2h 11m</td>
                <td>Screen 4</td>
                <td><span class="status active">Now Showing</span></td>
                <td>
                    <a href="{{route('admin.screenings.edit',1)}}" class="action-btn"><i class="fas fa-edit"></i></a>
                    <a href="{{route('admin.screenings.destroy',1)}}" class="action-btn"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Recent Bookings Section -->
<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">Recent Bookings</h2>
        <a href="{{route('admin.bookings.index')}}" class="view-all">View All</a>
    </div>
    
    <div class="bookings-list">
        <div class="booking-item">
            <img src="https://images.unsplash.com/photo-1635805737707-575885ab0820?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Spider-Man" class="booking-poster">
            <div class="booking-details">
                <div class="booking-movie">Spider-Man: No Way Home</div>
                <div class="booking-info">
                    <span>John Doe</span>
                    <span>Screen 3</span>
                    <span>Today, 7:30 PM</span>
                </div>
            </div>
            <div class="booking-price">$12.50</div>
        </div>
        
        <div class="booking-item">
            <img src="https://images.unsplash.com/photo-1594909122845-11baa439b7bf?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="The Batman" class="booking-poster">
            <div class="booking-details">
                <div class="booking-movie">The Batman</div>
                <div class="booking-info">
                    <span>Jane Smith</span>
                    <span>Screen 1</span>
                    <span>Today, 8:00 PM</span>
                </div>
            </div>
            <div class="booking-price">$14.00</div>
        </div>
        
        <div class="booking-item">
            <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Black Panther" class="booking-poster">
            <div class="booking-details">
                <div class="booking-movie">Black Panther: Wakanda Forever</div>
                <div class="booking-info">
                    <span>Robert Johnson</span>
                    <span>Screen 2</span>
                    <span>Tomorrow, 6:00 PM</span>
                </div>
            </div>
            <div class="booking-price">$13.50</div>
        </div>
        
        <div class="booking-item">
            <img src="https://images.unsplash.com/photo-1585951237318-9ea5e175b891?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Top Gun" class="booking-poster">
            <div class="booking-details">
                <div class="booking-movie">Top Gun: Maverick</div>
                <div class="booking-info">
                    <span>Sarah Williams</span>
                    <span>Screen 4</span>
                    <span>Tomorrow, 9:15 PM</span>
                </div>
            </div>
            <div class="booking-price">$15.00</div>
        </div>
    </div>
</div>
@endsection