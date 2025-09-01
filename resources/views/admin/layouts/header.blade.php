<div class="header">
    <h1 class="page-title">@yield('page-title', 'Dashboard')</h1>
    <div class="header-actions">
        @yield('header-actions')
        
        <div class="user-info">
            <div class="user-img">
                {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
            </div>
            <div>
                <div style="font-weight: 600;">
                    {{ Auth::user()->name }}
                </div>
                <div style="font-size: 13px; color: var(--text-secondary);">
                    Administrator
                </div>
            </div>
        </div>
    </div>
</div>
