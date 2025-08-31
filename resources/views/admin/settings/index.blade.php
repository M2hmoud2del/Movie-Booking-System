@extends('admin.layouts.app')

@section('title', 'Settings - Movie Booking System')

@section('header')
<div class="header">
    <h1 class="page-title">System Settings</h1>
    <div class="header-actions">
        <div class="search-box">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Search settings...">
        </div>
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
<!-- Settings Tabs -->
<div class="settings-tabs" style="display: flex; border-bottom: 1px solid rgba(255, 255, 255, 0.1); margin-bottom: 25px;">
    <button class="tab-button active" onclick="openTab('general')">General</button>
    <button class="tab-button" onclick="openTab('booking')">Booking</button>
    <button class="tab-button" onclick="openTab('payment')">Payment</button>
    <button class="tab-button" onclick="openTab('notification')">Notifications</button>
    <button class="tab-button" onclick="openTab('users')">Users</button>
</div>

<!-- General Settings Tab -->
<div id="general-tab" class="tab-content active">
    <div class="dashboard-section">
        <div class="section-header">
            <h2 class="section-title">General Settings</h2>
        </div>
        
        <form>
            <div class="form-group" style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Cinema Name</label>
                <input type="text" value="CineMax Theater" style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
            </div>
            
            <div class="form-group" style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Address</label>
                <textarea style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text); height: 80px;">123 Movie Lane, Entertainment City</textarea>
            </div>
            
            <div class="form-group" style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Contact Email</label>
                <input type="email" value="info@cinemax.com" style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
            </div>
            
            <div class="form-group" style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Contact Phone</label>
                <input type="tel" value="(555) 123-4567" style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
            </div>
            
            <div class="form-group" style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Timezone</label>
                <select style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
                    <option>(GMT-05:00) Eastern Time</option>
                    <option>(GMT-06:00) Central Time</option>
                    <option>(GMT-07:00) Mountain Time</option>
                    <option>(GMT-08:00) Pacific Time</option>
                </select>
            </div>
            
            <button type="submit" class="btn-primary" style="margin-top: 10px;">
                <i class="fas fa-save"></i> Save Changes
            </button>
        </form>
    </div>
</div>

<!-- Booking Settings Tab -->
<div id="booking-tab" class="tab-content">
    <div class="dashboard-section">
        <div class="section-header">
            <h2 class="section-title">Booking Settings</h2>
        </div>
        
        <form>
            <div class="form-group" style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Maximum Booking per User</label>
                <input type="number" value="6" style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
            </div>
            
            <div class="form-group" style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Booking Timeout (minutes)</label>
                <input type="number" value="10" style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
            </div>
            
            <div class="form-group" style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">Advance Booking Period (days)</label>
                <input type="number" value="30" style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1); background: var(--secondary); color: var(--text);">
            </div>
            
            <div class="form-group" style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">
                    <input type="checkbox" checked> Allow seat selection
                </label>
            </div>
            
            <div class="form-group" style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);">
                    <input type="checkbox" checked> Send booking confirmation emails
                </label>
            </div>
            
            <button type="submit" class="btn-primary" style="margin-top: 10px;">
                <i class="fas fa-save"></i> Save Changes
            </button>
        </form>
    </div>
</div>

<!-- Other tabs would be implemented similarly -->

<script>
function openTab(tabName) {
    // Hide all tab contents
    document.querySelectorAll('.tab-content').forEach(tab => {
        tab.classList.remove('active');
    });
    
    // Remove active class from all buttons
    document.querySelectorAll('.tab-button').forEach(button => {
        button.classList.remove('active');
    });
    
    // Show the selected tab and mark button as active
    document.getElementById(tabName + '-tab').classList.add('active');
    event.currentTarget.classList.add('active');
}
</script>
@endsection

@push('styles')
<style>
    .settings-tabs {
        display: flex;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        margin-bottom: 25px;
    }
    
    .tab-button {
        background: none;
        border: none;
        padding: 12px 20px;
        color: var(--text-secondary);
        cursor: pointer;
        font-weight: 500;
        border-bottom: 3px solid transparent;
    }
    
    .tab-button.active {
        color: var(--accent);
        border-bottom: 3px solid var(--accent);
    }
    
    .tab-button:hover {
        color: var(--text);
    }
    
    .tab-content {
        display: none;
    }
    
    .tab-content.active {
        display: block;
    }
    
    .btn-primary {
        background: var(--accent);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .btn-primary:hover {
        background: #c40811;
    }
</style>
@endpush