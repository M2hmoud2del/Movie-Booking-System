@extends('admin.layouts.app')

@section('title', 'Payments Management - Movie Booking System')
@section('page-title', 'Payments Management')

@section('content')

<!-- Payment Summary Cards -->
<div class="stats-container">
    <div class="stat-card">
        <div class="stat-icon" style="background: rgba(46, 204, 113, 0.2); color: #2ecc71;">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="stat-text">
            <h3>${{ number_format($totalRevenue, 2) }}</h3>
            <p>Total Revenue</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon" style="background: rgba(52, 152, 219, 0.2); color: #3498db;">
            <i class="fas fa-credit-card"></i>
        </div>
        <div class="stat-text">
            <h3>{{ $successfulPayments }}</h3>
            <p>Successful Payments</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon" style="background: rgba(231, 76, 60, 0.2); color: #e74c3c;">
            <i class="fas fa-times-circle"></i>
        </div>
        <div class="stat-text">
            <h3>{{ $failedPayments }}</h3>
            <p>Failed Payments</p>
        </div>
    </div>
</div>

<!-- Payments Table -->
<div class="dashboard-section">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="section-header">
        <h2 class="section-title">All Payments</h2>
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Customer</th>
                <th>Amount</th>
                <th>Payment Method</th>
                <th>Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($payments as $payment)
            <tr>
                <td>#BK{{ str_pad($payment->id, 3, '0', STR_PAD_LEFT) }}</td>
                <td>{{ $payment->user->name ?? 'Unknown' }}</td>
                <td>${{ number_format($payment->amount, 2) }}</td>
                <td>{{ $payment->payment_method }}</td>
                <td>{{ $payment->created_at->format('Y-m-d H:i') }}</td>
                <td>
                    @php $status = strtolower($payment->status); @endphp
                    @if($status === 'completed')
                    <span class="status active">Completed</span>
                    @elseif($status === 'failed')
                    <span class="status inactive">Failed</span>
                    @else
                    <span class="status pending">Pending</span>
                    @endif
                </td>
                <td>
                    @if($status === 'pending')
                    <form action="{{ route('admin.payments.updateStatus', $payment->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="completed">
                        <button type="submit" class="btn btn-success btn-sm">Accept</button>
                    </form>

                    <form action="{{ route('admin.payments.updateStatus', $payment->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="failed">
                        <button type="submit" class="btn btn-danger btn-sm">Deny</button>
                    </form>
                    @else
                    <span style="color: #888;">No actions</span>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7">No payments found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>


    <!-- Pagination -->
    <div style="margin-top: 20px;">
        {{ $payments->links('vendor.pagination.custom') }}
    </div>
</div>
@endsection