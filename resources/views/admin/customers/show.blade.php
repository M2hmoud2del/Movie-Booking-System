@extends('admin.layouts.app')

@section('title', 'Customer Details - Movie Booking System')

@section('header')
<div class="header">
    <h1 class="page-title">Customer Details</h1>
    <div class="header-actions">
        <a href="{{ route('admin.customers.index') }}" class="btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Customers
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
        <h2 class="section-title">Customer Information</h2>
        <div class="header-actions">
            <a href="{{ route('admin.customers.edit', 1) }}" class="btn-primary">
                <i class="fas fa-edit"></i> Edit Customer
            </a>
        </div>
    </div>

    <div class="customer-details" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Full Name</label>
            <p style="font-size: 16px; margin-top: 5px;">John Doe</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Email Address</label>
            <p style="font-size: 16px; margin-top: 5px;">john.doe@example.com</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Phone Number</label>
            <p style="font-size: 16px; margin-top: 5px;">(555) 123-4567</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Member Since</label>
            <p style="font-size: 16px; margin-top: 5px;">January 15, 2023</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Total Bookings</label>
            <p style="font-size: 16px; margin-top: 5px;">24</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Last Booking</label>
            <p style="font-size: 16px; margin-top: 5px;">June 15, 2023</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Address</label>
            <p style="font-size: 16px; margin-top: 5px;">123 Main Street, New York, NY 10001</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Date of Birth</label>
            <p style="font-size: 16px; margin-top: 5px;">May 15, 1990</p>
        </div>
    </div>
</div>

<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">Recent Bookings</h2>
        <a href="#" class="view-all">View All Bookings</a>
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Movie</th>
                <th>Date & Time</th>
                <th>Seats</th>
                <th>Total Amount</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>#BK001</td>
                <td>Spider-Man: No Way Home</td>
                <td>2023-06-15 19:30</td>
                <td>E12, E13</td>
                <td>$25.00</td>
                <td>Completed</td>
            </tr>
            <tr>
                <td>#BK002</td>
                <td>The Batman</td>
                <td>2023-06-10 20:00</td>
                <td>F5, F6</td>
                <td>$28.00</td>
                <td>Completed</td>
            </tr>
            <tr>
                <td>#BK003</td>
                <td>Black Panther: Wakanda Forever</td>
                <td>2023-06-05 18:00</td>
                <td>G8, G9</td>
                <td>$26.00</td>
                <td>Completed</td>
            </tr>
        </tbody>
    </table>
</div>

<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">Customer Actions</h2>
    </div>

    <div style="display: flex; gap: 15px;">
        <a href="{{ route('admin.customers.edit', 1) }}" class="btn-primary">
            <i class="fas fa-edit"></i> Edit Customer
        </a>

        <button class="btn-danger" onclick="confirmDelete()">
            <i class="fas fa-trash"></i> Delete Customer
        </button>

        <button class="btn-secondary">
            <i class="fas fa-envelope"></i> Send Message
        </button>

        <button class="btn-secondary">
            <i class="fas fa-ticket-alt"></i> View All Bookings
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
        if (confirm('Are you sure you want to delete this customer? This action cannot be undone.')) {
            // Here you would typically submit a form or make an AJAX request to delete the customer
            alert('Customer deletion process would be triggered here.');
        }
    }
</script>
@endpush