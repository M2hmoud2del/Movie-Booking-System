@extends('admin.layouts.app')

@section('title', 'Movies Management - Movie Booking System')

@section('header')
<div class="header">
    <h1 class="page-title">Movies Management</h1>
    <div class="header-actions">
        <div class="search-box">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Search movies...">
        </div>
        <button class="btn" style="background: var(--accent); padding: 10px 20px; border-radius: 30px; border: none; color: white; font-weight: 600; cursor: pointer;">
            <i class="fas fa-plus"></i> Add New Movie
        </button>
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
<!-- Movies Table Section -->
<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">All Movies</h2>
        <div>
            <select style="background: var(--primary); color: var(--text); border: 1px solid rgba(255,255,255,0.1); padding: 8px 15px; border-radius: 6px; margin-right: 10px;">
                <option>Filter by Status</option>
                <option>Now Showing</option>
                <option>Coming Soon</option>
                <option>Ended</option>
            </select>
            <a href="#" class="view-all">Export</a>
        </div>
    </div>
    
    <table class="movies-table">
        <thead>
            <tr>
                <th>Movie Title</th>
                <th>Genre</th>
                <th>Duration</th>
                <th>Release Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Spider-Man: No Way Home</td>
                <td>Action, Adventure</td>
                <td>2h 28m</td>
                <td>Dec 17, 2021</td>
                <td><span class="status now-showing">Now Showing</span></td>
                <td>
                    <button class="action-btn"><i class="fas fa-edit"></i></button>
                    <button class="action-btn"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
            <tr>
                <td>The Batman</td>
                <td>Action, Crime, Drama</td>
                <td>2h 56m</td>
                <td>Mar 4, 2022</td>
                <td><span class="status now-showing">Now Showing</span></td>
                <td>
                    <button class="action-btn"><i class="fas fa-edit"></i></button>
                    <button class="action-btn"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
            <tr>
                <td>Black Panther: Wakanda Forever</td>
                <td>Action, Adventure</td>
                <td>2h 41m</td>
                <td>Nov 11, 2022</td>
                <td><span class="status now-showing">Now Showing</span></td>
                <td>
                    <button class="action-btn"><i class="fas fa-edit"></i></button>
                    <button class="action-btn"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
            <tr>
                <td>Top Gun: Maverick</td>
                <td>Action, Drama</td>
                <td>2h 11m</td>
                <td>May 27, 2022</td>
                <td><span class="status now-showing">Now Showing</span></td>
                <td>
                    <button class="action-btn"><i class="fas fa-edit"></i></button>
                    <button class="action-btn"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script>
    // JavaScript specific to the movies page
    console.log('Movies management page loaded');
</script>
@endpush