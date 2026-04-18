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
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59, 130, 246, 0.15)',
                    tension: 0.35,
                    fill: true,
                    pointRadius: 3,
                    pointBackgroundColor: '#3b82f6',
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
            ? ['#3b82f6', '#f59e0b', '#10b981'] 
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
