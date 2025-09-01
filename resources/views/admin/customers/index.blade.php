@extends('admin.layouts.app')

@section('title', 'Customers Management - Movie Booking System')

@section('header')
<div class="header">
    <h1 class="page-title">Customers Management</h1>
    <div class="header-actions">
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
<!-- Filters & Search -->
<form method="GET" class="filters" style="gap:10px;">
    <input type="text" name="search" placeholder="Search customers..." value="{{ request('search') }}" class="filter-select">

    <select name="status" class="filter-select">
        <option value="">All Status</option>
        <option value="active" {{ request('status')=='active' ? 'selected' : '' }}>Active</option>
        <option value="inactive" {{ request('status')=='inactive' ? 'selected' : '' }}>Inactive</option>
    </select>

    <button type="submit" class="btn-primary"><i class="fas fa-search"></i> Search</button>

    <a href="{{ route('admin.customers.create') }}" class="btn-primary">
        <i class="fas fa-plus"></i> New Customer
    </a>
</form>

<!-- Customers Table -->
<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">All Customers</h2>
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th>Customer ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Join Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
            <tr>
                <td>#CUS{{ str_pad($customer->id, 3, '0', STR_PAD_LEFT) }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->created_at->format('Y-m-d') }}</td>
                <td>
                    <a href="{{ route('admin.customers.show', $customer->id) }}" class="action-btn"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('admin.customers.edit', $customer->id) }}" class="action-btn"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="action-btn" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div style="margin-top: 20px;">
        {{ $customers->withQueryString()->links() }}
    </div>
</div>
@endsection
@push('styles')
<style>
    /* Filters */
    .filters {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 20px;
        align-items: center;
    }

    .filter-select {
        padding: 8px 12px;
        border-radius: 6px;
        border: 1px solid #ccc;
        outline: none;
        background-color: #f3f4f6;
        color: #111827;
        font-size: 14px;
    }

    /* Buttons */
    .btn-primary {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 8px 14px;
        background-color: #ef4444;
        /* accent color */
        color: #fff;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s;
        text-decoration: none;
    }

    .btn-primary:hover {
        background-color: #c40811;
        text-decoration: none;
        color: #fff;
    }

    /* Action buttons in table */
    .action-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 6px 10px;
        border-radius: 6px;
        background-color: #3b82f6;
        /* blue for view */
        color: #fff;
        border: none;
        cursor: pointer;
        margin-right: 4px;
        transition: background 0.3s;
        font-size: 14px;
    }

    .action-btn:hover {
        opacity: 0.85;
    }

    /* Specific colors for edit/delete */
    .action-btn:nth-child(2) {
        background-color: #10b981;
    }

    /* edit: green */
    .action-btn:nth-child(3) {
        background-color: #ef4444;
    }

    /* delete: red */
</style>
@endpush