@extends('admin.layouts.app')

@section('title', 'Movies Management - Movie Booking System')

@section('page-title', 'Movies Management')

@section('header-actions')
<a href="{{ route('admin.movies.create') }}" class="btn-primary">
    <i class="fas fa-plus"></i> New Movie
</a>
@endsection

@section('content')
<!-- Movies Table -->
<div class="dashboard-section">
    @if (session('success'))
    @php
    $message = session('success');
    $alertClass = 'alert-success';
    if (Str::contains(strtolower($message), 'update')) {
    $alertClass = 'alert-warning';
    } elseif (Str::contains(strtolower($message), 'create')) {
    $alertClass = 'alert-info';
    } elseif (Str::contains(strtolower($message), 'delete')) {
    $alertClass = 'alert-danger';
    }
    @endphp
    <div class="alert {{ $alertClass }}">
        {{ $message }}
    </div>
    @endif
    <div class="section-header">
        <h2 class="section-title">All Movies</h2>
    </div>

    <table class="data-table" id="moviesTable">
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
            @forelse ($movies as $movie)
            <tr>
                <td>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <img src="{{ asset($movie->poster) }}" alt="{{ $movie->name }}" style="width: 50px; height: 70px; border-radius: 5px; object-fit: cover;">
                        <div>
                            <div style="font-weight: 600;">{{ $movie->name }}</div>
                            <div style="font-size: 12px; color: var(--text-secondary);">{{ $movie->rating }}</div>
                        </div>
                    </div>
                </td>
                <td>{{ $movie->genre }}</td>
                <td>{{ $movie->duration }}</td>
                <td>{{ $movie->release_date->format('Y-m-d') }}</td>
                <td>
                    <div style="display: flex; align-items: center; gap: 5px;">
                        <i class="fas fa-star" style="color: gold;"></i>
                        <span>{{ $movie->rating }}/5</span>
                    </div>
                </td>
                <td>{{ $movie->status }}</td>
                <td>
                    <a href="{{ route('admin.movies.show', $movie->id) }}" class="action-btn"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('admin.movies.edit', $movie->id) }}" class="action-btn"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('admin.movies.destroy', $movie->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="action-btn" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7">No movies found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div style="margin-top: 20px;">
        {{ $movies->links('vendor.pagination.custom') }}
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