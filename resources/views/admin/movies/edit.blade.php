@extends('admin.layouts.app')

@section('title', 'Edit Movie - Movie Booking System')

@section('header')
<div class="header">
    <h1 class="page-title">Edit Movie</h1>
    <div class="header-actions">
        <a href="{{ route('admin.movies.index') }}" class="btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Movies
        </a>
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
<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">Edit Movie Information</h2>
    </div>
    
    <form>
        <div class="form-group" style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Movie Poster</label>
            <div style="display: flex; align-items: center; gap: 20px;">
                <img src="https://images.unsplash.com/photo-1635805737707-575885ab0820?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80" alt="Spider-Man" style="width: 100px; height: 140px; border-radius: 8px; object-fit: cover;">
                <div>
                    <div style="border: 2px dashed rgba(255, 255, 255, 0.1); border-radius: 8px; padding: 15px; text-align: center; cursor: pointer; width: 200px;">
                        <i class="fas fa-cloud-upload-alt" style="font-size: 24px; color: var(--text-secondary); margin-bottom: 10px;"></i>
                        <p style="color: var(--text-secondary); font-size: 14px;">Change poster</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="form-row" style="display: flex; gap: 20px; margin-bottom: 20px;">
            <div class="form-group" style="flex: 1;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Title *</label>
                <input type="text" value="Spider-Man: No Way Home" style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
            </div>
            
            <div class="form-group" style="flex: 1;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Rating</label>
                <select style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
                    <option value="G">G - General Audiences</option>
                    <option value="PG">PG - Parental Guidance</option>
                    <option value="PG-13" selected>PG-13 - Parents Strongly Cautioned</option>
                    <option value="R">R - Restricted</option>
                    <option value="NC-17">NC-17 - Adults Only</option>
                </select>
            </div>
        </div>
        
        <div class="form-row" style="display: flex; gap: 20px; margin-bottom: 20px;">
            <div class="form-group" style="flex: 1;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Genre *</label>
                <select style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
                    <option value="action" selected>Action</option>
                    <option value="adventure">Adventure</option>
                    <option value="comedy">Comedy</option>
                    <option value="drama">Drama</option>
                    <option value="horror">Horror</option>
                    <option value="sci-fi">Science Fiction</option>
                    <option value="fantasy">Fantasy</option>
                    <option value="romance">Romance</option>
                    <option value="thriller">Thriller</option>
                </select>
            </div>
            
            <div class="form-group" style="flex: 1;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Duration (minutes) *</label>
                <input type="number" min="1" value="148" style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
            </div>
        </div>
        
        <div class="form-row" style="display: flex; gap: 20px; margin-bottom: 20px;">
            <div class="form-group" style="flex: 1;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Release Date *</label>
                <input type="date" value="2021-12-17" style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
            </div>
            
            <div class="form-group" style="flex: 1;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Director</label>
                <input type="text" value="Jon Watts" style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
            </div>
        </div>
        
        <div class="form-group" style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Cast</label>
            <input type="text" value="Tom Holland, Zendaya, Benedict Cumberbatch, Jacob Batalon" style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
        </div>
        
        <div class="form-group" style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Description *</label>
            <textarea rows="4" style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">With Spider-Man's identity now revealed, Peter asks Doctor Strange for help. When a spell goes wrong, dangerous foes from other worlds start to appear, forcing Peter to discover what it truly means to be Spider-Man.</textarea>
        </div>
        
        <div class="form-group" style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Trailer URL</label>
            <input type="url" value="https://www.youtube.com/watch?v=JfVOs4VSpmA" style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
        </div>
        
        <div class="form-group" style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Status</label>
            <select style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
                <option value="now_showing" selected>Now Showing</option>
                <option value="coming_soon">Coming Soon</option>
                <option value="ended">Ended</option>
            </select>
        </div>
        
        <div class="form-actions" style="display: flex; gap: 15px; margin-top: 30px;">
            <button type="submit" class="btn-primary">
                <i class="fas fa-save"></i> Update Movie
            </button>
            <a href="{{ route('admin.movies.index') }}" class="btn-secondary">
                <i class="fas fa-times"></i> Cancel
            </a>
        </div>
    </form>
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
    }
    
    .btn-primary:hover {
        background: #c40811;
    }
</style>
@endpush