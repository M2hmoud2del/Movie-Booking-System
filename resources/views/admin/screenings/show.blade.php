@extends('admin.layouts.app')

@section('title', 'Screening Details - Movie Booking System')

@section('page-title', 'Screening Details')

@section('header-actions')
<a href="{{ route('admin.screenings.index') }}" class="btn-secondary">
    <i class="fas fa-arrow-left"></i> Back to Screenings
</a>
@endsection

@section('content')
<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">Screening Information</h2>
        <div class="header-actions">
            <a href="{{ route('admin.screenings.edit', 1) }}" class="btn-primary">
                <i class="fas fa-edit"></i> Edit Screening
            </a>
        </div>
    </div>

    <div class="screening-details" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Movie</label>
            <p style="font-size: 16px; margin-top: 5px;">Spider-Man: No Way Home</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Screen</label>
            <p style="font-size: 16px; margin-top: 5px;">Screen 3 (120 seats)</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Screening Date</label>
            <p style="font-size: 16px; margin-top: 5px;">June 15, 2023</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Showtimes</label>
            <p style="font-size: 16px; margin-top: 5px;">7:30 PM, 10:00 PM</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Ticket Price</label>
            <p style="font-size: 16px; margin-top: 5px;">$12.50</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Available Seats</label>
            <p style="font-size: 16px; margin-top: 5px;">45/120</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Booked Seats</label>
            <p style="font-size: 16px; margin-top: 5px;">75</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Occupancy Rate</label>
            <p style="font-size: 16px; margin-top: 5px;">62.5%</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Total Revenue</label>
            <p style="font-size: 16px; margin-top: 5px;">$937.50</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Created On</label>
            <p style="font-size: 16px; margin-top: 5px;">June 1, 2023</p>
        </div>
    </div>
</div>

<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">Recent Bookings for This Screening</h2>
        <a href="#" class="view-all">View All Bookings</a>
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Customer</th>
                <th>Showtime</th>
                <th>Seats</th>
                <th>Amount</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>#BK001</td>
                <td>John Doe</td>
                <td>7:30 PM</td>
                <td>E12, E13</td>
                <td>$25.00</td>
                <td>Confirmed</td>
            </tr>
            <tr>
                <td>#BK005</td>
                <td>Michael Brown</td>
                <td>7:30 PM</td>
                <td>F7, F8</td>
                <td>$25.00</td>
                <td>Confirmed</td>
            </tr>
            <tr>
                <td>#BK008</td>
                <td>Emily Davis</td>
                <td>10:00 PM</td>
                <td>G5, G6</td>
                <td>$25.00</td>
                <td>Confirmed</td>
            </tr>
            <tr>
                <td>#BK012</td>
                <td>David Wilson</td>
                <td>10:00 PM</td>
                <td>H9, H10</td>
                <td>$25.00</td>
                <td>Pending</td>
            </tr>
        </tbody>
    </table>
</div>

<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">Screening Actions</h2>
    </div>

    <div style="display: flex; gap: 15px;">
        <a href="{{ route('admin.screenings.edit', 1) }}" class="btn-primary">
            <i class="fas fa-edit"></i> Edit Screening
        </a>

        <button class="btn-danger" onclick="confirmDelete()">
            <i class="fas fa-trash"></i> Delete Screening
        </button>

        <button class="btn-secondary">
            <i class="fas fa-ticket-alt"></i> Create Booking
        </button>

        <button class="btn-secondary">
            <i class="fas fa-chart-bar"></i> View Analytics
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
        if (confirm('Are you sure you want to delete this screening? This action cannot be undone.')) {
            // Here you would typically submit a form or make an AJAX request to delete the screening
            alert('Screening deletion process would be triggered here.');
        }
    }
</script>
@endpush