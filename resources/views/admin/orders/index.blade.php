@extends('layouts.admin')

@section('title', 'Orders - Smart Q Store')

@section('styles')
<style>
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
    }
    
    .page-header h1 {
        font-size: 24px;
        font-weight: 700;
        color: #1e293b;
        margin: 0;
    }
    
    .orders-stats {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
        margin-bottom: 24px;
    }
    
    .stat-box {
        background: white;
        border-radius: 16px;
        padding: 20px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    }
    
    .stat-box.pending { border-left: 4px solid #f59e0b; }
    .stat-box.processing { border-left: 4px solid #3b82f6; }
    .stat-box.completed { border-left: 4px solid #10b981; }
    .stat-box.cancelled { border-left: 4px solid #ef4444; }
    
    .stat-label {
        font-size: 12px;
        font-weight: 600;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 8px;
    }
    
    .stat-value {
        font-size: 28px;
        font-weight: 700;
        color: #1e293b;
    }
    
    .data-table-container {
        background: white;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        overflow: hidden;
    }
    
    .filters-bar {
        padding: 20px;
        border-bottom: 1px solid #f1f5f9;
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }
    
    .search-input {
        flex: 1;
        min-width: 250px;
        padding: 10px 16px;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        font-size: 14px;
        font-family: 'Poppins', sans-serif;
    }
    
    .filter-select {
        padding: 10px 16px;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        font-size: 14px;
        background: white;
        min-width: 140px;
    }
    
    .data-table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .data-table th {
        background: #f8fafc;
        padding: 14px 20px;
        text-align: left;
        font-size: 12px;
        font-weight: 600;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .data-table td {
        padding: 16px 20px;
        border-bottom: 1px solid #f1f5f9;
        font-size: 14px;
    }
    
    .data-table tr:hover {
        background: #f8fafc;
    }
    
    .order-id {
        font-weight: 700;
        color: #667eea;
    }
    
    .customer-info {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .customer-avatar {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 12px;
        font-weight: 700;
    }
    
    .customer-details {
        display: flex;
        flex-direction: column;
    }
    
    .customer-name {
        font-weight: 600;
        color: #1e293b;
    }
    
    .customer-email {
        font-size: 12px;
        color: #64748b;
    }
    
    .order-amount {
        font-weight: 700;
        color: #1e293b;
        font-size: 15px;
    }
    
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }
    
    .status-pending {
        background: #fef3c7;
        color: #92400e;
    }
    
    .status-processing {
        background: #dbeafe;
        color: #1e40af;
    }
    
    .status-completed {
        background: #d1fae5;
        color: #065f46;
    }
    
    .status-cancelled {
        background: #fee2e2;
        color: #991b1b;
    }
    
    .btn-view {
        padding: 8px 16px;
        background: #f1f5f9;
        color: #475569;
        border: none;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    
    .btn-view:hover {
        background: #667eea;
        color: white;
    }
    
    @media (max-width: 1024px) {
        .orders-stats {
            grid-template-columns: repeat(2, 1fr);
        }
    }
</style>
@endsection

@section('content')
<div class="page-header">
    <h1>Orders</h1>
</div>

<div class="orders-stats">
    <div class="stat-box pending animate__animated animate__fadeInUp">
        <div class="stat-label">Pending</div>
        <div class="stat-value">{{ $pendingOrders ?? 0 }}</div>
    </div>
    <div class="stat-box processing animate__animated animate__fadeInUp" style="animation-delay: 50ms;">
        <div class="stat-label">Processing</div>
        <div class="stat-value">{{ $processingOrders ?? 0 }}</div>
    </div>
    <div class="stat-box completed animate__animated animate__fadeInUp" style="animation-delay: 100ms;">
        <div class="stat-label">Completed</div>
        <div class="stat-value">{{ $completedOrders ?? 0 }}</div>
    </div>
    <div class="stat-box cancelled animate__animated animate__fadeInUp" style="animation-delay: 150ms;">
        <div class="stat-label">Cancelled</div>
        <div class="stat-value">{{ $cancelledOrders ?? 0 }}</div>
    </div>
</div>

<div class="data-table-container animate__animated animate__fadeInUp">
    <div class="filters-bar">
        <input type="text" class="search-input" placeholder="Search orders...">
        <select class="filter-select">
            <option>All Status</option>
            <option>Pending</option>
            <option>Processing</option>
            <option>Completed</option>
        </select>
        <select class="filter-select">
            <option>Last 7 Days</option>
            <option>Last 30 Days</option>
            <option>This Month</option>
        </select>
    </div>
    
    <table class="data-table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
            <tr>
                <td><span class="order-id">#ORD-{{ $order->id }}</span></td>
                <td>
                    <div class="customer-info">
                        <div class="customer-avatar">{{ strtoupper(substr($order->user->name ?? 'G', 0, 1)) }}</div>
                        <div class="customer-details">
                            <span class="customer-name">{{ $order->user->name ?? 'Guest' }}</span>
                            <span class="customer-email">{{ $order->user->email ?? 'N/A' }}</span>
                        </div>
                    </div>
                </td>
                <td><span class="order-amount">TZS {{ number_format($order->grand_total, 0) }}</span></td>
                <td>
                    <span class="status-badge status-{{ $order->status }}">
                        <i class="fa-solid fa-circle" style="font-size: 5px;"></i>
                        {{ ucfirst($order->status) }}
                    </span>
                </td>
                <td style="color: #64748b;">{{ $order->created_at->diffForHumans() }}</td>
                <td><button class="btn-view">View</button></td>
            </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center; padding: 40px; color: #64748b;">
                        <i class="fa-solid fa-shopping-bag" style="font-size: 36px; margin-bottom: 12px; opacity: 0.5;"></i>
                        <p>No orders found</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    <div style="padding: 20px; border-top: 1px solid #f1f5f9;">
        {{ $orders->links() }}
    </div>
</div>
@endsection
