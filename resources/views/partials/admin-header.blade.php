<!-- Admin Header - Powerful with Real Data -->
<header class="admin-header">
    <div class="header-left">
        <h1 class="page-title">@yield('title', 'Dashboard')</h1>
    </div>

    <div class="header-right">
        <!-- Orders Icon with Real Count -->
        <a href="#" class="header-icon-btn" title="New Orders">
            <i class="fa-regular fa-cart-shopping"></i>
            @if(isset($headerCounts) && $headerCounts['new_orders'] > 0)
                <span class="notification-badge orders">{{ $headerCounts['new_orders'] }}</span>
            @endif
        </a>

        <!-- Notifications with Real Count -->
        <div class="header-icon-btn dropdown">
            <a href="#" data-toggle="dropdown" title="Notifications">
                <i class="fa-regular fa-bell"></i>
                @if(isset($headerCounts) && $headerCounts['notifications'] > 0)
                    <span class="notification-badge">{{ $headerCounts['notifications'] }}</span>
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-right notification-dropdown">
                <div class="dropdown-header">
                    <span>Notifications</span>
                    @if(isset($headerCounts) && $headerCounts['notifications'] > 0)
                        <span class="badge">{{ $headerCounts['notifications'] }} new</span>
                    @endif
                </div>
                <div class="dropdown-divider"></div>
                <div class="notification-list">
                    @if(isset($stats) && $stats['pending_orders'] > 0)
                        <a href="#" class="dropdown-item notification-item">
                            <div class="notification-icon pending">
                                <i class="fa-solid fa-clock"></i>
                            </div>
                            <div class="notification-content">
                                <p class="notification-text">{{ $stats['pending_orders'] }} pending orders</p>
                                <span class="notification-time">Awaiting processing</span>
                            </div>
                        </a>
                    @endif
                    @if(isset($stats) && $stats['processing_orders'] > 0)
                        <a href="#" class="dropdown-item notification-item">
                            <div class="notification-icon processing">
                                <i class="fa-solid fa-spinner"></i>
                            </div>
                            <div class="notification-content">
                                <p class="notification-text">{{ $stats['processing_orders'] }} orders processing</p>
                                <span class="notification-time">In progress</span>
                            </div>
                        </a>
                    @endif
                    @if(isset($headerCounts) && $headerCounts['new_users'] > 0)
                        <a href="#" class="dropdown-item notification-item">
                            <div class="notification-icon users">
                                <i class="fa-solid fa-user-plus"></i>
                            </div>
                            <div class="notification-content">
                                <p class="notification-text">{{ $headerCounts['new_users'] }} new users today</p>
                                <span class="notification-time">Just joined</span>
                            </div>
                        </a>
                    @endif
                    @if((isset($stats) && $stats['pending_orders'] == 0 && $stats['processing_orders'] == 0) && (!isset($headerCounts) || $headerCounts['new_users'] == 0))
                        <div class="dropdown-item text-center py-3">
                            <i class="fa-regular fa-bell-slash text-muted mb-2" style="font-size: 24px;"></i>
                            <p class="text-muted mb-0">No new notifications</p>
                        </div>
                    @endif
                </div>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item text-center view-all">
                    View All Notifications
                </a>
            </div>
        </div>

        <!-- User Profile - Powerful -->
        <div class="user-profile dropdown">
            <a href="#" class="profile-trigger" data-toggle="dropdown">
                <div class="avatar-powerful" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                </div>
                <div class="user-info">
                    <span class="user-name">{{ Auth::user()->name ?? 'Admin' }}</span>
                    <span class="user-role">{{ Auth::user()->highestRole()->display_name ?? 'Administrator' }}</span>
                </div>
                <i class="fa-solid fa-chevron-down dropdown-arrow"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right user-dropdown">
                <div class="dropdown-header user-header">
                    <div class="user-avatar-large" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                        {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                    </div>
                    <div class="user-details">
                        <span class="user-name-large">{{ Auth::user()->name ?? 'Admin' }}</span>
                        <span class="user-email">{{ Auth::user()->email ?? 'admin@smartq.com' }}</span>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('admin.profile') }}">
                    <i class="fa-regular fa-user"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="{{ route('admin.settings') }}">
                    <i class="fa-solid fa-gear"></i>
                    Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('landing') }}" target="_blank">
                    <i class="fa-solid fa-store"></i>
                    View Shop
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item logout-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-header').submit();">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    Logout
                </a>
                <form id="logout-form-header" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</header>
