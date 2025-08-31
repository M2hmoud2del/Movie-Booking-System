@extends('admin.layouts.app')

@section('title', 'Admin Logs - Movie Booking System')

@section('page-title', 'Admin Activity Logs')

@section('header-actions')
<div class="search-box">
    <i class="fas fa-search"></i>
    <input type="text" placeholder="Search logs...">
</div>
<button class="btn-primary">
    <i class="fas fa-download"></i> Export Logs
</button>
@endsection

@section('content')
<!-- Filters -->
<div class="filters">
    <select class="filter-select">
        <option>All Actions</option>
        <option>Login</option>
        <option>Create</option>
        <option>Update</option>
        <option>Delete</option>
        <option>System</option>
    </select>

    <select class="filter-select">
        <option>All Admins</option>
        <option>John Doe</option>
        <option>Jane Smith</option>
        <option>Robert Johnson</option>
        <option>Sarah Williams</option>
        <option>Michael Brown</option>
    </select>

    <select class="filter-select">
        <option>All Modules</option>
        <option>Movies</option>
        <option>Screenings</option>
        <option>Bookings</option>
        <option>Customers</option>
        <option>Payments</option>
        <option>System</option>
    </select>

    <select class="filter-select">
        <option>Sort By: Newest First</option>
        <option>Sort By: Oldest First</option>
    </select>
</div>

