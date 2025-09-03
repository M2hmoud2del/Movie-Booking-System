@extends('admin.layouts.app')
@section('title', 'Edit Booking - Movie Booking System')
@section('page-title', 'Edit Booking')
@section('header-actions')
<a href="{{ route('admin.bookings.index') }}" class="btn-secondary">
    <i class="fas fa-arrow-left"></i> Back to Bookings
</a>
@endsection

@section('content')
<div class="dashboard-section" style="margin-bottom: 20px; background: #121A2C;">
    <div class="section-header">
        <h2 class="section-title">Edit Booking Information</h2>
    </div>
    <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="user_id">Customer</label>
            <select name="user_id" id="user_id" class="form-control">
                @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $booking->user_id == $user->id ? 'selected' : '' }}>
                    {{ $user->name }} ({{ $user->email }})
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="movie_id">Movie</label>
            <select name="movie_id" id="movie_id" class="form-control">
                @foreach($movies as $movie)
                <option value="{{ $movie->id }}" {{ $booking->showtime->movie->id == $movie->id ? 'selected' : '' }}>
                    {{ $movie->name }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="showtime_id">Showtime</label>
            <select name="showtime_id" id="showtime_id" class="form-control">
                @foreach($showtimes as $showtime)
                <option value="{{ $showtime->id }}" {{ $booking->showtime_id == $showtime->id ? 'selected' : '' }}>
                    {{ \Carbon\Carbon::parse($showtime->start_time)->format('F d, Y \a\t h:i A') }} - {{ $showtime->screen->screen_name }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="seats">Seats</label>
            <input type="text" name="seats" id="seats" class="form-control" value="{{ implode(', ', $booking->bookedSeats->map(function($seat) { return $seat->seat->seat_row . $seat->seat->seat_number; })->toArray()) }}" placeholder="E.g., A1, A2">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="Confirmed" {{ $booking->status == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="Pending" {{ $booking->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Cancelled" {{ $booking->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>
        <div class="form-group">
            <label for="amount">Total Amount</label>
            <input type="number" name="amount" id="amount" class="form-control" value="{{ number_format($booking->amount, 2) }}" step="0.01">
        </div>
        <button type="submit" class="btn-primary"><i class="fas fa-save"></i> Save Changes</button>
    </form>
</div>
@endsection

@push('styles')
<style>
    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: var(--text-secondary);
        font-weight: 500;

    }

    .form-control {
        width: 100%;
        padding: 12px;
        border-radius: 6px;
        border: 1px solid #333;
        background: #151c2d;
        color: var(--text);
        font-size: 16px;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--accent);
    }

    .dashboard-section {
        background: #1a1a1a;
        border-radius: 10px;
        padding: 30px;
    }

    .btn-primary {
        background: var(--accent);
        color: white;
        border: none;
        padding: 12px 25px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: background-color 0.3s ease;
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
</style>
@endpush