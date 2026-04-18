@extends('layouts.admin')

@section('title', 'Dashboard - Smart Q Store')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
<style>
    /* Font style matching frontend */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');
    
    .admin-content {
        font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    /* Stats Grid - Powerful Styling */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        gap: 16px;
        margin-bottom: 24px;
    }
    
    @media (max-width: 1400px) {
        .stats-grid { grid-template-columns: repeat(3, 1fr); }
    }
    
    @media (max-width: 768px) {
        .stats-grid { grid-template-columns: repeat(2, 1fr); gap: 12px; }
    }
    
    @media (max-width: 480px) {
        .stats-grid { grid-template-columns: 1fr; }
    }

    /* KPI Cards - Clean Malkia Style */
    .stat-card {
        background: white;
        border-radius: 16px;
        padding: 20px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        transition: all 0.3s ease;
        border: 1px solid #f1f5f9;
    }
    
    .stat-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(0,0,0,0.1);
        border-color: #e2e8f0;
    }

    .kpi-card {
        display: flex;
        gap: 14px;
        align-items: flex-start;
    }
    
    .kpi-ico {
        width: 44px;
        height: 44px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex: 0 0 auto;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
    }
    
    .kpi-ico i {
        font-size: 20px;
    }
    
    /* Soft Color Variants for Icons - Malkia Style */
    .kpi-ico.users { 
        background: #dbeafe;
        border-color: #bfdbfe;
        color: #2563eb;
    }
    .kpi-ico.products { 
        background: #fef3c7;
        border-color: #fde68a;
        color: #d97706;
    }
    .kpi-ico.orders { 
        background: #fee2e2;
        border-color: #fecaca;
        color: #dc2626;
    }
    .kpi-ico.revenue { 
        background: #d1fae5;
        border-color: #a7f3d0;
        color: #059669;
    }
    .kpi-ico.manufacturers { 
        background: #e0e7ff;
        border-color: #c7d2fe;
        color: #4f46e5;
    }
    .kpi-ico.pending { 
        background: #fce7f3;
        border-color: #fbcfe8;
        color: #db2777;
    }
    
    .stats-grid .stat-details {
        min-width: 0;
        flex: 1;
        padding-top: 2px;
    }
    
    .stats-grid .stat-value {
        margin: 0 0 2px 0;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        font-size: 22px;
        font-weight: 700;
        color: #1e293b;
        letter-spacing: -0.3px;
        font-family: 'Poppins', sans-serif;
        line-height: 1.2;
    }
    
    .stats-grid .stat-label {
        margin: 0;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        font-size: 12px;
        color: #64748b;
        font-weight: 500;
        letter-spacing: 0.2px;
        font-family: 'Poppins', sans-serif;
    }

    /* Content Cards - Clean Malkia Style */
    .content-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        border: 1px solid #f1f5f9;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    
    .content-card:hover {
        box-shadow: 0 8px 24px rgba(0,0,0,0.1);
        border-color: #e2e8f0;
    }
    
    .content-card .card-header {
        padding: 16px 20px;
        margin-bottom: 0;
        background: none;
        border: none;
        border-bottom: 1px solid #f1f5f9;
    }
    
    .content-card .card-header h3 {
        font-size: 16px;
        font-weight: 600;
        color: #1e293b;
        margin: 0;
        font-family: 'Poppins', sans-serif;
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

    @media (max-width: 768px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }
        .stat-card {
            padding: 16px;
        }
        .kpi-card {
            gap: 12px;
        }
        .kpi-ico {
            width: 40px;
            height: 40px;
            border-radius: 8px;
        }
        .kpi-ico i {
            font-size: 18px;
        }
        .stats-grid .stat-value {
            font-size: 20px;
        }
        .stats-grid .stat-label {
            font-size: 11px;
        }
    }
    
    @media (max-width: 480px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }
        .kpi-ico {
            width: 38px;
            height: 38px;
        }
        .kpi-ico i {
            font-size: 16px;
        }
        .stats-grid .stat-value {
            font-size: 18px;
        }
    }
</style>
@endsection

