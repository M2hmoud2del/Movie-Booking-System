@extends('admin.layouts.app')

@section('title', 'Create New Movie - Movie Booking System')

@section('page-title', 'Create New Movie')

@section('header-actions')
<a href="{{ route('admin.movies.index') }}" class="btn-secondary">
    <i class="fas fa-arrow-left"></i> Back to Movies
</a>
@endsection


@section('content')
<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">Movie Information</h2>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="error-list">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <form action="{{ route('admin.movies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Movie Poster -->
        <div class="form-group poster-upload">
            <label>Movie Poster</label>
            <div class="poster-dropzone" onclick="this.querySelector('input').click()">
                <i class="fas fa-cloud-upload-alt poster-icon"></i>
                <p class="poster-text-main">Click to upload or drag and drop</p>
                <p class="poster-text-sub">SVG, PNG, JPG or GIF (max. 800x400px)</p>
                <input type="file" name="poster" style="display: none;">
            </div>
        </div>

        <!-- Title & User Rating -->
        <div class="form-row">
            <div class="form-group">
                <label>Title *</label>
                <input type="text" name="name" value="{{ old('title') }}">
            </div>

            <div class="form-group">
                <label>User Rating</label>
                <input type="number" name="rating" min="0" max="5" step="0.1" placeholder="Enter rating from 0 to 5">
            </div>
        </div>

        <!-- Genre & Duration -->
        <div class="form-row" style="display: flex; gap: 20px; margin-bottom: 20px;">
            <div class="form-group" style="flex: 1;">
            <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Genre *</label>
            <input type="text" name="genre" value="{{ old('genre') }}" style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
            </div>

            <div class="form-group">
                <label>Duration (minutes) *</label>
                <input type="number" name="duration" value="{{ old('duration') }}" min="1">
            </div>
        </div>

        <!-- Release Date & Director -->
        <div class="form-row">
            <div class="form-group">
                <label>Release Date *</label>
                <input type="date" name="release_date" value="{{ old('release_date') }}">
            </div>
            <div class="form-group">
                <label>Director</label>
                <input type="text" name="director" value="{{ old('director') }}">
            </div>
        </div>

        <!-- Cast -->
        <div class="form-group">
            <label>Cast</label>
            <input type="text" name="cast" value="{{ old('cast') }}" placeholder="Enter cast members separated by commas">
        </div>

        <!-- Description -->
        <div class="form-group">
            <label>Description *</label>
            <textarea name="description" rows="4">{{ old('description') }}</textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-primary">
                <i class="fas fa-save"></i> Create Movie
            </button>
            <button type="reset" class="btn-secondary">
                <i class="fas fa-times"></i> Reset Form
            </button>
        </div>
    </form>
</div>
@endsection


@push('styles')
<style>
    /* Buttons */
    .btn-secondary {
        background: rgba(255, 255, 255, 0.1);
        color: var(--text);
        border: 1px solid rgba(255, 255, 255, 0.1);
        padding: 10px 20px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-secondary:hover {
        background: rgba(255, 255, 255, 0.2);
    }

    .btn-primary {
        background: var(--accent);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-primary:hover {
        background: #c40811;
    }

    /* Form layout */
    .form-row {
        display: flex;
        gap: 20px;
        margin-bottom: 20px;
    }

    .form-group {
        flex: 1;
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: var(--text-secondary);
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 12px;
        border-radius: 6px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        background: var(--secondary);
        color: var(--text);
    }

    /* Poster upload */
    .poster-dropzone {
        border: 2px dashed rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        padding: 30px;
        text-align: center;
        cursor: pointer;
    }

    .poster-dropzone .poster-icon {
        font-size: 48px;
        color: var(--text-secondary);
        margin-bottom: 15px;
    }

    .poster-dropzone .poster-text-main {
        color: var(--text-secondary);
    }

    .poster-dropzone .poster-text-sub {
        font-size: 12px;
        color: var(--text-secondary);
    }

    /* Error list */
    .error-list {
        margin-top: 10px;
        padding-left: 20px;
    }
</style>
@endpush
