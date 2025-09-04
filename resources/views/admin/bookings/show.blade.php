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
            <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="btn-primary">
                <i class="fas fa-edit"></i> Edit Booking
            </a>
        </div>
    </div>
    <div class="booking-details">
        <div class="detail-group">
            <label>Booking ID</label>
            <p>#BK{{ $booking->id }}</p>
        </div>
        <div class="detail-group">
            <label>Customer</label>
            <p> {{ $booking->user->name }} ({{ $booking->user->email }}) </p>
        </div>
        <div class="detail-group">
            <label>Movie</label>
            <p>{{ $booking->showtime->movie->name }}</p>
        </div>
        <div class="detail-group">
            <label>Screen</label>
            <p>{{ $booking->showtime->screen->screen_name }}</p>
        </div>
        <div class="detail-group">
            <label>Date & Time</label>
            <p> {{ \Carbon\Carbon::parse($booking->showtime->start_time)->format('F d, Y \a\t h:i A') }} </p>
        </div>
        <div class="detail-group">
            <label>Seats</label>
            <p> @foreach($booking->bookedSeats as $seat) {{ $seat->seat->seat_row }}{{ $seat->seat->seat_number }}@if(!$loop->last), @endif @endforeach </p>
        </div>
        <div class="detail-group">
            <label>Total Amount</label>
            <p>${{ number_format($booking->amount, 2) }}</p>
        </div>
        <div class="detail-group">
            <label>Payment Status</label>
            <p style="color: #2ecc71 ;"> {{ $booking->status }} </p>
        </div>
        <div class="detail-group">
            <label>Booking Date</label>
            <p> {{ $booking->created_at->format('F d, Y \a\t h:i A') }} </p>
        </div>
    </div>
</div>
<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">Payment Information</h2>
    </div>
    <div class="payment-details">
        <div class="detail-group">
            <label>Payment Method</label>
            <p>{{ $booking->payment_method }}</p>
        </div>
        <div class="detail-group">
            <label>Transaction ID</label>
            <p>TXN-{{ $booking->id }}{{ $booking->user_id }}</p>
        </div>
        <div class="detail-group">
            <label>Payment Date</label>
            <p> {{ $booking->created_at->format('F d, Y \a\t h:i A') }} </p>
        </div>
        <div class="detail-group">
            <label>Card Last Digits</label>
            <p>**** **** **** 1234</p>
        </div>
    </div>
</div>
<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">Booking Actions</h2>
    </div>
    <div style="display: flex; gap: 15px;">
        <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="btn-primary">
            <i class="fas fa-edit"></i> Edit Booking
        </a>
        <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-danger">
                <i class="fas fa-trash"></i> Delete Booking
            </button>
        </form>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* New styles for this page only */
    .dashboard-section {
        background: #121A2C;
        border-radius: 10px;
        padding: 30px;
        margin-bottom: 20px;
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .section-title {
        color: #fff;
        font-size: 24px;
        font-weight: 700;
    }

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
        background: var(--accent);
        color: white;
        border: none;
    }

    .btn-primary:hover {
        background: #c40811;
    }

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

    .btn-primary,
    .btn-danger {
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

    .btn-primary:hover,
    .btn-danger:hover {
        background: #c40811;
    }

    .booking-details,
    .payment-details {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .detail-group {
        display: flex;
        flex-direction: column;
    }

    .detail-group label {
        color: var(--text-secondary);
        font-size: 14px;
    }

    .detail-group p {
        font-size: 16px;
        margin-top: 5px;
        color: var(--text);
    }
</style>
@endpush