@section('content')
<!-- Stats Grid - Gold/Yellow Theme -->
<div class="stats-grid">
    <!-- Users -->
    <div class="stat-card animate__animated animate__fadeInUp" style="animation-delay:40ms;">
        <div class="kpi-card">
            <div class="kpi-ico users">
                <i class="fa-solid fa-users"></i>
            </div>
            <div class="stat-details">
                <h3 class="stat-value">{{ number_format($stats['users'] ?? 0) }}</h3>
                <p class="stat-label">Total Users</p>
            </div>
        </div>
    </div>
    
    <!-- Products -->
    <div class="stat-card animate__animated animate__fadeInUp" style="animation-delay:80ms;">
        <div class="kpi-card">
            <div class="kpi-ico products">
                <i class="fa-solid fa-box"></i>
            </div>
            <div class="stat-details">
                <h3 class="stat-value">{{ number_format($stats['products'] ?? 0) }}</h3>
                <p class="stat-label">Products</p>
            </div>
        </div>
    </div>
    
    <!-- Orders -->
    <div class="stat-card animate__animated animate__fadeInUp" style="animation-delay:120ms;">
        <div class="kpi-card">
            <div class="kpi-ico orders">
                <i class="fa-solid fa-shopping-cart"></i>
            </div>
            <div class="stat-details">
                <h3 class="stat-value">{{ number_format($stats['orders'] ?? 0) }}</h3>
                <p class="stat-label">Total Orders</p>
            </div>
        </div>
    </div>
    
    <!-- Revenue -->
    <div class="stat-card animate__animated animate__fadeInUp" style="animation-delay:160ms;">
        <div class="kpi-card">
            <div class="kpi-ico revenue">
                <i class="fa-solid fa-money-bill-wave"></i>
            </div>
            <div class="stat-details">
                <h3 class="stat-value">TZS {{ number_format($stats['revenue'] ?? 0, 0) }}</h3>
                <p class="stat-label">Total Revenue</p>
            </div>
        </div>
    </div>
    
    <!-- Manufacturers -->
    <div class="stat-card animate__animated animate__fadeInUp" style="animation-delay:200ms;">
        <div class="kpi-card">
            <div class="kpi-ico manufacturers">
                <i class="fa-solid fa-industry"></i>
            </div>
            <div class="stat-details">
                <h3 class="stat-value">{{ number_format($stats['manufacturers'] ?? 0) }}</h3>
                <p class="stat-label">Manufacturers</p>
            </div>
        </div>
    </div>
    
    <!-- Pending Orders -->
    <div class="stat-card animate__animated animate__fadeInUp" style="animation-delay:240ms;">
        <div class="kpi-card">
            <div class="kpi-ico pending">
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
                            <td style="text-align:right; font-weight:600;">TZS {{ number_format($order->grand_total, 2) }}</td>
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
                        <th style="width:120px;">Joined</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentUsers ?? [] as $user)
                        <tr>
                            <td>
                                <div style="display:flex; align-items:center; gap:12px;">
                                    <div style="width:36px; height:36px; border-radius:50%; background:linear-gradient(135deg, #3b82f6, #8b5cf6); display:flex; align-items:center; justify-content:center; color:white; font-size:14px; font-weight:600;">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div style="font-weight:600; color:#1e293b; font-size:14px;">{{ $user->name }}</div>
                                        <div style="color:#64748b; font-size:12px;">{{ $user->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td style="color:#64748b; font-size:13px;">{{ $user->created_at->diffForHumans() }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" style="text-align:center; color:#6b7280; padding:18px;">No users yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<script>
    // Chart.js Global Defaults for beautiful charts
    Chart.defaults.font.family = "'Poppins', sans-serif";
    Chart.defaults.color = '#64748b';
    
    // Line Chart - Multi-Dataset Activity Trend with Animation
    const lineEl = document.getElementById('lineChart');
    if (lineEl && window.Chart) {
        const chartLabels = {!! json_encode($chartLabels ?? []) !!};
        const chartData = {!! json_encode($chartData ?? []) !!};
        
        // Get individual datasets
        const revenueData = chartData.revenue || [];
        const ordersData = chartData.orders || [];
        const usersData = chartData.users || [];
        
        // Check if we have real data
        const hasRevenue = revenueData.some(val => val > 0);
        const hasOrders = ordersData.some(val => val > 0);
        const hasUsers = usersData.some(val => val > 0);
        
        new Chart(lineEl, {
            type: 'line',
            data: {
                labels: chartLabels.length ? chartLabels : ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [
                    {
                        label: 'Revenue',
                        data: hasRevenue ? revenueData : [12000, 15000, 8000, 22000, 18000, 25000, 20000, 16000, 21000, 19000, 23000, 17000, 24000, 22000],
                        borderColor: '#3b82f6',
                        backgroundColor: (context) => {
                            const ctx = context.chart.ctx;
                            const gradient = ctx.createLinearGradient(0, 0, 0, 260);
                            gradient.addColorStop(0, 'rgba(59, 130, 246, 0.25)');
                            gradient.addColorStop(1, 'rgba(59, 130, 246, 0.0)');
                            return gradient;
                        },
                        tension: 0.4,
                        fill: true,
                        pointRadius: 4,
                        pointHoverRadius: 7,
                        pointBackgroundColor: '#3b82f6',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2,
                        borderWidth: 3,
                        yAxisID: 'y'
                    },
                    {
                        label: 'Orders',
                        data: hasOrders ? ordersData : [12, 15, 8, 22, 18, 25, 20, 16, 21, 19, 23, 17, 24, 22],
                        borderColor: '#f59e0b',
                        backgroundColor: 'transparent',
                        tension: 0.4,
                        fill: false,
                        pointRadius: 3,
                        pointHoverRadius: 5,
                        pointBackgroundColor: '#f59e0b',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2,
                        borderWidth: 3,
                        borderDash: [5, 5],
                        yAxisID: 'y1'
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                animation: {
                    duration: 2500,
                    easing: 'easeOutQuart'
                },
                interaction: {
                    intersect: false,
                    mode: 'index'
                },
                plugins: { 
                    legend: { 
                        display: true,
                        position: 'top',
                        align: 'end',
                        labels: {
                            usePointStyle: true,
                            padding: 20,
                            font: { size: 12, family: "'Poppins', sans-serif", weight: '600' },
                            color: '#64748b',
                            boxWidth: 8
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(30, 41, 59, 0.95)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        padding: 14,
                        cornerRadius: 12,
                        displayColors: true,
                        boxPadding: 6,
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                let value = context.parsed.y;
                                if (label === 'Revenue') {
                                    return label + ': TZS ' + value.toLocaleString();
                                }
                                return label + ': ' + value;
                            }
                        }
                    }
                },
                scales: { 
                    y: { 
                        type: 'linear',
                        display: true,
                        position: 'left',
                        beginAtZero: true,
                        grid: { 
                            color: '#f1f5f9',
                            drawBorder: false
                        },
                        ticks: { 
                            color: '#64748b', 
                            font: { size: 11, family: "'Poppins', sans-serif" },
                            callback: function(value) {
                                if (value >= 1000) {
                                    return 'TZS ' + (value / 1000).toFixed(0) + 'k';
                                }
                                return 'TZS ' + value;
                            }
                        },
                        title: {
                            display: false
                        }
                    },
                    y1: {
                        type: 'linear',
                        display: true,
                        position: 'right',
                        beginAtZero: true,
                        grid: {
                            drawOnChartArea: false
                        },
                        ticks: {
                            color: '#f59e0b',
                            font: { size: 11, family: "'Poppins', sans-serif" },
                            callback: function(value) {
                                return value + ' orders';
                            }
                        }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { 
                            color: '#94a3b8', 
                            font: { size: 11, family: "'Poppins', sans-serif" }
                        }
                    }
                }
            }
        });
    }

    // Doughnut Chart - Order Distribution with Animation
    const pieEl = document.getElementById('pieChart');
    if (pieEl && window.Chart) {
        const pending = {{ $stats['pending_orders'] ?? 0 }};
        const processing = {{ $stats['processing_orders'] ?? 0 }};
        const completed = {{ $stats['completed_orders'] ?? 0 }};
        
        const total = pending + processing + completed;
        const hasRealData = total > 0;
        
        // Use real data or demo data
        const labels = hasRealData ? ['Pending', 'Processing', 'Completed'] : ['Pending', 'Processing', 'Completed'];
        const values = hasRealData ? [pending, processing, completed] : [12, 8, 25];
        
        new Chart(pieEl, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: values,
                    backgroundColor: [
                        '#3b82f6', // Blue - Pending
                        '#f59e0b', // Amber - Processing  
                        '#10b981'  // Green - Completed
                    ],
                    borderWidth: 0,
                    hoverOffset: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                animation: {
                    animateRotate: true,
                    animateScale: true,
                    duration: 1500,
                    easing: 'easeOutQuart'
                },
                plugins: { 
                    legend: { 
                        position: 'bottom',
                        labels: { 
                            usePointStyle: true, 
                            padding: 20, 
                            font: { size: 12, family: "'Poppins', sans-serif" },
                            color: '#64748b'
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(30, 41, 59, 0.9)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        padding: 12,
                        cornerRadius: 8,
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.parsed;
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = ((value / total) * 100).toFixed(1);
                                return label + ': ' + value + ' (' + percentage + '%)';
                            }
                        }
                    }
                },
                cutout: '70%'
            }
        });
    }
</script>
@endsection
