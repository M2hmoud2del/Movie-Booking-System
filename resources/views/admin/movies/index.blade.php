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
            @foreach($movies as $movie)
            <tr>
                <td>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <img src="{{ $movie->poster_url }}" alt="{{ $movie->title }}" style="width: 50px; height: 70px; border-radius: 5px; object-fit: cover;">
                        <div>
                            <div style="font-weight: 600;">{{ $movie->title }}</div>
                            <div style="font-size: 12px; color: var(--text-secondary);">{{ $movie->rating }}</div>
                        </div>
                    </div>
                </td>
                <td>{{ $movie->genre }}</td>
                <td>{{ $movie->duration }}</td>
                <td>{{ $movie->release_date }}</td>
                <td>
                    <div style="display: flex; align-items: center; gap: 5px;">
                        <i class="fas fa-star" style="color: gold;"></i>
                        <span>{{ $movie->star_rating }}/5</span>
                    </div>
                </td>
                <td>{{ $movie->status }}</td>
                <td>
                    <a href="{{ route('admin.movies.show', $movie->id) }}" class="action-btn"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('admin.movies.edit', $movie->id) }}" class="action-btn"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('admin.movies.destroy', $movie->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-btn" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Table Footer -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
        <div style="color: var(--text-secondary); font-size: 14px;">
            Showing {{ $movies->firstItem() }} to {{ $movies->lastItem() }} of {{ $movies->total() }} entries
        </div>
        <div style="display: flex; gap: 10px;">
            {{ $movies->links() }}
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Filters */
    .filters {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 20px;
        align-items: center;
    }

    .filter-select {
        padding: 8px 12px;
        border-radius: 6px;
        border: 1px solid #ccc;
        outline: none;
        background-color: #f3f4f6;
        color: #111827;
        font-size: 14px;
    }

    /* Buttons */
    .btn-primary {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 8px 14px;
        background-color: #ef4444;
        /* accent color */
        color: #fff;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s;
        text-decoration: none;
    }

    .btn-primary:hover {
        background-color: #c40811;
        text-decoration: none;
        color: #fff;
    }

    /* Action buttons in table */
    .action-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 6px 10px;
        border-radius: 6px;
        background-color: #3b82f6;
        /* blue for view */
        color: #fff;
        border: none;
        cursor: pointer;
        margin-right: 4px;
        transition: background 0.3s;
        font-size: 14px;
    }

    .action-btn:hover {
        opacity: 0.85;
    }

    /* Specific colors for edit/delete */
    .action-btn:nth-child(2) {
        background-color: #10b981;
    }

    /* edit: green */
    .action-btn:nth-child(3) {
        background-color: #ef4444;
    }

    /* delete: red */
</style>
@endpush