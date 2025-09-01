@extends('admin.layouts.app')

@section('title', 'Create New Movie - Movie Booking System')

@section('page-title', 'Create New Movie')

@section('content')
<div class="form-container">
    <form action="{{ route('admin.movies.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Movie Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="genre">Genre</label>
            <input type="text" name="genre" id="genre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="duration">Duration</label>
            <input type="text" name="duration" id="duration" class="form-control" placeholder="e.g., 2h 30m" required>
        </div>
        <div class="form-group">
            <label for="release_date">Release Date</label>
            <input type="date" name="release_date" id="release_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="rating">Rating</label>
            <input type="text" name="rating" id="rating" class="form-control" placeholder="e.g., PG-13" required>
        </div>
        <div class="form-group">
            <label for="director">Director</label>
            <input type="text" name="director" id="director" class="form-control">
        </div>
        <div class="form-group">
            <label for="cast">Cast</label>
            <input type="text" name="cast" id="cast" class="form-control" placeholder="e.g., Actor 1, Actor 2">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="Now Showing">Now Showing</option>
                <option value="Coming Soon">Coming Soon</option>
                <option value="Ended">Ended</option>
            </select>
        </div>
        <div class="form-group">
            <label for="poster">Poster URL</label>
            <input type="url" name="poster" id="poster" class="form-control">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-primary">Create Movie</button>
            <a href="{{ route('admin.movies.index') }}" class="btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
@push('styles')
<style>
    .form-container {
        background: #1e1e2d;
        padding: 30px;
        border-radius: 10px;
        color: white;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
    }

    .form-control {
        width: 100%;
        padding: 12px;
        border-radius: 6px;
        border: 1px solid #333;
        background: #282836;
        color: white;
        font-size: 16px;
    }

    .form-control:focus {
        outline: none;
        border-color: #ef4444;
    }

    .form-actions {
        display: flex;
        gap: 10px;
        margin-top: 30px;
    }

    .btn-primary,
    .btn-secondary {
        padding: 12px 20px;
        border-radius: 6px;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        transition: background 0.3s;
        border: none;
    }

    .btn-primary:hover {
        background: #c40811;
    }

    .btn-secondary {
        background: #4a4a60;
        color: white;
    }

    .btn-secondary:hover {
        background: #3a3a4c;
    }
</style>
@endpush