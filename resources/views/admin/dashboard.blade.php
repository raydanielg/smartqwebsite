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
            font-family: 'Inter', sans-serif;
            background: #e8e8ec;
            color: #1a1a2e;
            min-height: 100vh;
        }
        
        /* Layout */
        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }
        
        /* Sidebar */
        .admin-sidebar {
            width: 260px;
            background: #f5f5f5;
            border-right: 1px solid #e0e0e0;
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 1000;
        }
        
        .sidebar-brand {
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid #e0e0e0;
            flex-shrink: 0;
        }
        
        .brand-logo {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #FFC107, #FF8F00);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
        }
        
        .brand-name {
            font-size: 18px;
            font-weight: 700;
            color: #1a1a2e;
        }
        
        .brand-tagline {
            font-size: 10px;
            color: #FFA000;
            font-weight: 600;
            letter-spacing: 1px;
        }
        
        .sidebar-nav {
            padding: 16px 12px;
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }
        
        .nav-section {
            margin-bottom: 8px;
        }
        
        .nav-section:last-child {
            margin-top: auto;
            margin-bottom: 0;
        }
        
        .nav-label {
            font-size: 10px;
            font-weight: 600;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 0 12px;
            margin-bottom: 8px;
            display: block;
        }
        
        .nav-list {
            list-style: none;
        }
        
        .nav-item {
            margin-bottom: 4px;
        }
        
        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px;
            border-radius: 10px;
            text-decoration: none;
            color: #1a1a2e;
            transition: all 0.2s ease;
        }
        
        .nav-link:hover {
            background: #e8e8e8;
        }
        
        .nav-item.active .nav-link {
            background: linear-gradient(135deg, #FFC107, #FFA000);
            color: white;
            box-shadow: 0 4px 12px rgba(255, 193, 7, 0.3);
        }
        
        .nav-icon {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 14px;
        }
        
        .nav-text {
            font-size: 14px;
            font-weight: 500;
        }
        
        /* Main Content */
        .admin-main {
            flex: 1;
            margin-left: 260px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        /* Header */
        .admin-header {
            background: white;
            padding: 16px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e0e0e0;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .page-title {
            font-size: 24px;
            font-weight: 600;
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
            background: #e8e8ec;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6b7280;
            font-size: 16px;
            position: relative;
            cursor: pointer;
        }
        
        .notification-badge {
            position: absolute;
            top: -4px;
            right: -4px;
            width: 18px;
            height: 18px;
            background: #f44336;
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
            color: #1a1a2e;
        }
        
        .avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, #FFC107, #FFA000);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 14px;
        }
        
        .user-info {
            display: flex;
            flex-direction: column;
        }
        
        .user-name {
            font-size: 14px;
            font-weight: 600;
        }
        
        .user-role {
            font-size: 11px;
            color: #6b7280;
        }
        
        /* Content */
        .admin-content {
            flex: 1;
            padding: 24px;
        }
        
        /* Dashboard Specific */
        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }
        
        .dashboard-title {
            font-size: 24px;
            font-weight: 600;
            color: #1A1A2E;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .dashboard-title i {
            color: #FFC107;
        }
        
        .btn-view-site {
            background: linear-gradient(135deg, #FFC107, #FFA000);
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-view-site:hover {
            color: white;
            text-decoration: none;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 193, 7, 0.3);
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 20px;
            margin-bottom: 28px;
        }
        
        @media (max-width: 1400px) {
            .stats-grid { grid-template-columns: repeat(3, 1fr); }
        }
        
        @media (max-width: 768px) {
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
            .admin-sidebar { display: none; }
            .admin-main { margin-left: 0; }
        }
        
        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 16px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }
        
        .stat-icon {
            width: 56px;
            height: 56px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }
        
        .stat-users .stat-icon { background: #FFF8E1; color: #FFA000; }
        .stat-products .stat-icon { background: #E8F5E9; color: #4CAF50; }
        .stat-orders .stat-icon { background: #E3F2FD; color: #2196F3; }
        .stat-revenue .stat-icon { background: #FFF3E0; color: #FF8F00; }
        .stat-manufacturers .stat-icon { background: #E0F2F1; color: #009688; }
        .stat-pending .stat-icon { background: #FFECB3; color: #FF6F00; }
        
        .stat-value {
            font-size: 28px;
            font-weight: 700;
            color: #1A1A2E;
            line-height: 1;
        }
        
        .stat-label {
            font-size: 13px;
            color: #6B7280;
            margin-top: 4px;
        }
        
        .stat-content {
            flex: 1;
        }
        
        .charts-section {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 24px;
            margin-bottom: 28px;
        }
        
        @media (max-width: 1200px) {
            .charts-section { grid-template-columns: 1fr; }
        }
        
        .chart-card {
            background: white;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }
        
        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .chart-title {
            font-size: 18px;
            font-weight: 600;
            color: #1A1A2E;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .chart-title i {
            color: #FFC107;
        }
        
        .chart-filters {
            display: flex;
            gap: 8px;
        }
        
        .filter-btn {
            padding: 6px 14px;
            border: 1px solid #E5E7EB;
            background: white;
            border-radius: 6px;
            font-size: 13px;
            cursor: pointer;
        }
        
        .filter-btn.active,
        .filter-btn:hover {
            background: linear-gradient(135deg, #FFC107, #FFA000);
            color: white;
            border-color: #FFC107;
        }
        
        .chart-legend {
            display: flex;
            justify-content: center;
            gap: 24px;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #E5E7EB;
        }
        
        .legend-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
        }
        
        .legend-dot {
            width: 12px;
            height: 12px;
            border-radius: 3px;
        }
        
        .activity-section {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 24px;
        }
        
        @media (max-width: 1200px) {
            .activity-section { grid-template-columns: 1fr; }
        }
        
        .activity-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            overflow: hidden;
        }
        
        .activity-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 24px;
            border-bottom: 1px solid #E5E7EB;
        }
        
        .activity-title {
            font-size: 18px;
            font-weight: 600;
            color: #1A1A2E;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .activity-title i {
            color: #FFC107;
        }
        
        .view-all {
            color: #FFA000;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
        }
        
        .activity-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .activity-table th {
            text-align: left;
            padding: 14px 20px;
            font-size: 12px;
            font-weight: 600;
            color: #6B7280;
            text-transform: uppercase;
            background: #F9FAFB;
        }
        
        .activity-table td {
            padding: 14px 20px;
            border-bottom: 1px solid #F3F4F6;
            font-size: 14px;
        }
        
        .order-id {
            font-weight: 600;
            color: #FFA000;
        }
        
        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }
        
        .status-pending { background: #FFF8E1; color: #F59E0B; }
        .status-processing { background: #E3F2FD; color: #2196F3; }
        .status-completed { background: #E8F5E9; color: #4CAF50; }
        
        .users-list {
            padding: 16px;
        }
        
        .user-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px;
            border-bottom: 1px solid #F3F4F6;
        }
        
        .user-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: linear-gradient(135deg, #FFC107, #FFA000);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            font-weight: 600;
        }
        
        .empty-state {
            text-align: center;
            padding: 40px;
            color: #9CA3AF;
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
                            <a href="{{ route(''admin.dashboard'') }}" class="nav-link">
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
                        <li class="nav-item">
                            <a href="{{ route(''admin.products'') }}" class="nav-link">
                                <div class="nav-icon" style="background: linear-gradient(135deg, #4CAF50, #8BC34A);">
                                    <i class="fas fa-box"></i>
                                </div>
                                <span class="nav-text">Products</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route(''admin.manufacturers'') }}" class="nav-link">
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
                        <li class="nav-item">
                            <a href="{{ route(''admin.users'') }}" class="nav-link">
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
                        <li class="nav-item">
                            <a href="{{ route(''admin.roles'') }}" class="nav-link">
                                <div class="nav-icon" style="background: linear-gradient(135deg, #607D8B, #9E9E9E);">
                                    <i class="fas fa-user-shield"></i>
                                </div>
                                <span class="nav-text">Roles</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route(''admin.settings'') }}" class="nav-link">
                                <div class="nav-icon" style="background: linear-gradient(135deg, #795548, #8D6E63);">
                                    <i class="fas fa-cog"></i>
                                </div>
                                <span class="nav-text">Settings</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route(''admin.super.dashboard'') }}" class="nav-link">
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
                        <li class="nav-item">
                            <a href="{{ route(''logout'') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById(''logout-form'').submit();">
                                <div class="nav-icon" style="background: linear-gradient(135deg, #f44336, #e91e63);">
                                    <i class="fas fa-sign-out-alt"></i>
                                </div>
                                <span class="nav-text">Sign Out</span>
                            </a>
                            <form id="logout-form" action="{{ route(''logout'') }}" method="POST" class="d-none">
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
                            <div class="avatar">{{ substr(Auth::user()->name ?? ''A'', 0, 1) }}</div>
                            <div class="user-info">
                                <span class="user-name">{{ Auth::user()->name ?? ''Admin'' }}</span>
                                <span class="user-role">{{ Auth::user()->highestRole()->display_name ?? ''Administrator'' }}</span>
                            </div>
                            <i class="fas fa-chevron-down" style="color: #6b7280; font-size: 12px;"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route(''landing'') }}">
                                <i class="fas fa-store"></i> View Shop
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route(''logout'') }}" onclick="event.preventDefault(); document.getElementById(''logout-form-header'').submit();">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                            <form id="logout-form-header" action="{{ route(''logout'') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <main class="admin-content">
                <div class="dashboard-header">
                    <div>
                        <h1 class="dashboard-title">
                            <i class="fas fa-tachometer-alt"></i>
                            Dashboard
                        </h1>
                        <p style="color: #6b7280; margin: 8px 0 0 0;">Welcome back! Here''s what''s happening with your store today.</p>
                    </div>
                    <a href="{{ route(''shop'') }}" class="btn-view-site">
                        <i class="fas fa-external-link-alt"></i>
                        View Store
                    </a>
                </div>

                <!-- Stats -->
                <div class="stats-grid">
                    <div class="stat-card stat-users">
                        <div class="stat-icon"><i class="fas fa-users"></i></div>
                        <div class="stat-content">
                            <div class="stat-value">{{ number_format($stats[''users'']) }}</div>
                            <div class="stat-label">Total Users</div>
                        </div>
                    </div>
                    <div class="stat-card stat-products">
                        <div class="stat-icon"><i class="fas fa-box"></i></div>
                        <div class="stat-content">
                            <div class="stat-value">{{ number_format($stats[''products'']) }}</div>
                            <div class="stat-label">Products</div>
                        </div>
                    </div>
                    <div class="stat-card stat-orders">
                        <div class="stat-icon"><i class="fas fa-shopping-cart"></i></div>
                        <div class="stat-content">
                            <div class="stat-value">{{ number_format($stats[''orders'']) }}</div>
                            <div class="stat-label">Total Orders</div>
                        </div>
                    </div>
                    <div class="stat-card stat-revenue">
                        <div class="stat-icon"><i class="fas fa-dollar-sign"></i></div>
                        <div class="stat-content">
                            <div class="stat-value">${{ number_format($stats[''revenue''], 2) }}</div>
                            <div class="stat-label">Total Revenue</div>
                        </div>
                    </div>
                    <div class="stat-card stat-manufacturers">
                        <div class="stat-icon"><i class="fas fa-industry"></i></div>
                        <div class="stat-content">
                            <div class="stat-value">{{ number_format($stats[''manufacturers'']) }}</div>
                            <div class="stat-label">Manufacturers</div>
                        </div>
                    </div>
                    <div class="stat-card stat-pending">
                        <div class="stat-icon"><i class="fas fa-clock"></i></div>
                        <div class="stat-content">
                            <div class="stat-value">{{ $stats[''pending_orders''] ?? 0 }}</div>
                            <div class="stat-label">Pending Orders</div>
                        </div>
                    </div>
                </div>

                <!-- Charts -->
                <div class="charts-section">
                    <div class="chart-card">
                        <div class="chart-header">
                            <h3 class="chart-title">
                                <i class="fas fa-chart-line"></i>
                                Sales Trend (Last 14 Days)
                            </h3>
                            <div class="chart-filters">
                                <button class="filter-btn active">14 Days</button>
                                <button class="filter-btn">30 Days</button>
                                <button class="filter-btn">90 Days</button>
                            </div>
                        </div>
                        <canvas id="salesChart" height="300"></canvas>
                    </div>
                    <div class="chart-card">
                        <div class="chart-header">
                            <h3 class="chart-title">
                                <i class="fas fa-chart-pie"></i>
                                Order Distribution
                            </h3>
                        </div>
                        <canvas id="distributionChart" height="280"></canvas>
                        <div class="chart-legend">
                            <div class="legend-item">
                                <span class="legend-dot" style="background: #FFC107;"></span>
                                <span class="legend-label">Pending</span>
                                <span style="font-weight: 600;">{{ $stats[''pending_orders''] ?? 0 }}</span>
                            </div>
                            <div class="legend-item">
                                <span class="legend-dot" style="background: #4CAF50;"></span>
                                <span class="legend-label">Completed</span>
                                <span style="font-weight: 600;">{{ $stats[''completed_orders''] ?? 0 }}</span>
                            </div>
                            <div class="legend-item">
                                <span class="legend-dot" style="background: #2196F3;"></span>
                                <span class="legend-label">Processing</span>
                                <span style="font-weight: 600;">{{ $stats[''processing_orders''] ?? 0 }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Activity -->
                <div class="activity-section">
                    <div class="activity-card">
                        <div class="activity-header">
                            <h3 class="activity-title">
                                <i class="fas fa-shopping-bag"></i>
                                Recent Orders
                            </h3>
                            <a href="#" class="view-all">View All <i class="fas fa-arrow-right"></i></a>
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
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentOrders as $order)
                                    <tr>
                                        <td class="order-id">#{{ $order->order_number }}</td>
                                        <td>{{ $order->user ? $order->user->name : ''Guest'' }}</td>
                                        <td>${{ number_format($order->grand_total, 2) }}</td>
                                        <td>
                                            <span class="status-badge status-{{ $order->status }}">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        </td>
                                        <td style="color: #6b7280; font-size: 13px;">{{ $order->created_at->format(''M d, Y'') }}</td>
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
                            <h3 class="activity-title">
                                <i class="fas fa-user-plus"></i>
                                Recent Users
                            </h3>
                            <a href="#" class="view-all">View All <i class="fas fa-arrow-right"></i></a>
                        </div>
                        <div class="activity-body">
                            <div class="users-list">
                                @foreach($recentUsers as $user)
                                <div class="user-item">
                                    <div class="user-avatar">{{ substr($user->name, 0, 1) }}</div>
                                    <div class="user-info">
                                        <div class="user-name">{{ $user->name }}</div>
                                        <div style="font-size: 13px; color: #6b7280;">{{ $user->email }}</div>
                                    </div>
                                    <div style="font-size: 12px; color: #9ca3af;">{{ $user->created_at->diffForHumans() }}</div>
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
        // Sales Chart
        const salesCtx = document.getElementById(''salesChart'').getContext(''2d'');
        new Chart(salesCtx, {
            type: ''line'',
            data: {
                labels: {!! json_encode($chartLabels ?? []) !!},
                datasets: [{
                    label: ''Sales'',
                    data: {!! json_encode($chartData ?? []) !!},
                    borderColor: ''#FFC107'',
                    backgroundColor: ''rgba(255, 193, 7, 0.1)'',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 4,
                    pointBackgroundColor: ''#FFC107'',
                    pointBorderColor: ''#fff'',
                    pointBorderWidth: 2,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: true, grid: { color: ''#F3F4F6'' }, ticks: { color: ''#6B7280'' } },
                    x: { grid: { display: false }, ticks: { color: ''#6B7280'' } }
                }
            }
        });

        // Distribution Chart
        const distCtx = document.getElementById(''distributionChart'').getContext(''2d'');
        new Chart(distCtx, {
            type: ''doughnut'',
            data: {
                labels: [''Pending'', ''Completed'', ''Processing''],
                datasets: [{
                    data: [
                        {{ $stats[''pending_orders''] ?? 0 }},
                        {{ $stats[''completed_orders''] ?? 0 }},
                        {{ $stats[''processing_orders''] ?? 0 }}
                    ],
                    backgroundColor: [''#FFC107'', ''#4CAF50'', ''#2196F3''],
                    borderWidth: 0,
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: ''70%'',
                plugins: { legend: { display: false } }
            }
        });
    </script>
</body>
</html>
