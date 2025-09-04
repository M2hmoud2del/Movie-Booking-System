@extends('admin.layouts.app')

@section('title', 'Admin Dashboard - movies movies System')

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
            <h3>{{$totalMovies}}</h3>
            <p>Total moviess</p>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-icon" style="background: rgba(52, 152, 219, 0.2); color: #3498db;">
            <i class="fas fa-video"></i>
        </div>
        <div class="stat-text">
            <h3>{{$moviesShowing}}</h3>
            <p>moviess Showing</p>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-icon" style="background: rgba(155, 89, 182, 0.2); color: #9b59b6;">
            <i class="fas fa-users"></i>
        </div>
        <div class="stat-text">
            <h3>{{$totalCustomers}}</h3>
            <p>Total Customers</p>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-icon" style="background: rgba(231, 76, 60, 0.2); color: #e74c3c;">
            <i class="fas fa-money-bill-wave"></i>
        </div>
        <div class="stat-text">
            <h3>{{$totalRevenue}}</h3>
            <p>Total Revenue</p>
        </div>
    </div>
</div>

<!-- Recent moviess Section -->
<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">Recent Moives</h2>
        <a href="{{route('admin.movies.index')}}" class="view-all">View All</a>
    </div>
    
    <div class="moviess-list">
        @foreach($movies as $movie)
            <div class="movies-item">
                <img src="{{ asset($movie->poster) }}" alt="{{ $movie->name }}" class="movies-poster">
                <div class="movies-details">
                    <div class="movies-title">{{ $movie->name }}</div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection