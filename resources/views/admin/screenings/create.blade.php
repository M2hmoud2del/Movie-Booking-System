@extends('admin.layouts.app')

@section('title', 'Create New Screening - Movie Booking System')

@section('page-title', 'Create New Screening')

@section('header-actions')
<a href="{{ route('admin.screenings.index') }}" class="btn-secondary">
    <i class="fas fa-arrow-left"></i> Back to Screenings
</a>
@endsection


@section('content')
<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">Screening Details</h2>
    </div>
    
    <form>
        <div class="form-row" style="display: flex; gap: 20px; margin-bottom: 20px;">
            <div class="form-group" style="flex: 1;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Movie *</label>
                <select style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
                    <option value="">Select a movie</option>
                    <option value="1">Spider-Man: No Way Home</option>
                    <option value="2">The Batman</option>
                    <option value="3">Black Panther: Wakanda Forever</option>
                    <option value="4">Top Gun: Maverick</option>
                    <option value="5">Avatar: The Way of Water</option>
                </select>
            </div>
            
            <div class="form-group" style="flex: 1;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Screen *</label>
                <select style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
                    <option value="">Select a screen</option>
                    <option value="1">Screen 1 (150 seats)</option>
                    <option value="2">Screen 2 (120 seats)</option>
                    <option value="3">Screen 3 (120 seats)</option>
                    <option value="4">Screen 4 (100 seats)</option>
                </select>
            </div>
        </div>
        
        <div class="form-row" style="display: flex; gap: 20px; margin-bottom: 20px;">
            <div class="form-group" style="flex: 1;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Screening Date *</label>
                <input type="date" style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
            </div>
            
            <div class="form-group" style="flex: 1;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Ticket Price ($) *</label>
                <input type="number" step="0.01" min="0" value="12.50" style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
            </div>
        </div>
        
        <div class="form-group" style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Showtimes *</label>
            <div class="showtimes-container">
                <div class="showtime-input" style="display: flex; gap: 10px; margin-bottom: 10px;">
                    <input type="time" style="flex: 1; padding: 12px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
                    <button type="button" class="btn-remove" style="background: var(--accent); color: white; border: none; border-radius: 6px; width: 40px; cursor: pointer;">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <button type="button" id="add-showtime" class="btn-secondary" style="margin-top: 10px;">
                <i class="fas fa-plus"></i> Add Another Showtime
            </button>
        </div>
        
        <div class="form-actions" style="display: flex; gap: 15px; margin-top: 30px;">
            <button type="submit" class="btn-primary">
                <i class="fas fa-save"></i> Create Screening
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

@push('scripts')
<script>
    document.getElementById('add-showtime').addEventListener('click', function() {
        const container = document.querySelector('.showtimes-container');
        const newInput = document.createElement('div');
        newInput.className = 'showtime-input';
        newInput.innerHTML = `
            <div style="display: flex; gap: 10px; margin-bottom: 10px;">
                <input type="time" style="flex: 1; padding: 12px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
                <button type="button" class="btn-remove" style="background: var(--accent); color: white; border: none; border-radius: 6px; width: 40px; cursor: pointer;">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `;
        container.appendChild(newInput);
        
        // Add event listener to remove button
        newInput.querySelector('.btn-remove').addEventListener('click', function() {
            if (document.querySelectorAll('.showtime-input').length > 1) {
                newInput.remove();
            }
        });
    });
    
    // Add event listeners to existing remove buttons
    document.querySelectorAll('.btn-remove').forEach(btn => {
        btn.addEventListener('click', function() {
            if (document.querySelectorAll('.showtime-input').length > 1) {
                this.closest('.showtime-input').remove();
            }
        });
    });
</script>
@endpush