<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SmartQ Admin Dashboard</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: #f0f0f4;
            color: #1a1a2e;
            min-height: 100vh;
            font-size: 14px;
            line-height: 1.5;
        }
        
        /* Layout */
        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }
        
        /* Sidebar - Malkia Style */
        .admin-sidebar {
            width: 240px;
            background: #f8f8fa;
            border-right: 1px solid #e8e8ec;
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 1000;
        }
        
        .sidebar-brand {
            padding: 20px 24px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .brand-logo {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 16px;
        }
        
        .brand-text {
            display: flex;
            flex-direction: column;
        }
        
        .brand-name {
            font-size: 18px;
            font-weight: 800;
            color: #1a1a2e;
            line-height: 1.2;
            letter-spacing: -0.5px;
        }
        
        .brand-tagline {
            font-size: 10px;
            color: #3b82f6;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        
        .sidebar-nav {
            padding: 8px 16px;
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }
        
        .nav-section {
            margin-bottom: 4px;
        }
        
        .nav-section:last-child {
            margin-top: auto;
            margin-bottom: 0;
        }
        
        .nav-label {
            font-size: 10px;
            font-weight: 600;
            color: #9ca3af;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 16px 12px 8px;
            display: block;
        }
        
        .nav-list {
            list-style: none;
        }
        
        .nav-item {
            margin-bottom: 2px;
        }
        
        .nav-link {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 12px 16px;
            border-radius: 12px;
            text-decoration: none;
            color: #6b7280;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.2s ease;
        }
        
        .nav-link:hover {
            background: #fff;
            color: #1a1a2e;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }
        
        .nav-item.active .nav-link {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            color: white;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.35);
        }
        
        .nav-icon {
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }
        
        /* Main Content */
        .admin-main {
            flex: 1;
            margin-left: 240px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        /* Header */
        .admin-header {
            background: #f0f0f4;
            padding: 16px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .page-title {
            font-size: 24px;
            font-weight: 700;
            color: #1a1a2e;
            margin: 0;
        }
        
        .header-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }
        
        .header-icon-btn {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6b7280;
            font-size: 16px;
            position: relative;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }
        
        .notification-badge {
            position: absolute;
            top: -2px;
            right: -2px;
            width: 18px;
            height: 18px;
            background: #ef4444;
            color: white;
            font-size: 10px;
            font-weight: 600;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .user-profile .profile-trigger {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 10px;
            background: white;
            color: #1a1a2e;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }
        
        .avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 13px;
        }
        
        .user-info {
            display: flex;
            flex-direction: column;
        }
        
        .user-name {
            font-size: 13px;
            font-weight: 600;
        }
        
        .user-role {
            font-size: 11px;
            color: #9ca3af;
        }
        
        /* Content */
        .admin-content {
            flex: 1;
            padding: 8px 32px 32px;
        }
        
        /* Stats Grid - Compact Blue Style */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 12px;
            margin-bottom: 20px;
        }
        
        @media (max-width: 1400px) {
            .stats-grid { grid-template-columns: repeat(3, 1fr); }
        }
        
        @media (max-width: 768px) {
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
            .admin-sidebar { display: none; }
            .admin-main { margin-left: 0; }
            .admin-content { padding: 16px; }
        }
        
        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 16px;
            display: flex;
            align-items: center;
            gap: 12px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            transition: all 0.2s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }
        
        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }
        
        .stat-users .stat-icon { background: #dbeafe; color: #3b82f6; }
        .stat-products .stat-icon { background: #dcfce7; color: #22c55e; }
        .stat-orders .stat-icon { background: #fce7f3; color: #ec4899; }
        .stat-revenue .stat-icon { background: #fef3c7; color: #f59e0b; }
        .stat-manufacturers .stat-icon { background: #f3e8ff; color: #a855f7; }
        .stat-pending .stat-icon { background: #ffedd5; color: #f97316; }
        
        .stat-value {
            font-size: 22px;
            font-weight: 800;
            color: #1a1a2e;
            line-height: 1;
            letter-spacing: -0.5px;
        }
        
        .stat-label {
            font-size: 11px;
            color: #9ca3af;
            margin-top: 4px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .stat-content {
            flex: 1;
        }
        
        /* Charts Section */
        .charts-section {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
            margin-bottom: 24px;
        }
        
        @media (max-width: 992px) {
            .charts-section { grid-template-columns: 1fr; }
        }
        
        .chart-card {
            background: white;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.03);
        }
        
        .chart-header {
            margin-bottom: 20px;
        }
        
        .chart-title {
            font-size: 16px;
            font-weight: 600;
            color: #1a1a2e;
            margin: 0;
        }
        
        .chart-container {
            position: relative;
            height: 280px;
        }
        
        .doughnut-container {
            height: 200px;
            display: flex;
            justify-content: center;
        }
        
        .chart-legend {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 16px;
            padding-top: 16px;
            border-top: 1px solid #f3f4f6;
        }
        
        .legend-item {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
        }
        
        .legend-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }
        
        .legend-label {
            color: #9ca3af;
        }
        
        /* Activity Section */
        .activity-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        
        @media (max-width: 992px) {
            .activity-section { grid-template-columns: 1fr; }
        }
        
        .activity-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.03);
            overflow: hidden;
        }
        
        .activity-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 24px;
            border-bottom: 1px solid #f3f4f6;
        }
        
        .activity-title {
            font-size: 16px;
            font-weight: 600;
            color: #1a1a2e;
            margin: 0;
        }
        
        .view-all {
            color: #3b82f6;
            text-decoration: none;
            font-size: 12px;
            font-weight: 500;
        }
        
        .view-all:hover {
            text-decoration: underline;
        }
        
        .activity-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .activity-table th {
            text-align: left;
            padding: 14px 24px;
            font-size: 11px;
            font-weight: 600;
            color: #9ca3af;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            background: #fafafa;
        }
        
        .activity-table td {
            padding: 14px 24px;
            border-bottom: 1px solid #f9fafb;
            font-size: 13px;
        }
        
        .order-id {
            font-weight: 600;
            color: #3b82f6;
        }
        
        .status-badge {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 500;
        }
        
        .status-pending { background: #fef3c7; color: #d97706; }
        .status-processing { background: #dbeafe; color: #2563eb; }
        .status-completed { background: #d1fae5; color: #059669; }
        
        .users-list {
            padding: 8px;
        }
        
        .user-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            border-radius: 12px;
            transition: background 0.2s ease;
        }
        
        .user-item:hover {
            background: #f9fafb;
        }
        
        .users-list .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            font-weight: 600;
        }
        
        .users-list .user-info {
            flex: 1;
        }
        
        .users-list .user-name {
            font-weight: 600;
            color: #1a1a2e;
            font-size: 13px;
        }
        
        .users-list .user-email {
            font-size: 12px;
            color: #9ca3af;
        }
        
        .empty-state {
            text-align: center;
            padding: 40px;
            color: #d1d5db;
        }
        
        .empty-state i {
            font-size: 48px;
            margin-bottom: 12px;
        }
    </style>
</head>
<body>
    <div class="admin-wrapper">
        <!-- Sidebar -->
        <aside class="admin-sidebar">
            <div class="sidebar-brand">
                <div class="brand-logo">
                    <i class="fas fa-crown"></i>
                </div>
                <div class="brand-text">
                    <div class="brand-name">SmartQ</div>
                    <div class="brand-tagline">ADMIN PANEL</div>
                </div>
            </div>

            <nav class="sidebar-nav">
                <div class="nav-section">
                    <span class="nav-label">MAIN</span>
                    <ul class="nav-list">
                        <li class="nav-item active">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link">
                                <span class="nav-icon"><i class="fas fa-th-large"></i></span>
                                <span>Dashboard</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="nav-section">
                    <span class="nav-label">SHOP CONTROL</span>
                    <ul class="nav-list">
                        <li class="nav-item">
                            <a href="{{ route('admin.products') }}" class="nav-link">
                                <span class="nav-icon"><i class="fas fa-box"></i></span>
                                <span>Products</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.manufacturers') }}" class="nav-link">
                                <span class="nav-icon"><i class="fas fa-industry"></i></span>
                                <span>Manufacturers</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <span class="nav-icon"><i class="fas fa-tags"></i></span>
                                <span>Categories</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <span class="nav-icon"><i class="fas fa-percent"></i></span>
                                <span>Deals & Offers</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <span class="nav-icon"><i class="fas fa-shopping-cart"></i></span>
                                <span>Orders</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="nav-section">
                    <span class="nav-label">MANAGEMENT</span>
                    <ul class="nav-list">
                        <li class="nav-item">
                            <a href="{{ route('admin.users') }}" class="nav-link">
                                <span class="nav-icon"><i class="fas fa-users"></i></span>
                                <span>Users</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <span class="nav-icon"><i class="fas fa-user-shield"></i></span>
                                <span>Staff</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="nav-section">
                    <span class="nav-label">SETTINGS</span>
                    <ul class="nav-list">
                        <li class="nav-item">
                            <a href="{{ route('admin.settings') }}" class="nav-link">
                                <span class="nav-icon"><i class="fas fa-cog"></i></span>
                                <span>General Settings</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <span class="nav-icon"><i class="fas fa-paint-brush"></i></span>
                                <span>Appearance</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <span class="nav-icon"><i class="fas fa-credit-card"></i></span>
                                <span>Payment</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <span class="nav-icon"><i class="fas fa-truck"></i></span>
                                <span>Shipping</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <span class="nav-icon"><i class="fas fa-bell"></i></span>
                                <span>Notifications</span>
                            </a>
                        </li>
                    </ul>
                </div>

                @if(auth()->user()->isSuperAdmin())
                <div class="nav-section">
                    <span class="nav-label">SYSTEM</span>
                    <ul class="nav-list">
                        <li class="nav-item">
                            <a href="{{ route('admin.roles') }}" class="nav-link">
                                <span class="nav-icon"><i class="fas fa-lock"></i></span>
                                <span>Roles & Permissions</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <span class="nav-icon"><i class="fas fa-database"></i></span>
                                <span>Database</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <span class="nav-icon"><i class="fas fa-file-alt"></i></span>
                                <span>Logs</span>
                            </a>
                        </li>
                    </ul>
                </div>
                @endif

                <div class="nav-section">
                    <ul class="nav-list">
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link" style="color: #ef4444;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <span class="nav-icon"><i class="fas fa-sign-out-alt"></i></span>
                                <span>Sign Out</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="admin-main">
            <!-- Header -->
            <header class="admin-header">
                <h1 class="page-title">Dashboard</h1>
                <div class="header-right">
                    <div class="header-icon-btn">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge">3</span>
                    </div>
                    <div class="user-profile dropdown">
                        <a href="#" class="profile-trigger" data-toggle="dropdown">
                            <div class="avatar">{{ substr(Auth::user()->name ?? 'A', 0, 1) }}</div>
                            <div class="user-info">
                                <span class="user-name">{{ Auth::user()->name ?? 'Admin' }}</span>
                                <span class="user-role">{{ Auth::user()->highestRole()->display_name ?? 'Administrator' }}</span>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow-sm border-0 mt-2" style="border-radius: 12px;">
                            <a class="dropdown-item py-2" href="{{ route('landing') }}">
                                <i class="fas fa-store mr-2 text-muted"></i> View Shop
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item py-2 text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-header').submit();">
                                <i class="fas fa-sign-out-alt mr-2"></i> Logout
                            </a>
                            <form id="logout-form-header" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <main class="admin-content">
                <!-- Stats Grid -->
                <div class="stats-grid">
                    <div class="stat-card stat-users">
                        <div class="stat-icon"><i class="fas fa-users"></i></div>
                        <div class="stat-content">
                            <div class="stat-value">{{ number_format($stats['users']) }}</div>
                            <div class="stat-label">Total Users</div>
                        </div>
                    </div>
                    <div class="stat-card stat-products">
                        <div class="stat-icon"><i class="fas fa-box"></i></div>
                        <div class="stat-content">
                            <div class="stat-value">{{ number_format($stats['products']) }}</div>
                            <div class="stat-label">Products</div>
                        </div>
                    </div>
                    <div class="stat-card stat-orders">
                        <div class="stat-icon"><i class="fas fa-shopping-cart"></i></div>
                        <div class="stat-content">
                            <div class="stat-value">{{ number_format($stats['orders']) }}</div>
                            <div class="stat-label">Total Orders</div>
                        </div>
                    </div>
                    <div class="stat-card stat-revenue">
                        <div class="stat-icon"><i class="fas fa-dollar-sign"></i></div>
                        <div class="stat-content">
                            <div class="stat-value">${{ number_format($stats['revenue'], 0) }}</div>
                            <div class="stat-label">Total Revenue</div>
                        </div>
                    </div>
                    <div class="stat-card stat-manufacturers">
                        <div class="stat-icon"><i class="fas fa-industry"></i></div>
                        <div class="stat-content">
                            <div class="stat-value">{{ number_format($stats['manufacturers']) }}</div>
                            <div class="stat-label">Manufacturers</div>
                        </div>
                    </div>
                    <div class="stat-card stat-pending">
                        <div class="stat-icon"><i class="fas fa-clock"></i></div>
                        <div class="stat-content">
                            <div class="stat-value">{{ $stats['pending_orders'] ?? 0 }}</div>
                            <div class="stat-label">Pending</div>
                        </div>
                    </div>
                </div>

                <!-- Charts -->
                <div class="charts-section">
                    <div class="chart-card">
                        <div class="chart-header">
                            <h3 class="chart-title">Activity Trend (Last 14 Days)</h3>
                        </div>
                        <div class="chart-container">
                            <canvas id="salesChart"></canvas>
                        </div>
                    </div>
                    <div class="chart-card">
                        <div class="chart-header">
                            <h3 class="chart-title">Distribution</h3>
                        </div>
                        <div class="doughnut-container">
                            <canvas id="distributionChart"></canvas>
                        </div>
                        <div class="chart-legend">
                            <div class="legend-item">
                                <span class="legend-dot" style="background: #f59e0b;"></span>
                                <span class="legend-label">Pending</span>
                                <span style="font-weight: 600; color: #1a1a2e; font-size: 13px;">{{ $stats['pending_orders'] ?? 0 }}</span>
                            </div>
                            <div class="legend-item">
                                <span class="legend-dot" style="background: #22c55e;"></span>
                                <span class="legend-label">Completed</span>
                                <span style="font-weight: 600; color: #1a1a2e; font-size: 13px;">{{ $stats['completed_orders'] ?? 0 }}</span>
                            </div>
                            <div class="legend-item">
                                <span class="legend-dot" style="background: #3b82f6;"></span>
                                <span class="legend-label">Processing</span>
                                <span style="font-weight: 600; color: #1a1a2e; font-size: 13px;">{{ $stats['processing_orders'] ?? 0 }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Activity Tables -->
                <div class="activity-section">
                    <div class="activity-card">
                        <div class="activity-header">
                            <h3 class="activity-title">Recent Orders</h3>
                            <a href="#" class="view-all">View All <i class="fas fa-arrow-right ml-1" style="font-size: 10px;"></i></a>
                        </div>
                        <div class="activity-body">
                            @if(isset($recentOrders) && count($recentOrders) > 0)
                            <table class="activity-table">
                                <thead>
                                    <tr>
                                        <th>Order #</th>
                                        <th>Customer</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentOrders as $order)
                                    <tr>
                                        <td class="order-id">#{{ $order->order_number }}</td>
                                        <td>{{ $order->user ? $order->user->name : 'Guest' }}</td>
                                        <td>${{ number_format($order->grand_total, 2) }}</td>
                                        <td>
                                            <span class="status-badge status-{{ $order->status }}">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <div class="empty-state">
                                <i class="fas fa-shopping-cart"></i>
                                <p>No orders yet</p>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="activity-card">
                        <div class="activity-header">
                            <h3 class="activity-title">Recent Users</h3>
                            <a href="#" class="view-all">View All <i class="fas fa-arrow-right ml-1" style="font-size: 10px;"></i></a>
                        </div>
                        <div class="activity-body">
                            <div class="users-list">
                                @foreach($recentUsers as $user)
                                <div class="user-item">
                                    <div class="user-avatar">{{ substr($user->name, 0, 1) }}</div>
                                    <div class="user-info">
                                        <div class="user-name">{{ $user->name }}</div>
                                        <div class="user-email">{{ $user->email }}</div>
                                    </div>
                                    <div style="font-size: 11px; color: #9ca3af;">{{ $user->created_at->diffForHumans() }}</div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Sales Trend Chart
        const salesCtx = document.getElementById('salesChart').getContext('2d');
        new Chart(salesCtx, {
            type: 'line',
            data: {
                labels: {!! json_encode($chartLabels ?? []) !!},
                datasets: [{
                    label: 'Sales',
                    data: {!! json_encode($chartData ?? []) !!},
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 3,
                    pointBackgroundColor: '#3b82f6',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 1,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { 
                        beginAtZero: true, 
                        grid: { color: '#f3f4f6', drawBorder: false }, 
                        ticks: { color: '#9ca3af', font: { size: 11 }, padding: 10 }
                    },
                    x: { 
                        grid: { display: false, drawBorder: false }, 
                        ticks: { color: '#9ca3af', font: { size: 11 } }
                    }
                }
            }
        });

        // Order Distribution Doughnut Chart
        const distCtx = document.getElementById('distributionChart').getContext('2d');
        new Chart(distCtx, {
            type: 'doughnut',
            data: {
                labels: ['Pending', 'Completed', 'Processing'],
                datasets: [{
                    data: [
                        {{ $stats['pending_orders'] ?? 0 }},
                        {{ $stats['completed_orders'] ?? 0 }},
                        {{ $stats['processing_orders'] ?? 0 }}
                    ],
                    backgroundColor: ['#f59e0b', '#22c55e', '#3b82f6'],
                    borderWidth: 0,
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '70%',
                plugins: { legend: { display: false } }
            }
        });
    </script>
</body>
</html>
