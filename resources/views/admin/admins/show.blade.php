@extends('admin.layouts.app')

@section('title', 'Admin Details - Movie Booking System')

@section('page-title', 'Admin Details')

@section('header-actions')
<a href="{{ route('admin.admins.index') }}" class="btn-secondary">
    <i class="fas fa-arrow-left"></i> Back to Admins
</a>
@endsection

@section('content')
<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">Admin Information</h2>
        <div class="header-actions">
            <a href="{{ route('admin.admins.edit', $admin->id) }}" class="btn-primary">
                <i class="fas fa-edit"></i> Edit Admin
            </a>
        </div>
    </div>

    <div class="admin-details" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Full Name</label>
            <p style="font-size: 16px; margin-top: 5px;">{{ $admin->name }}</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Email Address</label>
            <p style="font-size: 16px; margin-top: 5px;">{{ $admin->email }}</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Phone Number</label>
            <p style="font-size: 16px; margin-top: 5px;">{{ $admin->phone }}</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Admin Since</label>
            <p style="font-size: 16px; margin-top: 5px;">{{ $admin->created_at->format('F d, Y') }}</p>
        </div>

        <div class="detail-group">
            <label style="color: var(--text-secondary); font-size: 14px;">Total Actions</label>
            <p style="font-size: 16px; margin-top: 5px;">{{ $admin->logs()->count() }}</p>
        </div>
    </div>
</div>


<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">Recent Activity</h2>
        <a href="{{ route('admin.admins.logs.index',['admin_id' => $admin->id]) }}" class="view-all">View All Activity</a>
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th>Action</th>
                <th>Description</th>
                <th>Date & Time</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($admin->logs()->latest()->take(5)->get() as $log)
                <tr>
                    <td>{{ $log->action }}</td>
                    <td>{{ $log->description }}</td>
                    <td>{{ $log->created_at->format('Y-m-d H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No recent activity found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>


<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">Admin Actions</h2>
    </div>

    <div style="display: flex; gap: 15px;">
        <a href="{{ route('admin.admins.edit', $admin->id) }}" class="btn-primary">
            <i class="fas fa-edit"></i> Edit Admin
        </a>

        <form action="{{ route('admin.admins.destroy', $admin->id) }}" method="POST" onsubmit="return confirmDelete()">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-danger">
            <i class="fas fa-trash"></i> Delete Admin
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
        return confirm('Are you sure you want to delete this admin?');
    }
</script>
@endpush