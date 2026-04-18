<!-- Admin Header -->
<header class="admin-header">
    <div class="header-left">
        <h1 class="page-title">@yield('title', 'Dashboard')</h1>
    </div>

    <div class="header-right">
        <!-- Notifications -->
        <div class="header-icon-btn">
            <i class="fas fa-bell"></i>
            <span class="notification-badge">3</span>
        </div>

        <!-- User Profile -->
        <div class="user-profile dropdown">
            <a href="#" class="profile-trigger" data-toggle="dropdown">
                <div class="avatar">
                    {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                </div>
                <div class="user-info">
                    <span class="user-name">{{ Auth::user()->name ?? 'Admin' }}</span>
                    <span class="user-role">{{ Auth::user()->highestRole()->display_name ?? 'Administrator' }}</span>
                </div>
                <i class="fas fa-chevron-down dropdown-arrow"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{ route('landing') }}">
                    <i class="fas fa-store"></i>
                    View Shop
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-header').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>
                <form id="logout-form-header" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</header>
