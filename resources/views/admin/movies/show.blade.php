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
            <a href="{{ route('admin.movies.edit', 1) }}" class="btn-primary">
                <i class="fas fa-edit"></i> Edit Movie
            </a>
        </div>
    </div>
    
    <div class="movie-details" style="display: grid; grid-template-columns: 1fr 2fr; gap: 30px;">
        <div>
            <img src="https://images.unsplash.com/photo-1635805737707-575885ab0820?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" alt="Spider-Man" style="width: 100%; border-radius: 8px; object-fit: cover;">
        </div>
        
        <div>
            <div style="margin-bottom: 25px;">
                <h2 style="font-size: 24px; margin-bottom: 10px; color: var(--text);">Spider-Man: No Way Home</h2>
                <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
                    <span style="background: rgba(255, 193, 7, 0.2); color: #ffc107; padding: 4px 10px; border-radius: 20px; font-size: 13px; font-weight: 600;">PG-13</span>
                    <span style="color: var(--text-secondary);"><i class="fas fa-clock" style="margin-right: 5px;"></i> 148 minutes</span>
                    <span style="color: var(--text-secondary);"><i class="fas fa-film" style="margin-right: 5px;"></i> Action</span>
                </div>
                <p style="color: var(--text-secondary); line-height: 1.6;">With Spider-Man's identity now revealed, Peter asks Doctor Strange for help. When a spell goes wrong, dangerous foes from other worlds start to appear, forcing Peter to discover what it truly means to be Spider-Man.</p>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px;">
                <div>
                    <h3 style="font-size: 14px; color: var(--text-secondary); margin-bottom: 8px;">Release Date</h3>
                    <p style="color: var(--text); font-weight: 500;">December 17, 2021</p>
                </div>
                
                <div>
                    <h3 style="font-size: 14px; color: var(--text-secondary); margin-bottom: 8px;">Director</h3>
                    <p style="color: var(--text); font-weight: 500;">Jon Watts</p>
                </div>
                
                <div>
                    <h3 style="font-size: 14px; color: var(--text-secondary); margin-bottom: 8px;">Cast</h3>
                    <p style="color: var(--text); font-weight: 500;">Tom Holland, Zendaya, Benedict Cumberbatch, Jacob Batalon</p>
                </div>
                
                <div>
                    <h3 style="font-size: 14px; color: var(--text-secondary); margin-bottom: 8px;">Status</h3>
                    <span style="background: rgba(76, 175, 80, 0.2); color: #4caf50; padding: 4px 10px; border-radius: 20px; font-size: 13px; font-weight: 600;">Now Showing</span>
                </div>
            </div>
            
            <div style="margin-top: 25px;">
                <h3 style="font-size: 14px; color: var(--text-secondary); margin-bottom: 8px;">Trailer</h3>
                <a href="https://www.youtube.com/watch?v=JfVOs4VSpmA" target="_blank" style="display: inline-flex; align-items: center; gap: 8px; color: var(--accent); text-decoration: none;">
                    <i class="fab fa-youtube" style="font-size: 20px;"></i>
                    <span>Watch Trailer</span>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="dashboard-section" style="margin-top: 30px;">
    <div class="section-header">
        <h2 class="section-title">Screening Schedule</h2>
    </div>
    
    <div style="background: var(--secondary); border-radius: 8px; padding: 20px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 style="font-size: 16px; color: var(--text);">Today, October 15, 2023</h3>
            <div style="display: flex; gap: 10px;">
                <button style="background: rgba(255, 255, 255, 0.1); border: none; padding: 8px 15px; border-radius: 6px; color: var(--text); cursor: pointer;">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button style="background: rgba(255, 255, 255, 0.1); border: none; padding: 8px 15px; border-radius: 6px; color: var(--text); cursor: pointer;">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 15px;">
            <div style="background: var(--card-bg); border-radius: 8px; padding: 15px;">
                <div style="font-size: 14px; color: var(--text-secondary); margin-bottom: 10px;">Screen 1</div>
                <div style="display: flex; flex-wrap: wrap; gap: 10px;">
                    <span style="background: var(--accent); color: white; padding: 6px 12px; border-radius: 20px; font-size: 13px;">10:00 AM</span>
                    <span style="background: var(--accent); color: white; padding: 6px 12px; border-radius: 20px; font-size: 13px;">1:30 PM</span>
                    <span style="background: var(--accent); color: white; padding: 6px 12px; border-radius: 20px; font-size: 13px;">5:00 PM</span>
                    <span style="background: var(--accent); color: white; padding: 6px 12px; border-radius: 20px; font-size: 13px;">8:30 PM</span>
                </div>
            </div>
            
            <div style="background: var(--card-bg); border-radius: 8px; padding: 15px;">
                <div style="font-size: 14px; color: var(--text-secondary); margin-bottom: 10px;">Screen 3</div>
                <div style="display: flex; flex-wrap: wrap; gap: 10px;">
                    <span style="background: var(--accent); color: white; padding: 6px 12px; border-radius: 20px; font-size: 13px;">11:00 AM</span>
                    <span style="background: var(--accent); color: white; padding: 6px 12px; border-radius: 20px; font-size: 13px;">2:30 PM</span>
                    <span style="background: var(--accent); color: white; padding: 6px 12px; border-radius: 20px; font-size: 13px;">6:00 PM</span>
                    <span style="background: var(--accent); color: white; padding: 6px 12px; border-radius: 20px; font-size: 13px;">9:30 PM</span>
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