@extends('admin.layouts.app')

@section('title', 'Customers Management - Movie Booking System')

@section('page-title', 'Customers Management')

@section('header-actions')
<div class="search-box">
    <form method="GET" action="{{ route('admin.customers.index') }}" style="display: flex; align-items: center;">
        <i class="fas fa-search"></i>
        <input
            type="text"
            name="search"
            placeholder="Search customers..."
            value="{{ request('search') }}"
            style="border:none; background:transparent; outline:none; padding-left:8px; color:var(--text);">
    </form>
</div>

<a href="{{ route('admin.customers.create') }}" class="btn-primary">
    <i class="fas fa-plus"></i> New Customer
</a>
@endsection

@section('content')
<!-- Filters -->
<div class="filters">

    <form method="GET" action="{{ route('admin.customers.index') }}">
        <select name="sort" class="filter-select" onchange="this.form.submit()">
            <option value="">Sort By</option>
            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
            <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest</option>
            <option value="name-asc" {{ request('sort') == 'name-asc' ? 'selected' : '' }}>Name (A-Z)</option>
            <option value="name-desc" {{ request('sort') == 'name-desc' ? 'selected' : '' }}>Name (Z-A)</option>
        </select>
    </form>
</div>

<!-- Customers Table -->
<div class="dashboard-section">
    @if (session('success'))
    @php
    $message = session('success');
    $alertClass = 'alert-success';
    if (Str::contains(strtolower($message), 'update')) {
    $alertClass = 'alert-warning';
    } elseif (Str::contains(strtolower($message), 'create')) {
    $alertClass = 'alert-info';
    } elseif (Str::contains(strtolower($message), 'delete')) {
    $alertClass = 'alert-danger';
    }
    @endphp
    <div class="alert {{ $alertClass }}">
        {{ $message }}
    </div>
    @endif
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
            @foreach ($customers as $customer)
            <tr>
                <td>#CUS{{ str_pad($customer->id, 3, '0', STR_PAD_LEFT) }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->created_at->format('Y-m-d') }}</td>
                <td>
                    <a href="{{ route('admin.customers.show', $customer->id) }}" class="action-btn"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('admin.customers.edit', $customer->id) }}" class="action-btn"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="action-btn" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

    <!-- Table Footer -->
    {{ $customers->links('vendor.pagination.custom') }}

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
        padding: 10px 20px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-primary:hover {
        background: #c40811;
    }

    .action-btn {
        background: rgba(255, 255, 255, 0.1);
        border: none;
        padding: 8px 12px;
        border-radius: 6px;
        cursor: pointer;
        margin-right: 5px;
        color: var(--text);
        transition: background 0.3s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .action-btn:hover {
        background: rgba(255, 255, 255, 0.2);
    }
</style>
@endpush