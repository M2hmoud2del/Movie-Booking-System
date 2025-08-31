@extends('admin.layouts.app')

@section('title', 'Movies Management - Movie Booking System')

@section('page-title', 'Movies Management')

@section('header-actions')
<div class="search-box">
    <i class="fas fa-search"></i>
    <input type="text" placeholder="Search movies...">
</div>
<a href="{{ route('admin.movies.create') }}" class="btn-primary">
    <i class="fas fa-plus"></i> New Movie
</a>
@endsection


@section('content')
<!-- Filters -->
<div class="filters">
    <select class="filter-select">
        <option>All Genres</option>
        <option>Action</option>
        <option>Adventure</option>
        <option>Comedy</option>
        <option>Drama</option>
        <option>Horror</option>
    </select>
    
    <select class="filter-select">
        <option>All Status</option>
        <option>Now Showing</option>
        <option>Coming Soon</option>
        <option>Ended</option>
    </select>
    
    <select class="filter-select">
        <option>Sort By</option>
        <option>Newest</option>
        <option>Oldest</option>
        <option>Title (A-Z)</option>
        <option>Title (Z-A)</option>
    </select>
</div>

<!-- Movies Table -->
<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">All Movies</h2>
        <a href="#" class="view-all">Export CSV</a>
    </div>
    
    <table class="data-table">
        <thead>
            <tr>
                <th>Movie</th>
                <th>Genre</th>
                <th>Duration</th>
                <th>Release Date</th>
                <th>Rating</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <img src="https://images.unsplash.com/photo-1635805737707-575885ab0820?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" alt="Spider-Man" style="width: 50px; height: 70px; border-radius: 5px; object-fit: cover;">
                        <div>
                            <div style="font-weight: 600;">Spider-Man: No Way Home</div>
                            <div style="font-size: 12px; color: var(--text-secondary);">PG-13</div>
                        </div>
                    </div>
                </td>
                <td>Action, Adventure</td>
                <td>2h 28m</td>
                <td>2021-12-17</td>
                <td>
                    <div style="display: flex; align-items: center; gap: 5px;">
                        <i class="fas fa-star" style="color: gold;"></i>
                        <span>4.8/5</span>
                    </div>
                </td>
                <td>Now Showing</td>
                <td>
                    <a href="{{ route('admin.movies.show', 1) }}" class="action-btn"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('admin.movies.edit', 1) }}" class="action-btn"><i class="fas fa-edit"></i></a>
                    <button class="action-btn"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
            <tr>
                <td>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <img src="https://images.unsplash.com/photo-1594909122845-11baa439b7bf?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" alt="The Batman" style="width: 50px; height: 70px; border-radius: 5px; object-fit: cover;">
                        <div>
                            <div style="font-weight: 600;">The Batman</div>
                            <div style="font-size: 12px; color: var(--text-secondary);">PG-13</div>
                        </div>
                    </div>
                </td>
                <td>Action, Crime, Drama</td>
                <td>2h 56m</td>
                <td>2022-03-04</td>
                <td>
                    <div style="display: flex; align-items: center; gap: 5px;">
                        <i class="fas fa-star" style="color: gold;"></i>
                        <span>4.7/5</span>
                    </div>
                </td>
                <td>Now Showing</td>
                <td>
                    <a href="{{ route('admin.movies.show', 2) }}" class="action-btn"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('admin.movies.edit', 2) }}" class="action-btn"><i class="fas fa-edit"></i></a>
                    <button class="action-btn"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
            <tr>
                <td>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" alt="Black Panther" style="width: 50px; height: 70px; border-radius: 5px; object-fit: cover;">
                        <div>
                            <div style="font-weight: 600;">Black Panther: Wakanda Forever</div>
                            <div style="font-size: 12px; color: var(--text-secondary);">PG-13</div>
                        </div>
                    </div>
                </td>
                <td>Action, Adventure</td>
                <td>2h 41m</td>
                <td>2022-11-11</td>
                <td>
                    <div style="display: flex; align-items: center; gap: 5px;">
                        <i class="fas fa-star" style="color: gold;"></i>
                        <span>4.6/5</span>
                    </div>
                </td>
                <td>Now Showing</td>
                <td>
                    <a href="{{ route('admin.movies.show', 3) }}" class="action-btn"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('admin.movies.edit', 3) }}" class="action-btn"><i class="fas fa-edit"></i></a>
                    <button class="action-btn"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
            <tr>
                <td>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <img src="https://images.unsplash.com/photo-1585951237318-9ea5e175b891?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" alt="Top Gun" style="width: 50px; height: 70px; border-radius: 5px; object-fit: cover;">
                        <div>
                            <div style="font-weight: 600;">Top Gun: Maverick</div>
                            <div style="font-size: 12px; color: var(--text-secondary);">PG-13</div>
                        </div>
                    </div>
                </td>
                <td>Action, Drama</td>
                <td>2h 11m</td>
                <td>2022-05-27</td>
                <td>
                    <div style="display: flex; align-items: center; gap: 5px;">
                        <i class="fas fa-star" style="color: gold;"></i>
                        <span>4.9/5</span>
                    </div>
                </td>
                <td>Now Showing</td>
                <td>
                    <a href="{{ route('admin.movies.show', 4) }}" class="action-btn"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('admin.movies.edit', 4) }}" class="action-btn"><i class="fas fa-edit"></i></a>
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