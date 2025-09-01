@extends('admin.layouts.app')

@section('title', 'Edit Movie - Movie Booking System')

@section('page-title', 'Edit Movie: ' . $movie->name)

@section('content')
<div class="form-container">
    <form action="{{ route('admin.movies.update', $movie->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Movie Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $movie->name }}" required>
        </div>
        <div class="form-group">
            <label for="genre">Genre</label>
            <input type="text" name="genre" id="genre" class="form-control" value="{{ $movie->genre }}" required>
        </div>
        <div class="form-group">
            <label for="duration">Duration</label>
            <input type="text" name="duration" id="duration" class="form-control" value="{{ $movie->duration }}" required>
        </div>
        <div class="form-group">
            <label for="release_date">Release Date</label>
            <input type="date" name="release_date" id="release_date" class="form-control" value="{{ $movie->release_date }}" required>
        </div>
        <div class="form-group">
            <label for="rating">Rating</label>
            <input type="text" name="rating" id="rating" class="form-control" value="{{ $movie->rating }}" required>
        </div>
        <div class="form-group">
            <label for="director">Director</label>
            <input type="text" name="director" id="director" class="form-control" value="{{ $movie->director }}">
        </div>
        <div class="form-group">
            <label for="cast">Cast</label>
            <input type="text" name="cast" id="cast" class="form-control" value="{{ $movie->cast }}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="5">{{ $movie->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="Now Showing" {{ $movie->status == 'Now Showing' ? 'selected' : '' }}>Now Showing</option>
                <option value="Coming Soon" {{ $movie->status == 'Coming Soon' ? 'selected' : '' }}>Coming Soon</option>
                <option value="Ended" {{ $movie->status == 'Ended' ? 'selected' : '' }}>Ended</option>
            </select>
        </div>
        <div class="form-group">
            <label for="poster">Poster URL</label>
            <input type="url" name="poster" id="poster" class="form-control" value="{{ $movie->poster }}">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-primary">Update Movie</button>
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