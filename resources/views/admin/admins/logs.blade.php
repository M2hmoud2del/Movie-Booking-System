@extends('admin.layouts.app')

@section('title', 'Admin Logs - Movie Booking System')
@section('page-title', 'Admin Activity Logs')

@section('header-actions')
<div class="header-actions">
    <button class="btn-secondary" onclick="window.location.reload()">
        <i class="fas fa-sync"></i> Refresh
    </button>
</div>
@endsection

@section('content')
<!-- Filters -->
<form method="GET" action="{{ route('admin.admins.logs.index') }}" class="filters" style="display:flex; gap:15px; flex-wrap:wrap; margin-bottom:20px;">
    <select name="action" class="filter-select">
        <option value="">All Actions</option>
        <option value="Login" {{ request('action') == 'Login' ? 'selected' : '' }}>Login</option>
        <option value="Logout" {{ request('action') == 'Logout' ? 'selected' : '' }}>Logout</option>
        <option value="Create" {{ request('action') == 'Create' ? 'selected' : '' }}>Create</option>
        <option value="Update" {{ request('action') == 'Update' ? 'selected' : '' }}>Update</option>
        <option value="Delete" {{ request('action') == 'Delete' ? 'selected' : '' }}>Delete</option>
    </select>

    <select name="admin_id" class="filter-select">
        <option value="">All Admins</option>
        @foreach($admins as $admin)
        <option value="{{ $admin->id }}" {{ request('admin_id') == $admin->id ? 'selected' : '' }}>
            {{ $admin->name }}
        </option>
        @endforeach
    </select>

    <select name="module" class="filter-select">
        <option value="">All Modules</option>
        <option value="Admins" {{ request('module') == 'Admins' ? 'selected' : '' }}>Admins</option>
        <option value="Authentication" {{ request('module') == 'Authentication' ? 'selected' : '' }}>Authentication</option>
        <option value="Bookings" {{ request('module') == 'Bookings' ? 'selected' : '' }}>Bookings</option>
        <option value="Customers" {{ request('module') == 'Customers' ? 'selected' : '' }}>Customers</option>
        <option value="Movies" {{ request('module') == 'Movies' ? 'selected' : '' }}>Movies</option>
        <option value="Payments" {{ request('module') == 'Payments' ? 'selected' : '' }}>Payments</option>
        <option value="Screenings" {{ request('module') == 'Screenings' ? 'selected' : '' }}>Screenings</option>
    </select>

    <button type="submit" class="btn-secondary">
        <i class="fas fa-filter"></i> Apply Filters
    </button>
</form>

<!-- Logs Table -->
<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">All Admin Activities</h2>
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
            @forelse($logs as $log)
            <tr>
                <td>{{ $log->action_datetime }}</td>
                <td>
                    <div style="display:flex; align-items:center; gap:10px;">
                        <div style="width:36px; height:36px; border-radius:50%; background: rgba(233,69,96,0.2); display:flex; align-items:center; justify-content:center; color: var(--accent);">
                            {{ strtoupper(substr($log->admin->name ?? 'S',0,2)) }}
                        </div>
                        <div>
                            {{ $log->admin->name ?? 'System' }}<br>
                            <span style="font-size:12px; color:var(--text-secondary);">
                                {{ $log->admin->role ?? 'Automated Process' }}
                            </span>
                        </div>
                    </div>
                </td>
                <td>
                    <span class="badge
                        @if($log->action == 'Login') bg-success
                        @elseif($log->action == 'Create') bg-info
                        @elseif($log->action == 'Update') bg-warning text-dark
                        @elseif($log->action == 'Delete') bg-danger
                        @else bg-primary @endif">
                        {{ $log->action }}
                    </span>
                </td>
                <td>{{ $log->module }}</td>
                <td>{{ $log->description }}</td>
                <td>{{ $log->ip_address }}</td>
                <td>
                    <a href="{{ route('admin.admins.logs.show', $log->id) }}" class="action-btn" title="View Details">
                        <i class="fas fa-eye"></i>
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align:center; color:gray;">No logs found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $logs->links('vendor.pagination.custom') }}
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
</style>
@endpush