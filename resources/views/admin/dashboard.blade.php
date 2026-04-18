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

    /* KPI Cards - Powerful Modern Style */
    .stat-card {
        background: linear-gradient(145deg, #ffffff, #f8f9fa);
        border-radius: 20px;
        padding: 24px 20px;
        box-shadow: 
            0 10px 40px rgba(0,0,0,0.08),
            0 2px 8px rgba(0,0,0,0.04);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        border: none;
        position: relative;
        overflow: hidden;
    }
    
    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--card-color, #FFC107), var(--card-color-dark, #FF9800));
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .stat-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 
            0 20px 60px rgba(0,0,0,0.12),
            0 8px 20px rgba(0,0,0,0.08);
    }
    
    .stat-card:hover::before {
        opacity: 1;
    }

    .kpi-card {
        display: flex;
        gap: 16px;
        align-items: center;
    }
    
    .kpi-ico {
        width: 60px;
        height: 60px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex: 0 0 auto;
        box-shadow: 
            0 8px 24px rgba(0,0,0,0.15),
            inset 0 2px 4px rgba(255,255,255,0.3);
        position: relative;
        overflow: hidden;
    }
    
    .kpi-ico::after {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.3) 0%, transparent 70%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .stat-card:hover .kpi-ico::after {
        opacity: 1;
    }
    
    .kpi-ico i {
        font-size: 26px;
        filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));
    }
    
    /* Powerful Color Variants for Icons */
    .kpi-ico.users { 
        background: linear-gradient(135deg, #FFC107 0%, #FF9800 100%); 
        color: white; 
        --card-color: #FFC107;
        --card-color-dark: #FF9800;
    }
    .kpi-ico.products { 
        background: linear-gradient(135deg, #FF9800 0%, #FF5722 100%); 
        color: white; 
        --card-color: #FF9800;
        --card-color-dark: #FF5722;
    }
    .kpi-ico.orders { 
        background: linear-gradient(135deg, #FF5722 0%, #E91E63 100%); 
        color: white; 
        --card-color: #FF5722;
        --card-color-dark: #E91E63;
    }
    .kpi-ico.revenue { 
        background: linear-gradient(135deg, #4CAF50 0%, #8BC34A 100%); 
        color: white; 
        --card-color: #4CAF50;
        --card-color-dark: #8BC34A;
    }
    .kpi-ico.manufacturers { 
        background: linear-gradient(135deg, #2196F3 0%, #03A9F4 100%); 
        color: white; 
        --card-color: #2196F3;
        --card-color-dark: #03A9F4;
    }
    .kpi-ico.pending { 
        background: linear-gradient(135deg, #9C27B0 0%, #E91E63 100%); 
        color: white; 
        --card-color: #9C27B0;
        --card-color-dark: #E91E63;
    }
    
    .stats-grid .stat-details {
        min-width: 0;
        flex: 1;
    }
    
    .stats-grid .stat-value {
        margin: 0 0 4px 0;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        font-size: 26px;
        font-weight: 800;
        color: #1a1a2e;
        letter-spacing: -0.5px;
        font-family: 'Poppins', sans-serif;
    }
    
    .stats-grid .stat-label {
        margin: 0;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        font-size: 11px;
        color: #6b7280;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        font-family: 'Poppins', sans-serif;
    }

    /* Content Cards - Powerful */
    .content-card {
        background: linear-gradient(145deg, #ffffff, #f8f9fa);
        border-radius: 24px;
        box-shadow: 
            0 8px 32px rgba(0,0,0,0.08),
            0 2px 8px rgba(0,0,0,0.04);
        border: none;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    
    .content-card:hover {
        box-shadow: 
            0 12px 40px rgba(0,0,0,0.12),
            0 4px 12px rgba(0,0,0,0.06);
    }
    
    .content-card .card-header {
        padding: 24px 24px 16px 24px;
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
            width: 48px;
            height: 48px;
            border-radius: 12px;
        }
        .kpi-ico i {
            font-size: 20px;
        }
        .stats-grid .stat-value {
            font-size: 22px;
        }
        .stats-grid .stat-label {
            font-size: 10px;
        }
    }
    
    @media (max-width: 480px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }
        .kpi-ico {
            width: 44px;
            height: 44px;
        }
        .kpi-ico i {
            font-size: 18px;
        }
        .stats-grid .stat-value {
            font-size: 20px;
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

@section('scripts')
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
@endsection
