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
                <li class="nav-item {{ request()->routeIs('admin.categories*') ? 'active' : '' }}">
                    <a href="{{ route('admin.categories') }}" class="nav-link">
                        <div class="nav-icon simple">
                            <i class="fas fa-tags"></i>
                        </div>
                        <span class="nav-text">Categories</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.deals*') ? 'active' : '' }}">
                    <a href="{{ route('admin.deals') }}" class="nav-link">
                        <div class="nav-icon simple">
                            <i class="fas fa-percent"></i>
                        </div>
                        <span class="nav-text">Deals & Offers</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.orders*') ? 'active' : '' }}">
                    <a href="{{ route('admin.orders') }}" class="nav-link">
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
                <li class="nav-item {{ request()->routeIs('admin.staff*') ? 'active' : '' }}">
                    <a href="{{ route('admin.staff') }}" class="nav-link">
                        <div class="nav-icon simple">
                            <i class="fas fa-user-tie"></i>
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
                <li class="nav-item has-submenu {{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
                    <a href="#" class="nav-link" onclick="toggleSubmenu(event)">
                        <div class="nav-icon simple">
                            <i class="fas fa-cog"></i>
                        </div>
                        <span class="nav-text">Settings</span>
                        <i class="fas fa-chevron-right submenu-arrow"></i>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="{{ route('admin.settings') }}" class="submenu-link {{ request()->routeIs('admin.settings') && !request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                                <i class="fas fa-sliders-h"></i> General
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a href="{{ route('admin.settings.appearance') }}" class="submenu-link {{ request()->routeIs('admin.settings.appearance') ? 'active' : '' }}">
                                <i class="fas fa-paint-brush"></i> Appearance
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a href="{{ route('admin.settings.payment') }}" class="submenu-link {{ request()->routeIs('admin.settings.payment') ? 'active' : '' }}">
                                <i class="fas fa-credit-card"></i> Payment
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a href="{{ route('admin.settings.shipping') }}" class="submenu-link {{ request()->routeIs('admin.settings.shipping') ? 'active' : '' }}">
                                <i class="fas fa-truck"></i> Shipping
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a href="{{ route('admin.settings.notifications') }}" class="submenu-link {{ request()->routeIs('admin.settings.notifications') ? 'active' : '' }}">
                                <i class="far fa-bell"></i> Notifications
                            </a>
                        </li>
                    </ul>
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
