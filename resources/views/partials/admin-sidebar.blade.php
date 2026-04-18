<!-- Admin Sidebar - Malkia Style -->
<aside class="admin-sidebar">
    <!-- Brand - Text Only -->
    <div class="sidebar-brand">
        <div class="brand-text">
            <span class="brand-name">SmartQ</span>
            <span class="brand-tagline">ADMIN PANEL</span>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="sidebar-nav">
        <!-- MAIN -->
        <div class="nav-section">
            <span class="nav-label">MAIN</span>
            <ul class="nav-list">
                <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <div class="nav-icon simple">
                            <i class="fas fa-th-large"></i>
                        </div>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- SHOP CONTROL -->
        <div class="nav-section">
            <span class="nav-label">SHOP CONTROL</span>
            <ul class="nav-list">
                <li class="nav-item {{ request()->routeIs('admin.products*') ? 'active' : '' }}">
                    <a href="{{ route('admin.products') }}" class="nav-link">
                        <div class="nav-icon simple">
                            <i class="fas fa-box"></i>
                        </div>
                        <span class="nav-text">Products</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.manufacturers*') ? 'active' : '' }}">
                    <a href="{{ route('admin.manufacturers') }}" class="nav-link">
                        <div class="nav-icon simple">
                            <i class="fas fa-industry"></i>
                        </div>
                        <span class="nav-text">Manufacturers</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <div class="nav-icon simple">
                            <i class="fas fa-tags"></i>
                        </div>
                        <span class="nav-text">Categories</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <div class="nav-icon simple">
                            <i class="fas fa-percent"></i>
                        </div>
                        <span class="nav-text">Deals & Offers</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <div class="nav-icon simple">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <span class="nav-text">Orders</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- MANAGEMENT -->
        <div class="nav-section">
            <span class="nav-label">MANAGEMENT</span>
            <ul class="nav-list">
                <li class="nav-item {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                    <a href="{{ route('admin.users') }}" class="nav-link">
                        <div class="nav-icon simple">
                            <i class="fas fa-users"></i>
                        </div>
                        <span class="nav-text">Users</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <div class="nav-icon simple">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <span class="nav-text">Staff</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- SETTINGS -->
        <div class="nav-section">
            <span class="nav-label">SETTINGS</span>
            <ul class="nav-list">
                <li class="nav-item {{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
                    <a href="{{ route('admin.settings') }}" class="nav-link">
                        <div class="nav-icon simple">
                            <i class="fas fa-cog"></i>
                        </div>
                        <span class="nav-text">General Settings</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <div class="nav-icon simple">
                            <i class="fas fa-paint-brush"></i>
                        </div>
                        <span class="nav-text">Appearance</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <div class="nav-icon simple">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <span class="nav-text">Payment</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <div class="nav-icon simple">
                            <i class="fas fa-truck"></i>
                        </div>
                        <span class="nav-text">Shipping</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <div class="nav-icon simple">
                            <i class="fas fa-bell"></i>
                        </div>
                        <span class="nav-text">Notifications</span>
                    </a>
                </li>
            </ul>
        </div>

        @if(auth()->user()->isSuperAdmin())
        <!-- SYSTEM -->
        <div class="nav-section">
            <span class="nav-label">SYSTEM</span>
            <ul class="nav-list">
                <li class="nav-item {{ request()->routeIs('admin.roles*') ? 'active' : '' }}">
                    <a href="{{ route('admin.roles') }}" class="nav-link">
                        <div class="nav-icon simple">
                            <i class="fas fa-lock"></i>
                        </div>
                        <span class="nav-text">Roles & Permissions</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <div class="nav-icon simple">
                            <i class="fas fa-database"></i>
                        </div>
                        <span class="nav-text">Database</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <div class="nav-icon simple">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <span class="nav-text">Logs</span>
                    </a>
                </li>
            </ul>
        </div>
        @endif

        <!-- SIGN OUT -->
        <div class="nav-section sign-out-section">
            <ul class="nav-list">
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link sign-out-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <div class="nav-icon simple">
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
