@extends('admin.layouts.app')

@section('title', 'Create New Booking')

@section('page-title', 'Create New Booking')

@section('content')

<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">New Booking Details</h2>
        <a href="{{ route('admin.bookings.index') }}" class="btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Bookings
        </a>
    </div>

    <form action="{{ route('admin.bookings.store') }}" method="POST">
        @csrf

        <!-- User Select -->
        <div class="mb-3">
            <label for="user_id" class="form-label">User</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="">Select User</option>
                @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
        </div>

        <!-- Movie Select -->
        <div class="mb-3">
            <label for="showtime_id" class="form-label">Showtime</label>
            <select name="showtime_id" id="showtime_id" class="form-control" required>
                <option value="">Select Movie & Showtime</option>
                @foreach($showtimes as $showtime)
                <option value="{{ $showtime->id }}">
                    {{ $showtime->movie->name ?? 'N/A' }} - {{ $showtime->date }} {{ \Carbon\Carbon::parse($showtime->start_time)->format('h:i A') }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Amount -->
        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" step="0.01" name="amount" id="amount" class="form-control" required>
        </div>

        <!-- Status -->
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="pending">pending</option>
                <option value="Completed">Completed</option>
            </select>
        </div>

        <!-- Payment Method -->
        <div class="mb-3">
            <label for="payment_method" class="form-label">Payment Method</label>
            <select name="payment_method" id="payment_method" class="form-control" required>
                <option value="Cash">Cash</option>
                <option value="Card">Card</option>
                <option value="Online">Online</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Booking</button>
    </form>
</div>
@endsection

@push('styles')
<style>
    .filters {
        display: flex;
        gap: 15px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }

    .filter-select {
        background: var(--secondary);
        color: var(--text);
        border: 1px solid rgba(255, 255, 255, 0.1);
        padding: 10px 15px;
        border-radius: 6px;
        outline: none;
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
        background: var(--border-color);
        color: var(--text);
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

    .btn-secondary:hover {
        background: #444;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #9ca3af;
        /* Lighter text for the label */
        font-weight: 500;
        font-size: 14px;
    }

    .form-control {
        width: 100%;
        padding: 12px 15px;
        background-color: #1a202c;
        /* A slightly darker color for the input field */
        border: 1px solid #4a5568;
        /* A subtle border color */
        border-radius: 6px;
        color: var(--text);
        font-size: 16px;
        transition: border-color 0.3s ease;
    }

    .form-control:focus {
        border-color: #4c51bf;
        /* A light blue border on focus */
        outline: none;
    }

    .form-control::placeholder {
        color: #6b7280;
        /* A slightly darker placeholder color */
    }

    .form-control option {
        background-color: #1a202c;
        color: var(--text);
    }
</style>
@endpush