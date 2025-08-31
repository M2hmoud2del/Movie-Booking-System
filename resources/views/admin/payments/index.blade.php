@extends('admin.layouts.app')

@section('title', 'Payments Management - Movie Booking System')

@section('page-title', 'Payments Management')

@section('header-actions')
<div class="search-box">
    <i class="fas fa-search"></i>
    <input type="text" placeholder="Search payments...">
</div>
@endsection


@section('content')
<!-- Filters -->
<div class="filters">
    <select class="filter-select">
        <option>All Payment Methods</option>
        <option>Credit Card</option>
        <option>Debit Card</option>
        <option>PayPal</option>
        <option>Cash</option>
    </select>
    
    <select class="filter-select">
        <option>All Status</option>
        <option>Completed</option>
        <option>Pending</option>
        <option>Failed</option>
        <option>Refunded</option>
    </select>
    
    <select class="filter-select">
        <option>Last 7 Days</option>
        <option>Last 30 Days</option>
        <option>Last 90 Days</option>
        <option>Custom Range</option>
    </select>
</div>

<!-- Payment Summary Cards -->
<div class="stats-container">
    <div class="stat-card">
        <div class="stat-icon" style="background: rgba(46, 204, 113, 0.2); color: #2ecc71;">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="stat-text">
            <h3>$24,850</h3>
            <p>Total Revenue</p>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-icon" style="background: rgba(52, 152, 219, 0.2); color: #3498db;">
            <i class="fas fa-credit-card"></i>
        </div>
        <div class="stat-text">
            <h3>1,128</h3>
            <p>Successful Payments</p>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-icon" style="background: rgba(231, 76, 60, 0.2); color: #e74c3c;">
            <i class="fas fa-times-circle"></i>
        </div>
        <div class="stat-text">
            <h3>42</h3>
            <p>Failed Payments</p>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-icon" style="background: rgba(243, 156, 18, 0.2); color: #f39c12;">
            <i class="fas fa-exchange-alt"></i>
        </div>
        <div class="stat-text">
            <h3>18</h3>
            <p>Refunded Payments</p>
        </div>
    </div>
</div>

<!-- Payments Table -->
<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">All Payments</h2>
        <a href="#" class="view-all">Export CSV</a>
    </div>
    
    <table class="data-table">
        <thead>
            <tr>
                <th>Payment ID</th>
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
            <tr>
                <td>#PAY001</td>
                <td>#BK001</td>
                <td>John Doe</td>
                <td>$25.00</td>
                <td>Credit Card</td>
                <td>2023-06-15 19:25</td>
                <td><span class="status active">Completed</span></td>
                <td>
                    <button class="action-btn"><i class="fas fa-eye"></i></button>
                    <button class="action-btn"><i class="fas fa-print"></i></button>
                </td>
            </tr>
            <tr>
                <td>#PAY002</td>
                <td>#BK002</td>
                <td>Jane Smith</td>
                <td>$28.00</td>
                <td>PayPal</td>
                <td>2023-06-15 19:40</td>
                <td><span class="status active">Completed</span></td>
                <td>
                    <button class="action-btn"><i class="fas fa-eye"></i></button>
                    <button class="action-btn"><i class="fas fa-print"></i></button>
                </td>
            </tr>
            <tr>
                <td>#PAY003</td>
                <td>#BK003</td>
                <td>Robert Johnson</td>
                <td>$26.00</td>
                <td>Debit Card</td>
                <td>2023-06-16 17:15</td>
                <td><span class="status pending">Pending</span></td>
                <td>
                    <button class="action-btn"><i class="fas fa-eye"></i></button>
                    <button class="action-btn"><i class="fas fa-print"></i></button>
                </td>
            </tr>
            <tr>
                <td>#PAY004</td>
                <td>#BK004</td>
                <td>Sarah Williams</td>
                <td>$30.00</td>
                <td>Credit Card</td>
                <td>2023-06-16 20:05</td>
                <td><span class="status active">Completed</span></td>
                <td>
                    <button class="action-btn"><i class="fas fa-eye"></i></button>
                    <button class="action-btn"><i class="fas fa-print"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
    
    <!-- Table Footer -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
        <div style="color: var(--text-secondary); font-size: 14px;">
            Showing 1 to 4 of 1,128 entries
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

<!-- Payment Methods Summary -->
<div class="dashboard-section">
    <div class="section-header">
        <h2 class="section-title">Payment Methods Summary</h2>
        <a href="#" class="view-all">View Details</a>
    </div>
    
    <table class="data-table">
        <thead>
            <tr>
                <th>Payment Method</th>
                <th>Transactions</th>
                <th>Total Amount</th>
                <th>Success Rate</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Credit Card</td>
                <td>684</td>
                <td>$17,100</td>
                <td>98.5%</td>
            </tr>
            <tr>
                <td>Debit Card</td>
                <td>312</td>
                <td>$7,800</td>
                <td>97.2%</td>
            </tr>
            <tr>
                <td>PayPal</td>
                <td>198</td>
                <td>$4,950</td>
                <td>99.0%</td>
            </tr>
            <tr>
                <td>Cash</td>
                <td>34</td>
                <td>$850</td>
                <td>100%</td>
            </tr>
        </tbody>
    </table>
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
</style>
@endpush