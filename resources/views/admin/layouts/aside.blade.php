<!-- Sidebar Navigation -->
<div class="sidebar">
    <div class="logo">
        <i class="fas fa-film"></i>
        <div class="logo-text">CineAdmin</div>
    </div>
    
    <div class="nav-section">
        <div class="nav-title">Main Navigation</div>
        <ul class="nav-menu">
            <li class="nav-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                <a href="{{ url('admin/dashboard') }}">
                    <i class="fas fa-th-large"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/bookings*') ? 'active' : '' }}">
                <a href="{{ url('admin/bookings') }}">
                    <i class="fas fa-ticket-alt"></i>
                    <span class="nav-text">Bookings</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/screenings*') ? 'active' : '' }}">
                <a href="{{ url('admin/screenings') }}">
                    <i class="fas fa-theater-masks"></i>
                    <span class="nav-text">Screenings</span>
                </a>
            </li>
        </ul>
    </div>
    
    <div class="nav-section">
        <div class="nav-title">Management</div>
        <ul class="nav-menu">
            <li class="nav-item {{ request()->is('admin/customers*') ? 'active' : '' }}">
                <a href="{{ url('admin/customers') }}">
                    <i class="fas fa-users"></i>
                    <span class="nav-text">Customers</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/reports*') ? 'active' : '' }}">
                <a href="{{ url('admin/reports') }}">
                    <i class="fas fa-chart-line"></i>
                    <span class="nav-text">Reports</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/payments*') ? 'active' : '' }}">
                <a href="{{ url('admin/payments') }}">
                    <i class="fas fa-money-bill-wave"></i>
                    <span class="nav-text">Payments</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/settings*') ? 'active' : '' }}">
                <a href="{{ url('admin/settings') }}">
                    <i class="fas fa-cog"></i>
                    <span class="nav-text">Settings</span>
                </a>
            </li>
        </ul>
    </div>
</div>