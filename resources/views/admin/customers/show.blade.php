@extends('admin.layouts.app')

@section('title', 'Customer Details - Movie Booking System')

@section('page-title', 'Customer Details')

@section('header-actions')
<a href="{{ route('admin.customers.index') }}" class="btn-secondary">
    <i class="fas fa-arrow-left"></i> Back to Customers
</a>
@endsection


@section('content')
<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">Customer Information</h2>
        <div class="header-actions">
            <a href="{{ route('admin.customers.edit', $customer->id) }}" class="btn-primary">
                <i class="fas fa-edit"></i> Edit Customer
            </a>
        </div>
    </div>

    <div class="customer-details" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Full Name</label>
            <p style="font-size: 16px; margin-top: 5px;">{{ $customer->name }}</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Email Address</label>
            <p style="font-size: 16px; margin-top: 5px;">{{ $customer->email }}</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Phone Number</label>
            <p style="font-size: 16px; margin-top: 5px;">{{ $customer->phone }}</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Join Date</label>
            <p style="font-size: 16px; margin-top: 5px;">{{ $customer->created_at->format('Y-m-d') }}</p>
        </div>

    </div>
</div>

<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">Customer Actions</h2>
    </div>

    <div style="display: flex; gap: 15px;">
        <a href="{{ route('admin.customers.edit', $customer->id) }}" class="btn-primary">
            <i class="fas fa-edit"></i> Edit Customer
        </a>
        <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="POST" onsubmit="return confirmDelete()">
            @csrf
            @method('DELETE')
            <button class="btn-danger">
                <i class="fas fa-trash"></i> Delete Customer
            </button>
        </form>
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
        return confirm('Are you sure you want to delete this customer?');
    }
</script>
@endpush