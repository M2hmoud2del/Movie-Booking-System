@extends('admin.layouts.app')

@section('title', 'Customers Management - Movie Booking System')

@section('header')
<div class="header">
    <h1 class="page-title">Customers Management</h1>
    <div class="header-actions">
        <div class="search-box">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Search customers...">
        </div>
        <a href="{{ route('admin.customers.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i> New Customer
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
<!-- Filters -->
<div class="filters">
    <select class="filter-select">
        <option>All Customers</option>
        <option>Active</option>
        <option>Inactive</option>
    </select>
    
    <select class="filter-select">
        <option>Sort By</option>
        <option>Newest</option>
        <option>Oldest</option>
        <option>Name (A-Z)</option>
        <option>Name (Z-A)</option>
    </select>
</div>

<!-- Customers Table -->
<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">All Customers</h2>
        <a href="#" class="view-all">Export CSV</a>
    </div>
    
    <table class="data-table">
        <thead>
            <tr>
                <th>Customer ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Join Date</th>
                <th>Total Bookings</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>#CUS001</td>
                <td>John Doe</td>
                <td>john.doe@example.com</td>
                <td>(555) 123-4567</td>
                <td>2023-01-15</td>
                <td>24</td>
                <td>
                    <a href="{{ route('admin.customers.show', 1) }}" class="action-btn"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('admin.customers.edit', 1) }}" class="action-btn"><i class="fas fa-edit"></i></a>
                    <button class="action-btn"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
            <tr>
                <td>#CUS002</td>
                <td>Jane Smith</td>
                <td>jane.smith@example.com</td>
                <td>(555) 987-6543</td>
                <td>2023-02-20</td>
                <td>18</td>
                <td>
                    <a href="{{ route('admin.customers.show', 2) }}" class="action-btn"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('admin.customers.edit', 2) }}" class="action-btn"><i class="fas fa-edit"></i></a>
                    <button class="action-btn"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
            <tr>
                <td>#CUS003</td>
                <td>Robert Johnson</td>
                <td>robert.j@example.com</td>
                <td>(555) 456-7890</td>
                <td>2023-03-10</td>
                <td>12</td>
                <td>
                    <a href="{{ route('admin.customers.show', 3) }}" class="action-btn"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('admin.customers.edit', 3) }}" class="action-btn"><i class="fas fa-edit"></i></a>
                    <button class="action-btn"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
            <tr>
                <td>#CUS004</td>
                <td>Sarah Williams</td>
                <td>sarah.w@example.com</td>
                <td>(555) 789-0123</td>
                <td>2023-04-05</td>
                <td>8</td>
                <td>
                    <a href="{{ route('admin.customers.show', 4) }}" class="action-btn"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('admin.customers.edit', 4) }}" class="action-btn"><i class="fas fa-edit"></i></a>
                    <button class="action-btn"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
    
    <!-- Table Footer -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
        <div style="color: var(--text-secondary); font-size: 14px;">
            Showing 1 to 4 of 5,842 entries
        </div>
        <div style="display: flex; gap: 10px;">
            <button class="action-btn">Previous</button>
            <button class="action-btn" style="background: var(--accent);">1</button>
            <button class="action-btn">2</button>
            <button class="action-btn">3</button>
            <button class="action-btn">Next</button>
        </div>
    </div>
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