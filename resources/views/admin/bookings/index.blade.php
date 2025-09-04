@extends('admin.layouts.app')

@section('title', 'Bookings Management - Movie Booking System')

@section('page-title', 'Bookings Management')

@section('header-actions')
<div class="search-box">
    <i class="fas fa-search"></i>
    <input type="text" placeholder="Search bookings...">
</div>
<a href="{{ route('admin.bookings.create') }}" class="btn-primary">
    <i class="fas fa-plus"></i> New Booking
</a>
@endsection


@section('content')
<!-- Filters -->
<div class="filters">
    <select class="filter-select">
        <option>All Bookings</option>
        <option>Today</option>
        <option>This Week</option>
        <option>This Month</option>
    </select>

    <select class="filter-select">
        <option>All Status</option>
        <option>Confirmed</option>
        <option>Pending</option>
        <option>Cancelled</option>
    </select>

    <select class="filter-select">
        <option>All Movies</option>
        {{-- Loop through the movies array to populate the dropdown dynamically --}}
        @foreach($movies as $movie)
        <option>{{ $movie }}</option>
        @endforeach
    </select>
</div>

<!-- Bookings Table -->
<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">All Bookings</h2>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>User</th>
                <th>Movie</th>
                <th>Showtime</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Payment Method</th>
                <th>Booking Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($bookings as $booking)
            <tr>
                <td>{{ $booking->id }}</td>
                <td>{{ $booking->user->name ?? 'N/A' }}</td>
                <td>{{ $booking->showtime->movie->name ?? 'N/A' }}</td>
                <td>
                    {{ $booking->showtime->date ?? '' }} <br>
                    {{ $booking->showtime->start_time ? \Carbon\Carbon::parse($booking->showtime->start_time)->format('h:i A') : '' }}
                </td>
                <td>{{ number_format($booking->amount, 2) }}</td>
                <td>
                    <span style="color: #2ecc71;">
                        {{ $booking->status }}
                    </span>
                </td>
                <td>{{ $booking->payment_method ?? 'N/A' }}</td>
                <td>{{ $booking->created_at->format('F d, Y h:i A') }}</td>
                <td>
                    <div class="action-buttons">
                        <a href="{{ route('admin.bookings.show', $booking->id) }}" class="icon-btn view-btn">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="icon-btn edit-btn">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="icon-btn delete-btn"
                                onclick="return confirm('Are you sure you want to delete this booking?')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9" class="text-center">No bookings found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div style="margin-top: 20px;">
        {{ $bookings->links('vendor.pagination.custom') }}
    </div>
</div>
@endsection

@push('styles')
<style>
    :root {
        --background: #121A2C;

        --text: #e0e0e0;
        --text-secondary: #a0a0a0;
        --accent: #e50914;
        /* Netflix Red */
        --border-color: #333333;
    }

    body {
        background-color: var(--background);
        color: var(--text);
        font-family: 'Inter', sans-serif;
    }

    .filters {
        display: flex;
        gap: 15px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }

    .filter-select {
        background: var(--secondary);
        color: var(--text);
        border: 1px solid var(--border-color);
        padding: 10px 15px;
        border-radius: 6px;
        outline: none;
        appearance: none;
        /* Removes default dropdown arrow */
    }

    .filter-select:hover {
        border-color: #555;
    }

    .filter-select option {
        background: var(--secondary);
        color: var(--text);
    }

    .btn-primary {
        background: var(--accent);
        color: white;
        border: none;
        padding: 10px 20px;
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

    .search-box {
        display: flex;
        align-items: center;
        background: var(--secondary);
        border-radius: 6px;
        padding: 8px 15px;
        border: 1px solid var(--border-color);
    }

    .search-box i {
        color: var(--text-secondary);
        margin-right: 10px;
    }

    .search-box input {
        background: none;
        border: none;
        color: var(--text);
        outline: none;
        font-size: 15px;
    }

    .dashboard-section {
        background: var(--secondary);
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }

    .section-title {
        font-size: 24px;
        font-weight: 700;
        color: var(--text);
    }

    .view-all {
        color: var(--accent);
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .view-all:hover {
        color: #fff;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        color: var(--text);
    }

    .table thead th {
        text-align: left;
        padding: 15px;
        border-bottom: 2px solid var(--border-color);
        font-weight: 600;
        color: var(--text-secondary);
    }

    .table tbody td {
        padding: 15px;
        border-bottom: 1px solid var(--border-color);
        vertical-align: middle;
    }

    .table tbody tr:hover {
        background-color: #242424;
    }

    .btn-sm {
        padding: 8px 12px;
        font-size: 14px;
        border-radius: 4px;
        text-decoration: none;
        font-weight: 500;
    }

    .btn-info {
        background-color: #3498db;
        color: white;
        border: none;
    }

    .btn-danger {
        background-color: #e74c3c;
        color: white;
        border: none;
    }

    .action-buttons {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 5px;
        max-width: 100px;
    }

    .icon-btn {
        width: 40px;

        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #2b2b2b;

        color: #a0a0a0;

        border: 1px solid #444;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
        text-decoration: none;
    }

    .icon-btn:hover {
        background-color: #3e3e3e;
        color: #fff;
    }

    .icon-btn i {
        font-size: 16px;

    }


    .delete-btn {
        background-color: #3b2020;

        border-color: #6a3232;
        color: #e74c3c;
    }

    .delete-btn:hover {
        background-color: #e74c3c;
        color: white;
    }
</style>
@endpush