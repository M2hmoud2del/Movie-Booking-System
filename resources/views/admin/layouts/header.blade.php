<div class="header">
    <h1 class="page-title">@yield('page-title', 'Dashboard')</h1>
    <div class="header-actions">
        @yield('header-actions')

        <div class="user-info" style="position: relative;">
            <div class="user-img cursor-pointer" id="userToggle">
                {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
            </div>
            <div class="ml-2 cursor-pointer" id="userToggle">
                <div style="font-weight: 600;">
                    {{ Auth::user()->name }}
                </div>
                <div style="font-size: 13px; color: var(--text-secondary);">
                    Administrator
                </div>
            </div>

            <!-- Dropdown -->
            <div id="userDropdown" 
                 style="display: none; position: absolute; top: 100%; right: 0; background: white; border: 1px solid #ddd; border-radius: 8px; padding: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); min-width: 150px; z-index: 100;">
                <a href="{{ route('profile.edit') }}" style="display: flex; align-items: center; gap: 8px; padding: 8px; color: #333; text-decoration: none;">
                    <i class="fas fa-user-circle"></i> Profile
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" style="display: flex; align-items: center; gap: 8px; width: 100%; text-align: left; padding: 8px; background: none; border: none; color: #333; cursor: pointer;">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
                </div>
        </div>
    </div>
</div>

<script>
    const userToggle = document.querySelectorAll("#userToggle");
    const userDropdown = document.getElementById("userDropdown");

    userToggle.forEach(el => {
        el.addEventListener("click", () => {
            userDropdown.style.display = userDropdown.style.display === "block" ? "none" : "block";
        });
    });

    document.addEventListener("click", (e) => {
        if (!e.target.closest(".user-info")) {
            userDropdown.style.display = "none";
        }
    });
</script>