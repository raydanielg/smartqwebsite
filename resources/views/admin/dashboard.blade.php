@extends('layouts.admin')

@section('title', 'SmartQ Admin Dashboard')

@section('content')
<div class="admin-dashboard">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-left">
            <h1 class="page-title">
                <i class="fas fa-tachometer-alt"></i>
                Dashboard
            </h1>
            <p class="page-subtitle">Welcome back! Here's what's happening with your store today.</p>
        </div>
        <div class="header-right">
            <a href="{{ route('shop') }}" class="btn btn-view-site">
                <i class="fas fa-external-link-alt"></i>
                View Store
            </a>
        </div>
    </div>

    <!-- Stats Cards Row 1 -->
    <div class="stats-grid">
        <div class="stat-card stat-users">
            <div class="stat-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-content">
                <div class="stat-value">{{ number_format($stats['users']) }}</div>
                <div class="stat-label">Total Users</div>
            </div>
        </div>

        <div class="stat-card stat-products">
            <div class="stat-icon">
                <i class="fas fa-box"></i>
            </div>
            <div class="stat-content">
                <div class="stat-value">{{ number_format($stats['products']) }}</div>
                <div class="stat-label">Products</div>
            </div>
        </div>

        <div class="stat-card stat-orders">
            <div class="stat-icon">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <div class="stat-content">
                <div class="stat-value">{{ number_format($stats['orders']) }}</div>
                <div class="stat-label">Total Orders</div>
            </div>
        </div>

        <div class="stat-card stat-revenue">
            <div class="stat-icon">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="stat-content">
                <div class="stat-value">${{ number_format($stats['revenue'], 2) }}</div>
                <div class="stat-label">Total Revenue</div>
            </div>
        </div>

        <div class="stat-card stat-manufacturers">
            <div class="stat-icon">
                <i class="fas fa-industry"></i>
            </div>
            <div class="stat-content">
                <div class="stat-value">{{ number_format($stats['manufacturers']) }}</div>
                <div class="stat-label">Manufacturers</div>
            </div>
        </div>

        <div class="stat-card stat-pending">
            <div class="stat-icon">
                <i class="fas fa-clock"></i>
            </div>
            <div class="stat-content">
                <div class="stat-value">{{ $stats['pending_orders'] ?? 0 }}</div>
                <div class="stat-label">Pending Orders</div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="charts-section">
        <!-- Activity Trend Chart -->
        <div class="chart-card chart-large">
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
            <div class="chart-body">
                <canvas id="salesChart" height="300"></canvas>
            </div>
        </div>

        <!-- Distribution Chart -->
        <div class="chart-card chart-small">
            <div class="chart-header">
                <h3 class="chart-title">
                    <i class="fas fa-chart-pie"></i>
                    Order Distribution
                </h3>
            </div>
            <div class="chart-body">
                <canvas id="distributionChart" height="280"></canvas>
            </div>
            <div class="chart-legend">
                <div class="legend-item">
                    <span class="legend-dot" style="background: #FF6A00;"></span>
                    <span class="legend-label">Pending</span>
                    <span class="legend-value">{{ $stats['pending_orders'] ?? 0 }}</span>
                </div>
                <div class="legend-item">
                    <span class="legend-dot" style="background: #4CAF50;"></span>
                    <span class="legend-label">Completed</span>
                    <span class="legend-value">{{ $stats['completed_orders'] ?? 0 }}</span>
                </div>
                <div class="legend-item">
                    <span class="legend-dot" style="background: #2196F3;"></span>
                    <span class="legend-label">Processing</span>
                    <span class="legend-value">{{ $stats['processing_orders'] ?? 0 }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity Section -->
    <div class="activity-section">
        <!-- Recent Orders -->
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
                            <td class="customer">{{ $order->user ? $order->user->name : 'Guest' }}</td>
                            <td class="amount">${{ number_format($order->grand_total, 2) }}</td>
                            <td>
                                <span class="status-badge status-{{ $order->status }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="date">{{ $order->created_at->format('M d, Y') }}</td>
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

        <!-- Recent Users -->
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
                        <div class="user-avatar">
                            {{ substr($user->name, 0, 1) }}
                        </div>
                        <div class="user-info">
                            <div class="user-name">{{ $user->name }}</div>
                            <div class="user-email">{{ $user->email }}</div>
                        </div>
                        <div class="user-date">
                            {{ $user->created_at->diffForHumans() }}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions & Inventory -->
    <div class="bottom-section">
        <!-- Quick Actions -->
        <div class="quick-actions">
            <h3 class="section-title">
                <i class="fas fa-bolt"></i>
                Quick Actions
            </h3>
            <div class="actions-grid">
                <a href="#" class="action-card">
                    <div class="action-icon" style="background: #FFF3E0;">
                        <i class="fas fa-plus" style="color: #FF6A00;"></i>
                    </div>
                    <span class="action-label">Add Product</span>
                </a>
                <a href="#" class="action-card">
                    <div class="action-icon" style="background: #E8F5E9;">
                        <i class="fas fa-tags" style="color: #4CAF50;"></i>
                    </div>
                    <span class="action-label">Add Category</span>
                </a>
                <a href="#" class="action-card">
                    <div class="action-icon" style="background: #E3F2FD;">
                        <i class="fas fa-percent" style="color: #2196F3;"></i>
                    </div>
                    <span class="action-label">Create Deal</span>
                </a>
                <a href="#" class="action-card">
                    <div class="action-icon" style="background: #F3E5F5;">
                        <i class="fas fa-user-plus" style="color: #9C27B0;"></i>
                    </div>
                    <span class="action-label">Add User</span>
                </a>
            </div>
        </div>

        <!-- Inventory Alert -->
        <div class="inventory-card">
            <h3 class="section-title">
                <i class="fas fa-bell"></i>
                Inventory Alerts
            </h3>
            @if(isset($lowStockProducts) && count($lowStockProducts) > 0)
            <div class="alerts-list">
                @foreach($lowStockProducts as $product)
                <div class="alert-item alert-low">
                    <i class="fas fa-exclamation-triangle"></i>
                    <span>{{ $product->name }} - Only {{ $product->stock }} left</span>
                </div>
                @endforeach
            </div>
            @else
            <div class="empty-state">
                <i class="fas fa-check-circle" style="color: #4CAF50;"></i>
                <p>All products are well stocked</p>
            </div>
            @endif
        </div>
    </div>
</div>

@push('styles')
<style>
    /* Admin Dashboard Styles */
    .admin-dashboard {
        padding: 24px;
        background: #F5F7FA;
        min-height: 100vh;
    }

    /* Page Header */
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 28px;
    }

    .header-left h1 {
        font-size: 28px;
        font-weight: 700;
        color: #1A1A2E;
        margin: 0 0 4px 0;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .page-subtitle {
        color: #6B7280;
        font-size: 14px;
        margin: 0;
    }

    .btn-view-site {
        background: #FF6A00;
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }

    .btn-view-site:hover {
        background: #E65C00;
        transform: translateY(-2px);
    }

    /* Stats Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        gap: 20px;
        margin-bottom: 28px;
    }

    @media (max-width: 1400px) {
        .stats-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 768px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    .stat-card {
        background: white;
        border-radius: 16px;
        padding: 20px;
        display: flex;
        align-items: center;
        gap: 16px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(0,0,0,0.08);
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

    .stat-users .stat-icon { background: #FFF3E0; color: #FF6A00; }
    .stat-products .stat-icon { background: #E8F5E9; color: #4CAF50; }
    .stat-orders .stat-icon { background: #E3F2FD; color: #2196F3; }
    .stat-revenue .stat-icon { background: #F3E5F5; color: #9C27B0; }
    .stat-manufacturers .stat-icon { background: #E0F2F1; color: #009688; }
    .stat-pending .stat-icon { background: #FFF8E1; color: #FFC107; }

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

    /* Charts Section */
    .charts-section {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 24px;
        margin-bottom: 28px;
    }

    @media (max-width: 1200px) {
        .charts-section {
            grid-template-columns: 1fr;
        }
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
        color: #FF6A00;
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
        transition: all 0.3s ease;
    }

    .filter-btn.active,
    .filter-btn:hover {
        background: #FF6A00;
        color: white;
        border-color: #FF6A00;
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

    .legend-label {
        color: #6B7280;
    }

    .legend-value {
        font-weight: 600;
        color: #1A1A2E;
    }

    /* Activity Section */
    .activity-section {
        display: grid;
        grid-template-columns: 1.5fr 1fr;
        gap: 24px;
        margin-bottom: 28px;
    }

    @media (max-width: 1200px) {
        .activity-section {
            grid-template-columns: 1fr;
        }
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
        color: #FF6A00;
    }

    .view-all {
        color: #FF6A00;
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .view-all:hover {
        text-decoration: underline;
    }

    .activity-body {
        padding: 0;
    }

    /* Activity Table */
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
        letter-spacing: 0.5px;
        background: #F9FAFB;
    }

    .activity-table td {
        padding: 14px 20px;
        border-bottom: 1px solid #F3F4F6;
        font-size: 14px;
    }

    .activity-table tr:last-child td {
        border-bottom: none;
    }

    .order-id {
        font-weight: 600;
        color: #FF6A00;
    }

    .customer {
        color: #374151;
        font-weight: 500;
    }

    .amount {
        font-weight: 600;
        color: #1A1A2E;
    }

    .date {
        color: #6B7280;
        font-size: 13px;
    }

    .status-badge {
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 500;
    }

    .status-pending { background: #FFF8E1; color: #F59E0B; }
    .status-processing { background: #E3F2FD; color: #2196F3; }
    .status-shipped { background: #E8F5E9; color: #4CAF50; }
    .status-delivered { background: #E8F5E9; color: #4CAF50; }
    .status-cancelled { background: #FEE2E2; color: #EF4444; }

    /* Users List */
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

    .user-item:last-child {
        border-bottom: none;
    }

    .user-avatar {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: linear-gradient(135deg, #FF6A00, #FF8C00);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        font-weight: 600;
    }

    .user-info {
        flex: 1;
    }

    .user-name {
        font-weight: 600;
        color: #1A1A2E;
        font-size: 14px;
    }

    .user-email {
        font-size: 13px;
        color: #6B7280;
    }

    .user-date {
        font-size: 12px;
        color: #9CA3AF;
    }

    /* Bottom Section */
    .bottom-section {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 24px;
    }

    @media (max-width: 1200px) {
        .bottom-section {
            grid-template-columns: 1fr;
        }
    }

    .section-title {
        font-size: 18px;
        font-weight: 600;
        color: #1A1A2E;
        margin: 0 0 20px 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .section-title i {
        color: #FF6A00;
    }

    /* Quick Actions */
    .quick-actions {
        background: white;
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    }

    .actions-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
    }

    @media (max-width: 768px) {
        .actions-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    .action-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 12px;
        padding: 20px;
        border-radius: 12px;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .action-card:hover {
        background: #F9FAFB;
        transform: translateY(-4px);
    }

    .action-icon {
        width: 56px;
        height: 56px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
    }

    .action-label {
        font-size: 14px;
        font-weight: 500;
        color: #374151;
    }

    /* Inventory Card */
    .inventory-card {
        background: white;
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    }

    .alerts-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .alert-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 14px;
        border-radius: 10px;
        font-size: 14px;
    }

    .alert-low {
        background: #FFF8E1;
        color: #F59E0B;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 40px;
        color: #9CA3AF;
    }

    .empty-state i {
        font-size: 48px;
        margin-bottom: 12px;
    }

    .empty-state p {
        margin: 0;
        font-size: 14px;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Sales Trend Chart
    const salesCtx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(salesCtx, {
        type: 'line',
        data: {
            labels: {!! json_encode($chartLabels ?? []) !!},
            datasets: [{
                label: 'Sales',
                data: {!! json_encode($chartData ?? []) !!},
                borderColor: '#FF6A00',
                backgroundColor: 'rgba(255, 106, 0, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4,
                pointRadius: 4,
                pointBackgroundColor: '#FF6A00',
                pointBorderColor: '#fff',
                pointBorderWidth: 2,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: '#F3F4F6'
                    },
                    ticks: {
                        color: '#6B7280',
                        font: { size: 12 }
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: '#6B7280',
                        font: { size: 12 }
                    }
                }
            }
        }
    });

    // Distribution Chart
    const distCtx = document.getElementById('distributionChart').getContext('2d');
    const distChart = new Chart(distCtx, {
        type: 'doughnut',
        data: {
            labels: ['Pending', 'Completed', 'Processing'],
            datasets: [{
                data: [
                    {{ $stats['pending_orders'] ?? 0 }},
                    {{ $stats['completed_orders'] ?? 0 }},
                    {{ $stats['processing_orders'] ?? 0 }}
                ],
                backgroundColor: ['#FF6A00', '#4CAF50', '#2196F3'],
                borderWidth: 0,
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
</script>
@endpush
@endsection

    <!-- Stats Cards -->
    <div class="row">
        <!-- Users Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Users</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['users'] }}</div>
                        </div>
                        <div class="col-auto">
                            <div class="icon-circle bg-primary">
                                <i class="fas fa-users text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Products</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['products'] }}</div>
                        </div>
                        <div class="col-auto">
                            <div class="icon-circle bg-success">
                                <i class="fas fa-box text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Orders Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Orders</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['orders'] }}</div>
                        </div>
                        <div class="col-auto">
                            <div class="icon-circle bg-info">
                                <i class="fas fa-shopping-cart text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Manufacturers Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Manufacturers</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['manufacturers'] }}</div>
                        </div>
                        <div class="col-auto">
                            <div class="icon-circle bg-warning">
                                <i class="fas fa-industry text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Recent Users -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-user-plus mr-2"></i>Recent Users
                    </h6>
                    <a href="{{ route('admin.users') }}" class="btn btn-sm btn-primary">View All</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Joined</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentUsers as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->roles->first())
                                            <span class="badge" style="background-color: {{ $user->roles->first()->color }}">
                                                <i class="{{ $user->roles->first()->icon }} mr-1"></i>
                                                {{ $user->roles->first()->display_name }}
                                            </span>
                                        @else
                                            <span class="badge badge-secondary">No Role</span>
                                        @endif
                                    </td>
                                    <td>{{ $user->created_at->format('M d, Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Products -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-success">
                        <i class="fas fa-box mr-2"></i>Recent Products
                    </h6>
                    <a href="{{ route('admin.products') }}" class="btn btn-sm btn-success">View All</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentProducts as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->name ?? 'N/A' }}</td>
                                    <td>${{ number_format($product->price, 2) }}</td>
                                    <td>{{ $product->stock_quantity }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-bolt mr-2"></i>Quick Actions
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-block">
                                <i class="fas fa-user-plus mr-2"></i>Add User
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.products') }}" class="btn btn-success btn-block">
                                <i class="fas fa-box mr-2"></i>Manage Products
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.manufacturers') }}" class="btn btn-info btn-block">
                                <i class="fas fa-industry mr-2"></i>Manufacturers
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.settings') }}" class="btn btn-warning btn-block">
                                <i class="fas fa-cog mr-2"></i>Settings
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
