@extends('layouts.admin')

@section('title', 'Dashboard - Smart Q Store')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
<style>
    /* Font from auth pages */
    .admin-content {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
    }

    /* Stats Grid - Powerful Styling */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 16px;
        margin-bottom: 20px;
    }

    /* KPI Cards - Powerful */
    .stat-card {
        background: white;
        border-radius: 16px;
        padding: 20px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        border: 1px solid rgba(0,0,0,0.02);
    }
    
    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 30px rgba(0,0,0,0.12);
    }

    .kpi-card {
        display: flex;
        gap: 16px;
        align-items: center;
    }
    
    .kpi-ico {
        width: 56px;
        height: 56px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex: 0 0 auto;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    
    .kpi-ico i {
        font-size: 24px;
    }
    
    /* Color Variants for Icons */
    .kpi-ico.users { background: linear-gradient(135deg, #FFC107, #FF9800); color: white; }
    .kpi-ico.products { background: linear-gradient(135deg, #FF9800, #FF5722); color: white; }
    .kpi-ico.orders { background: linear-gradient(135deg, #FF5722, #E91E63); color: white; }
    .kpi-ico.revenue { background: linear-gradient(135deg, #4CAF50, #8BC34A); color: white; }
    .kpi-ico.manufacturers { background: linear-gradient(135deg, #2196F3, #03A9F4); color: white; }
    .kpi-ico.pending { background: linear-gradient(135deg, #9C27B0, #E91E63); color: white; }
    
    .stats-grid .stat-details {
        min-width: 0;
        flex: 1;
    }
    
    .stats-grid .stat-value {
        margin: 0;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        font-size: 28px;
        font-weight: 800;
        color: #1a1a2e;
        letter-spacing: -0.5px;
    }
    
    .stats-grid .stat-label {
        margin: 4px 0 0 0;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        font-size: 12px;
        color: #6b7280;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Content Cards - Powerful */
    .content-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        border: 1px solid rgba(0,0,0,0.02);
        overflow: hidden;
    }
    
    .content-card:hover {
        box-shadow: 0 6px 24px rgba(0,0,0,0.1);
    }
    
    .content-card .card-header {
        padding: 20px 20px 16px 20px;
        margin-bottom: 0;
        background: none;
        border: none;
        border-bottom: 1px solid #f3f4f6;
    }
    
    .content-card .card-header h3 {
        font-size: 18px;
        font-weight: 700;
        color: #1a1a2e;
        margin: 0;
    }

    /* Admin Table */
    .admin-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 13px;
    }
    
    .admin-table th {
        text-align: left;
        padding: 12px 16px;
        font-size: 11px;
        font-weight: 600;
        color: #6b7280;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        background: #f9fafb;
        border-bottom: 1px solid #f3f4f6;
    }
    
    .admin-table td {
        padding: 12px 16px;
        border-bottom: 1px solid #f9fafb;
    }
    
    .admin-table tr:last-child td {
        border-bottom: none;
    }

    /* Badges */
    .badge {
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
    }
    
    .badge.status-completed {
        background: #fef3c7;
        color: #d97706;
    }
    
    .badge.status-pending {
        background: #ffedd5;
        color: #ea580c;
    }
    
    .badge.status-processing {
        background: #dbeafe;
        color: #2563eb;
    }

    @media (max-width: 576px) {
        .kpi-card {
            gap: 10px;
        }
        .kpi-ico {
            width: 40px;
            height: 40px;
            border-radius: 12px;
        }
        .stats-grid .stat-value {
            font-size: 18px;
        }
        .stats-grid .stat-label {
            font-size: 11px;
        }
    }
</style>
@endpush

@section('content')
<!-- Stats Grid - Gold/Yellow Theme -->
<div class="stats-grid" style="margin-bottom:14px; display:grid; grid-template-columns:repeat(auto-fit, minmax(200px, 1fr)); gap:12px; align-items:stretch;">
    <!-- Users -->
    <div class="stat-card content-card animate__animated animate__fadeInUp" style="animation-delay:40ms; padding:16px;">
        <div class="kpi-card">
            <div class="kpi-ico" style="background:rgba(255,193,7,0.15); color:#f59e0b;">
                <i class="fa-solid fa-users"></i>
            </div>
            <div class="stat-details">
                <h3 class="stat-value">{{ number_format($stats['users'] ?? 0) }}</h3>
                <p class="stat-label">Total Users</p>
            </div>
        </div>
    </div>
    
    <!-- Products -->
    <div class="stat-card content-card animate__animated animate__fadeInUp" style="animation-delay:80ms; padding:16px;">
        <div class="kpi-card">
            <div class="kpi-ico" style="background:rgba(255,152,0,0.15); color:#ff9800;">
                <i class="fa-solid fa-box"></i>
            </div>
            <div class="stat-details">
                <h3 class="stat-value">{{ number_format($stats['products'] ?? 0) }}</h3>
                <p class="stat-label">Products</p>
            </div>
        </div>
    </div>
    
    <!-- Orders -->
    <div class="stat-card content-card animate__animated animate__fadeInUp" style="animation-delay:120ms; padding:16px;">
        <div class="kpi-card">
            <div class="kpi-ico" style="background:rgba(255,87,34,0.15); color:#ff5722;">
                <i class="fa-solid fa-shopping-cart"></i>
            </div>
            <div class="stat-details">
                <h3 class="stat-value">{{ number_format($stats['orders'] ?? 0) }}</h3>
                <p class="stat-label">Total Orders</p>
            </div>
        </div>
    </div>
    
    <!-- Revenue -->
    <div class="stat-card content-card animate__animated animate__fadeInUp" style="animation-delay:160ms; padding:16px;">
        <div class="kpi-card">
            <div class="kpi-ico" style="background:rgba(76,175,80,0.15); color:#4caf50;">
                <i class="fa-solid fa-dollar-sign"></i>
            </div>
            <div class="stat-details">
                <h3 class="stat-value">${{ number_format($stats['revenue'] ?? 0, 0) }}</h3>
                <p class="stat-label">Total Revenue</p>
            </div>
        </div>
    </div>
    
    <!-- Manufacturers -->
    <div class="stat-card content-card animate__animated animate__fadeInUp" style="animation-delay:200ms; padding:16px;">
        <div class="kpi-card">
            <div class="kpi-ico" style="background:rgba(33,150,243,0.15); color:#2196f3;">
                <i class="fa-solid fa-industry"></i>
            </div>
            <div class="stat-details">
                <h3 class="stat-value">{{ number_format($stats['manufacturers'] ?? 0) }}</h3>
                <p class="stat-label">Manufacturers</p>
            </div>
        </div>
    </div>
    
    <!-- Pending Orders -->
    <div class="stat-card content-card animate__animated animate__fadeInUp" style="animation-delay:240ms; padding:16px;">
        <div class="kpi-card">
            <div class="kpi-ico" style="background:rgba(156,39,176,0.15); color:#9c27b0;">
                <i class="fa-solid fa-clock"></i>
            </div>
            <div class="stat-details">
                <h3 class="stat-value">{{ $stats['pending_orders'] ?? 0 }}</h3>
                <p class="stat-label">Pending Orders</p>
            </div>
        </div>
    </div>
</div>

<!-- Charts Section -->
<div style="display:grid; grid-template-columns: 1.25fr 0.75fr; gap:14px; margin-bottom:14px;">
    <div class="content-card animate__animated animate__fadeIn" style="padding:16px; animation-delay:120ms;">
        <div class="card-header"><h3>Activity Trend (Last 14 Days)</h3></div>
        <div style="position:relative; height:260px;">
            <canvas id="lineChart" style="display:block; width:100%; height:100%;"></canvas>
        </div>
    </div>

    <div class="content-card animate__animated animate__fadeIn" style="padding:16px; animation-delay:160ms;">
        <div class="card-header"><h3>Distribution</h3></div>
        <div style="position:relative; height:260px;">
            <canvas id="pieChart" style="display:block; width:100%; height:100%;"></canvas>
        </div>
    </div>
</div>

<!-- Recent Orders & Users -->
<div style="display:grid; grid-template-columns: 1fr 1fr; gap:14px; margin-bottom:14px;">
    <!-- Recent Orders -->
    <div class="content-card animate__animated animate__fadeInUp" style="padding:16px; animation-delay:80ms;">
        <div class="card-header"><h3>Recent Orders</h3></div>
        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th style="width:100px;">Order #</th>
                        <th>Customer</th>
                        <th style="width:100px;">Status</th>
                        <th style="width:120px; text-align:right;">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentOrders ?? [] as $order)
                        <tr>
                            <td style="font-weight:600; color:#f59e0b;">#{{ $order->order_number }}</td>
                            <td>{{ $order->user ? $order->user->name : 'Guest' }}</td>
                            <td>
                                <span class="badge status-{{ $order->status }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td style="text-align:right; font-weight:600;">${{ number_format($order->grand_total, 2) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="text-align:center; color:#6b7280; padding:18px;">No orders yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Recent Users -->
    <div class="content-card animate__animated animate__fadeInUp" style="padding:16px; animation-delay:120ms;">
        <div class="card-header"><h3>Recent Users</h3></div>
        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th style="width:180px;">Email</th>
                        <th style="width:120px;">Joined</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentUsers ?? [] as $user)
                        <tr>
                            <td style="font-weight:600;">{{ $user->name }}</td>
                            <td style="color:#6b7280;">{{ $user->email }}</td>
                            <td style="color:#6b7280;">{{ $user->created_at->diffForHumans() }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" style="text-align:center; color:#6b7280; padding:18px;">No users yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<script>
    // Line Chart - Activity Trend
    const lineEl = document.getElementById('lineChart');
    if (lineEl && window.Chart) {
        const chartLabels = {!! json_encode($chartLabels ?? []) !!};
        const chartData = {!! json_encode($chartData ?? []) !!};
        
        new Chart(lineEl, {
            type: 'line',
            data: {
                labels: chartLabels.length ? chartLabels : ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Sales',
                    data: chartData.length ? chartData : [0, 0, 0, 0, 0, 0, 0],
                    borderColor: '#FFC107',
                    backgroundColor: 'rgba(255, 193, 7, 0.15)',
                    tension: 0.35,
                    fill: true,
                    pointRadius: 3,
                    pointBackgroundColor: '#FFC107',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 1,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { 
                    legend: { display: false }
                },
                scales: { 
                    y: { 
                        beginAtZero: true,
                        grid: { color: '#f3f4f6' },
                        ticks: { color: '#9ca3af', font: { size: 11 } }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { color: '#9ca3af', font: { size: 11 } }
                    }
                }
            }
        });
    }

    // Pie Chart - Order Distribution
    const pieEl = document.getElementById('pieChart');
    if (pieEl && window.Chart) {
        const pending = {{ $stats['pending_orders'] ?? 0 }};
        const processing = {{ $stats['processing_orders'] ?? 0 }};
        const completed = {{ $stats['completed_orders'] ?? 0 }};
        
        const total = pending + processing + completed;
        const labels = total > 0 ? ['Pending', 'Processing', 'Completed'] : ['No data'];
        const values = total > 0 ? [pending, processing, completed] : [1];
        const colors = total > 0 
            ? ['#FFC107', '#2196F3', '#4CAF50'] 
            : ['#e5e7eb'];
        
        new Chart(pieEl, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: values,
                    backgroundColor: colors,
                    borderWidth: 0,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { 
                    legend: { 
                        position: 'bottom',
                        labels: { usePointStyle: true, padding: 15, font: { size: 11 } }
                    }
                },
                cutout: '65%'
            }
        });
    }
</script>
@endpush