<!-- Logs Table -->
<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">All Admin Activities</h2>
        <div class="header-actions">
            <button class="btn-secondary">
                <i class="fas fa-filter"></i> Apply Filters
            </button>
            <button class="btn-secondary">
                <i class="fas fa-sync"></i> Refresh
            </button>
        </div>
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th>Timestamp</th>
                <th>Admin</th>
                <th>Action</th>
                <th>Module</th>
                <th>Description</th>
                <th>IP Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>2023-06-16 14:30:25</td>
                <td>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <div style="width: 36px; height: 36px; border-radius: 50%; background: rgba(233, 69, 96, 0.2); display: flex; align-items: center; justify-content: center; color: var(--accent);">JD</div>
                        <div>John Doe<br><span style="font-size: 12px; color: var(--text-secondary);">Administrator</span></div>
                    </div>
                </td>
                <td><span class="badge badge-success">Login</span></td>
                <td>Authentication</td>
                <td>User logged in successfully</td>
                <td>192.168.1.101</td>
                <td>
                    <a href="{{ route('admin.admins.logs.show', 1) }}" class="action-btn" title="View Details"><i class="fas fa-eye"></i></a>
                </td>
            </tr>
            <tr>
                <td>2023-06-16 13:15:42</td>
                <td>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <div style="width: 36px; height: 36px; border-radius: 50%; background: rgba(33, 150, 243, 0.2); display: flex; align-items: center; justify-content: center; color: #2196f3;">JS</div>
                        <div>Jane Smith<br><span style="font-size: 12px; color: var(--text-secondary);">Content Manager</span></div>
                    </div>
                </td>
                <td><span class="badge badge-info">Create</span></td>
                <td>Movies</td>
                <td>Created new movie "Spider-Man: Across the Spider-Verse"</td>
                <td>192.168.1.102</td>
                <td>
                    <a href="{{ route('admin.admins.logs.show', 2) }}" class="action-btn" title="View Details"><i class="fas fa-eye"></i></a>
                </td>
            </tr>
            <tr>
                <td>2023-06-16 11:20:18</td>
                <td>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <div style="width: 36x; height: 36px; border-radius: 50%; background: rgba(255, 193, 7, 0.2); display: flex; align-items: center; justify-content: center; color: #ffc107;">RJ</div>
                        <div>Robert Johnson<br><span style="font-size: 12px; color: var(--text-secondary);">Operations Manager</span></div>
                    </div>
                </td>
                <td><span class="badge badge-warning">Update</span></td>
                <td>Screenings</td>
                <td>Updated screening schedule for Screen 3</td>
                <td>192.168.1.103</td>
                <td>
                    <a href="{{ route('admin.admins.logs.show', 3) }}" class="action-btn" title="View Details"><i class="fas fa-eye"></i></a>
                </td>
            </tr>
            <tr>
                <td>2023-06-15 16:45:37</td>
                <td>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <div style="width: 36px; height: 36px; border-radius: 50%; background: rgba(233, 69, 96, 0.2); display: flex; align-items: center; justify-content: center; color: var(--accent);">JD</div>
                        <div>John Doe<br><span style="font-size: 12px; color: var(--text-secondary);">Administrator</span></div>
                    </div>
                </td>
                <td><span class="badge badge-error">Delete</span></td>
                <td>Bookings</td>
                <td>Deleted booking #BK20230615003</td>
                <td>192.168.1.101</td>
                <td>
                    <a href="{{ route('admin.admins.logs.show', 4) }}" class="action-btn" title="View Details"><i class="fas fa-eye"></i></a>
                </td>
            </tr>
            <tr>
                <td>2023-06-15 14:20:55</td>
                <td>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <div style="width: 36px; height: 36px; border-radius: 50%; background: rgba(76, 175, 80, 0.2); display: flex; align-items: center; justify-content: center; color: #4caf50;">SW</div>
                        <div>Sarah Williams<br><span style="font-size: 12px; color: var(--text-secondary);">Customer Support</span></div>
                    </div>
                </td>
                <td><span class="badge badge-info">Create</span></td>
                <td>Customers</td>
                <td>Created customer account for Emily Johnson</td>
                <td>192.168.1.104</td>
                <td>
                    <a href="{{ route('admin.admins.logs.show', 5) }}" class="action-btn" title="View Details"><i class="fas fa-eye"></i></a>
                </td>
            </tr>
            <tr>
                <td>2023-06-15 10:15:33</td>
                <td>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <div style="width: 36px; height: 36px; border-radius: 50%; background: rgba(156, 39, 176, 0.2); display: flex; align-items: center; justify-content: center; color: #9c27b0;">MB</div>
                        <div>Michael Brown<br><span style="font-size: 12px; color: var(--text-secondary);">Finance Manager</span></div>
                    </div>
                </td>
                <td><span class="badge badge-warning">Update</span></td>
                <td>Payments</td>
                <td>Updated payment status for transaction #PAY2023061422</td>
                <td>192.168.1.105</td>
                <td>
                    <a href="{{ route('admin.admins.logs.show', 6) }}" class="action-btn" title="View Details"><i class="fas fa-eye"></i></a>
                </td>
            </tr>
            <tr>
                <td>2023-06-15 03:00:15</td>
                <td>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <div style="width: 36px; height: 36px; border-radius: 50%; background: rgba(103, 58, 183, 0.2); display: flex; align-items: center; justify-content: center; color: #673ab7;">SYS</div>
                        <div>System<br><span style="font-size: 12px; color: var(--text-secondary);">Automated Process</span></div>
                    </div>
                </td>
                <td><span class="badge" style="background: rgba(103, 58, 183, 0.2); color: #673ab7;">System</span></td>
                <td>Database</td>
                <td>Automatic backup completed successfully</td>
                <td>127.0.0.1</td>
                <td>
                    <a href="{{ route('admin.admins.logs.show', 7) }}" class="action-btn" title="View Details"><i class="fas fa-eye"></i></a>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Table Footer -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
        <div style="color: var(--text-secondary); font-size: 14px;">
            Showing 1 to 7 of 128 entries
        </div>
        <div style="display: flex; gap: 10px;">
            <button class="action-btn">Previous</button>
            <button class="action-btn" style="background: var(--accent); color: white;">1</button>
            <button class="action-btn">2</button>
            <button class="action-btn">3</button>
            <button class="action-btn">4</button>
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
        min-width: 180px;
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

    .badge {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
    }

    .badge-success {
        background: rgba(76, 175, 80, 0.2);
        color: #4caf50;
    }

    .badge-warning {
        background: rgba(255, 193, 7, 0.2);

        color: #ffc107;
    }

    .badge-error {
        background: rgba(244, 67, 54, 0.2);
        color: #f44336;
    }

    .badge-info {
        background: rgba(33, 150, 243, 0.2);
        color: #2196f3;
    }
</style>
@endpush