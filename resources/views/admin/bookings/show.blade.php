@extends('admin.layouts.app')

@section('title', 'Booking Details - Movie Booking System')

@section('page-title', 'Booking Details')

@section('header-actions')
<a href="{{ route('admin.bookings.index') }}" class="btn-secondary">
    <i class="fas fa-arrow-left"></i> Back to Bookings
</a>
@endsection


@section('content')
<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">Booking Information</h2>
        <div class="header-actions">
            <a href="{{ route('admin.bookings.edit', 1) }}" class="btn-primary">
                <i class="fas fa-edit"></i> Edit Booking
            </a>
        </div>
    </div>

    <div class="booking-details" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Booking ID</label>
            <p style="font-size: 16px; margin-top: 5px;">#BK001</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Customer</label>
            <p style="font-size: 16px; margin-top: 5px;">John Doe (john.doe@example.com)</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Movie</label>
            <p style="font-size: 16px; margin-top: 5px;">Spider-Man: No Way Home</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Screen</label>
            <p style="font-size: 16px; margin-top: 5px;">Screen 3</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Date & Time</label>
            <p style="font-size: 16px; margin-top: 5px;">June 15, 2023 at 7:30 PM</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Seats</label>
            <p style="font-size: 16px; margin-top: 5px;">E12, E13</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Total Amount</label>
            <p style="font-size: 16px; margin-top: 5px;">$25.00</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Payment Status</label>
            <p style="font-size: 16px; margin-top: 5px; color: #2ecc71;">Paid</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Booking Date</label>
            <p style="font-size: 16px; margin-top: 5px;">June 14, 2023 at 2:30 PM</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Booking Status</label>
            <p style="font-size: 16px; margin-top: 5px;">Confirmed</p>
        </div>
    </div>
</div>

<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">Payment Information</h2>
    </div>

    <div class="payment-details" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Payment Method</label>
            <p style="font-size: 16px; margin-top: 5px;">Credit Card</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Transaction ID</label>
            <p style="font-size: 16px; margin-top: 5px;">TXN-123456789</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Payment Date</label>
            <p style="font-size: 16px; margin-top: 5px;">June 14, 2023 at 2:35 PM</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Card Last Digits</label>
            <p style="font-size: 16px; margin-top: 5px;">**** **** **** 1234</p>
        </div>
    </div>
</div>

<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">Booking Actions</h2>
    </div>

    <div style="display: flex; gap: 15px;">
        <a href="{{ route('admin.bookings.edit', 1) }}" class="btn-primary">
            <i class="fas fa-edit"></i> Edit Booking
        </a>

        <button class="btn-danger" onclick="confirmDelete()">
            <i class="fas fa-trash"></i> Delete Booking
        </button>

        <button class="btn-secondary">
            <i class="fas fa-print"></i> Print Ticket
        </button>

        <button class="btn-secondary">
            <i class="fas fa-envelope"></i> Resend Confirmation
        </button>
    </div>
</div>
@endsection

@push('styles')
<style>
    .btn {
        padding: 10px 20px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
    }

    .btn-primary {
        padding: 10px 20px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--accent);
        color: white;
        border: none;
    }

    .btn-primary:hover {
        background: #c40811;
    }

    .btn-secondary {
        padding: 10px 20px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(255, 255, 255, 0.1);
        color: var(--text);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .btn-secondary:hover {
        background: rgba(255, 255, 255, 0.2);
    }

    .btn-danger {
        background: rgba(231, 76, 60, 0.8);
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

    .btn-danger:hover {
        background: rgba(231, 76, 60, 1);
    }
</style>
@endpush

@push('scripts')
<script>
    function confirmDelete() {
        if (confirm('Are you sure you want to delete this booking? This action cannot be undone.')) {
            // Here you would typically submit a form or make an AJAX request to delete the booking
            alert('Booking deletion process would be triggered here.');
        }
    }
</script>
@endpush