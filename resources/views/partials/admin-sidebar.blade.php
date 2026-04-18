<!-- Admin Sidebar -->
<aside class="admin-sidebar">
    <!-- Brand -->
    <div class="sidebar-brand">
        <div class="brand-logo">
            <i class="fas fa-crown"></i>
        </div>
        <div class="brand-text">
            <span class="brand-name">SmartQ</span>
            <span class="brand-tagline">ADMIN PANEL</span>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="sidebar-nav">
        <div class="nav-section">
            <span class="nav-label">MAIN</span>
            <ul class="nav-list">
                <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <div class="nav-icon" style="background: linear-gradient(135deg, #FFC107, #FF9800);">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="nav-section">
            <span class="nav-label">SHOP & CONTENT</span>
            <ul class="nav-list">
                <li class="nav-item {{ request()->routeIs('admin.products*') ? 'active' : '' }}">
                    <a href="{{ route('admin.products') }}" class="nav-link">
                        <div class="nav-icon" style="background: linear-gradient(135deg, #4CAF50, #8BC34A);">
                            <i class="fas fa-box"></i>
                        </div>
                        <span class="nav-text">Products</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.manufacturers*') ? 'active' : '' }}">
                    <a href="{{ route('admin.manufacturers') }}" class="nav-link">
                        <div class="nav-icon" style="background: linear-gradient(135deg, #9C27B0, #E91E63);">
                            <i class="fas fa-industry"></i>
                        </div>
                        <span class="nav-text">Manufacturers</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="nav-section">
            <span class="nav-label">MANAGEMENT</span>
            <ul class="nav-list">
                <li class="nav-item {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                    <a href="{{ route('admin.users') }}" class="nav-link">
                        <div class="nav-icon" style="background: linear-gradient(135deg, #00BCD4, #009688);">
                            <i class="fas fa-users"></i>
                        </div>
                        <span class="nav-text">Users</span>
                    </a>
                </li>
            </ul>
        </div>

        @if(auth()->user()->isSuperAdmin())
        <div class="nav-section">
            <span class="nav-label">SYSTEM</span>
            <ul class="nav-list">
                <li class="nav-item {{ request()->routeIs('admin.roles*') ? 'active' : '' }}">
                    <a href="{{ route('admin.roles') }}" class="nav-link">
                        <div class="nav-icon" style="background: linear-gradient(135deg, #607D8B, #9E9E9E);">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <span class="nav-text">Roles</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
                    <a href="{{ route('admin.settings') }}" class="nav-link">
                        <div class="nav-icon" style="background: linear-gradient(135deg, #795548, #8D6E63);">
                            <i class="fas fa-cog"></i>
                        </div>
                        <span class="nav-text">Settings</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.super*') ? 'active' : '' }}">
                    <a href="{{ route('admin.super.dashboard') }}" class="nav-link">
                        <div class="nav-icon" style="background: linear-gradient(135deg, #FFD700, #FFA000);">
                            <i class="fas fa-crown"></i>
                        </div>
                        <span class="nav-text">Super Admin</span>
                    </a>
                </li>
            </ul>
        </div>
        @endif

        <div class="nav-section">
            <ul class="nav-list">
                <li class="nav-item sign-out">
                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <div class="nav-icon" style="background: linear-gradient(135deg, #f44336, #e91e63);">
                            <i class="fas fa-sign-out-alt"></i>
                        </div>
                        <span class="nav-text">Sign Out</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</aside>
