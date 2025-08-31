@extends('admin.layouts.app')

@section('title', 'Create New Booking - Movie Booking System')

@section('header')
<div class="header">
    <h1 class="page-title">Create New Booking</h1>
    <div class="header-actions">
        <a href="{{ route('admin.bookings.index') }}" class="btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Bookings
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
        <h2 class="section-title">Booking Information</h2>
    </div>
    
    <form>
        <div class="form-row" style="display: flex; gap: 20px; margin-bottom: 20px;">
            <div class="form-group" style="flex: 1;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Customer *</label>
                <select style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
                    <option value="">Select a customer</option>
                    <option value="1">John Doe (john.doe@example.com)</option>
                    <option value="2">Jane Smith (jane.smith@example.com)</option>
                    <option value="3">Robert Johnson (robert.j@example.com)</option>
                    <option value="4">Sarah Williams (sarah.w@example.com)</option>
                </select>
            </div>
            
            <div class="form-group" style="flex: 1;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Movie *</label>
                <select style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
                    <option value="">Select a movie</option>
                    <option value="1">Spider-Man: No Way Home</option>
                    <option value="2">The Batman</option>
                    <option value="3">Black Panther: Wakanda Forever</option>
                    <option value="4">Top Gun: Maverick</option>
                </select>
            </div>
        </div>
        
        <div class="form-row" style="display: flex; gap: 20px; margin-bottom: 20px;">
            <div class="form-group" style="flex: 1;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Screening Date *</label>
                <input type="date" style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
            </div>
            
            <div class="form-group" style="flex: 1;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Screening Time *</label>
                <input type="time" style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
            </div>
        </div>
        
        <div class="form-group" style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Number of Tickets *</label>
            <input type="number" min="1" max="10" value="2" style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
        </div>
        
        <div class="form-group" style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Seat Selection</label>
            <div style="background: var(--secondary); border-radius: 8px; padding: 20px;">
                <div style="text-align: center; margin-bottom: 20px;">
                    <div style="background: #555; color: white; padding: 5px; border-radius: 4px; display: inline-block; margin-bottom: 15px;">
                        SCREEN
                    </div>
                </div>
                
                <div style="display: grid; grid-template-columns: repeat(10, 1fr); gap: 10px; margin-bottom: 20px;">
                    <!-- This would be dynamically generated in a real application -->
                    <div style="text-align: center;">
                        <div style="font-size: 12px; margin-bottom: 5px; color: var(--text-secondary);">A</div>
                        <div class="seat available" style="width: 30px; height: 30px; background: #2ecc71; border-radius: 5px; margin: 0 auto; cursor: pointer;"></div>
                        <div class="seat available" style="width: 30px; height: 30px; background: #2ecc71; border-radius: 5px; margin: 5px auto; cursor: pointer;"></div>
                    </div>
                    <!-- More seats would be here -->
                </div>
                
                <div style="display: flex; gap: 20px; justify-content: center;">
                    <div style="display: flex; align-items: center; gap: 5px;">
                        <div style="width: 15px; height: 15px; background: #2ecc71; border-radius: 3px;"></div>
                        <span style="font-size: 12px;">Available</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 5px;">
                        <div style="width: 15px; height: 15px; background: #e74c3c; border-radius: 3px;"></div>
                        <span style="font-size: 12px;">Occupied</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 5px;">
                        <div style="width: 15px; height: 15px; background: #f39c12; border-radius: 3px;"></div>
                        <span style="font-size: 12px;">Selected</span>
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
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Payment Method *</label>
                <select style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
                    <option value="credit_card">Credit Card</option>
                    <option value="debit_card">Debit Card</option>
                    <option value="paypal">PayPal</option>
                    <option value="cash">Cash</option>
                </select>
            </div>
        </div>
        
        <div class="form-actions" style="display: flex; gap: 15px; margin-top: 30px;">
            <button type="submit" class="btn-primary">
                <i class="fas fa-ticket-alt"></i> Create Booking
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