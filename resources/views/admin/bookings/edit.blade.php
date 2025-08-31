@extends('admin.layouts.app')

@section('title', 'Edit Booking - Movie Booking System')

@section('page-title', 'Edit Booking')

@section('header-actions')
<a href="{{ route('admin.bookings.index') }}" class="btn-secondary">
    <i class="fas fa-arrow-left"></i> Back to Bookings
</a>
@endsection


@section('content')
<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">Edit Booking Information</h2>
    </div>
    
    <form>
        <div class="form-row" style="display: flex; gap: 20px; margin-bottom: 20px;">
            <div class="form-group" style="flex: 1;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Customer *</label>
                <select style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
                    <option value="1" selected>John Doe (john.doe@example.com)</option>
                    <option value="2">Jane Smith (jane.smith@example.com)</option>
                    <option value="3">Robert Johnson (robert.j@example.com)</option>
                    <option value="4">Sarah Williams (sarah.w@example.com)</option>
                </select>
            </div>
            
            <div class="form-group" style="flex: 1;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Movie *</label>
                <select style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
                    <option value="1" selected>Spider-Man: No Way Home</option>
                    <option value="2">The Batman</option>
                    <option value="3">Black Panther: Wakanda Forever</option>
                    <option value="4">Top Gun: Maverick</option>
                </select>
            </div>
        </div>
        
        <div class="form-row" style="display: flex; gap: 20px; margin-bottom: 20px;">
            <div class="form-group" style="flex: 1;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Screening Date *</label>
                <input type="date" value="2023-06-15" style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
            </div>
            
            <div class="form-group" style="flex: 1;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Screening Time *</label>
                <input type="time" value="19:30" style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
            </div>
        </div>
        
        <div class="form-group" style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Number of Tickets *</label>
            <input type="number" min="1" max="10" value="2" style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
        </div>
        
        <div class="form-group" style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Selected Seats</label>
            <div style="background: var(--secondary); border-radius: 8px; padding: 15px;">
                <div style="display: flex; flex-wrap: wrap; gap: 10px;">
                    <div style="background: rgba(243, 156, 18, 0.2); color: #f39c12; padding: 8px 12px; border-radius: 4px; display: flex; align-items: center; gap: 5px;">
                        <span>E12</span>
                        <button type="button" style="background: none; border: none; color: #f39c12; cursor: pointer;">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div style="background: rgba(243, 156, 18, 0.2); color: #f39c12; padding: 8px 12px; border-radius: 4px; display: flex; align-items: center; gap: 5px;">
                        <span>E13</span>
                        <button type="button" style="background: none; border: none; color: #f39c12; cursor: pointer;">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="form-row" style="display: flex; gap: 20px; margin-bottom: 20px;">
            <div class="form-group" style="flex: 1;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Total Amount</label>
                <div style="padding: 12px; border-radius: 6px; background: rgba(46, 204, 113, 0.1); color: #2ecc71; font-weight: 600;">
                    $25.00
                </div>
            </div>
            
            <div class="form-group" style="flex: 1;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Payment Status *</label>
                <select style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
                    <option value="paid" selected>Paid</option>
                    <option value="pending">Pending</option>
                    <option value="failed">Failed</option>
                    <option value="refunded">Refunded</option>
                </select>
            </div>
        </div>
        
        <div class="form-actions" style="display: flex; gap: 15px; margin-top: 30px;">
            <button type="submit" class="btn-primary">
                <i class="fas fa-save"></i> Update Booking
            </button>
            <a href="{{ route('admin.bookings.index') }}" class="btn-secondary">
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