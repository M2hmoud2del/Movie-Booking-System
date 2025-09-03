@extends('admin.layouts.app')

@section('title', 'Movie Details - Movie Booking System')
@section('page-title', 'Movie Details')

@section('header-actions')
<a href="{{ route('admin.movies.index') }}" class="btn-secondary">
    <i class="fas fa-arrow-left"></i> Back to Movies
</a>
@endsection

@section('content')
<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">Movie Information</h2>
        <div class="header-actions">
            <a href="{{ route('admin.movies.edit', $movie->id) }}" class="btn-primary">
                <i class="fas fa-edit"></i> Edit Movie
            </a>
        </div>
    </div>
    
    <div class="movie-details" style="display: grid; grid-template-columns: 1fr 2fr; gap: 30px;">
        <div>
            <img src="{{ asset($movie->poster) }}" alt="{{ $movie->name }}" style="width: 100%; border-radius: 8px; object-fit: cover;">
        </div>
        
        <div>
            <div style="margin-bottom: 25px;">
                <h2 style="font-size: 24px; margin-bottom: 10px; color: var(--text);">{{ $movie->name }}</h2>
                <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
                    <span style="background: rgba(255, 193, 7, 0.2); color: #ffc107; padding: 4px 10px; border-radius: 20px; font-size: 13px; font-weight: 600;">
                        {{ $movie->rating }}
                    </span>
                    <span style="color: var(--text-secondary);">
                        <i class="fas fa-clock" style="margin-right: 5px;"></i> {{ $movie->duration }} minutes
                    </span>
                    <span style="color: var(--text-secondary);">
                        <i class="fas fa-film" style="margin-right: 5px;"></i> {{ $movie->genre }}
                    </span>
                </div>
                <p style="color: var(--text-secondary); line-height: 1.6;">{{ $movie->description }}</p>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px;">
                <div>
                    <h3 style="font-size: 14px; color: var(--text-secondary); margin-bottom: 8px;">Release Date</h3>
                    <p style="color: var(--text); font-weight: 500;">
                        {{ $movie->release_date->format('F d, Y') }}
                    </p>
                </div>
                
                <div>
                    <h3 style="font-size: 14px; color: var(--text-secondary); margin-bottom: 8px;">Director</h3>
                    <p style="color: var(--text); font-weight: 500;">{{ $movie->director }}</p>
                </div>
                
                <div>
                    <h3 style="font-size: 14px; color: var(--text-secondary); margin-bottom: 8px;">Cast</h3>
                    <p style="color: var(--text); font-weight: 500;">{{ $movie->cast }}</p>
                </div>
                
                <div>
                    <h3 style="font-size: 14px; color: var(--text-secondary); margin-bottom: 8px;">Status</h3>
                    <span style="background: rgba(76, 175, 80, 0.2); color: #4caf50; padding: 4px 10px; border-radius: 20px; font-size: 13px; font-weight: 600;">
                        {{ $movie->status }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
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
        text-decoration: none;
    }
    
    .btn-primary:hover {
        background: #c40811;
    }
</style>
@endpush
