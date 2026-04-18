@extends('layouts.admin')

@section('title', 'Users - Smart Q Store')

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
    
    .btn-add {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        padding: 12px 24px;
        border-radius: 12px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    
    .users-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 20px;
    }
    
    .user-card {
        background: white;
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        position: relative;
    }
    
    .user-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 40px rgba(0,0,0,0.1);
    }
    
    .user-header {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 20px;
    }
    
    .user-avatar {
        width: 60px;
        height: 60px;
        border-radius: 16px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 24px;
        font-weight: 700;
        border: 3px solid #f1f5f9;
    }
    
    .user-info h3 {
        font-size: 17px;
        font-weight: 700;
        color: #1e293b;
        margin: 0 0 4px 0;
    }
    
    .user-info p {
        font-size: 13px;
        color: #64748b;
        margin: 0;
    }
    
    .user-role {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .role-admin {
        background: #fee2e2;
        color: #dc2626;
    }
    
    .role-customer {
        background: #dbeafe;
        color: #2563eb;
    }
    
    .role-seller {
        background: #d1fae5;
        color: #059669;
    }
    
    .user-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 12px;
        padding: 16px 0;
        border-top: 1px solid #f1f5f9;
        border-bottom: 1px solid #f1f5f9;
        margin-bottom: 16px;
    }
    
    .user-stat {
        text-align: center;
    }
    
    .stat-number {
        font-size: 18px;
        font-weight: 700;
        color: #1e293b;
        display: block;
    }
    
    .stat-label {
        font-size: 11px;
        color: #64748b;
        text-transform: uppercase;
    }
    
    .user-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .user-status {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        font-weight: 600;
    }
    
    .status-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
    }
    
    .status-dot.active {
        background: #10b981;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2);
    }
    
    .user-actions {
        display: flex;
        gap: 8px;
    }
    
    .btn-user-action {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        transition: all 0.2s ease;
    }
    
    .btn-edit-user {
        background: #dbeafe;
        color: #3b82f6;
    }
    
    .btn-edit-user:hover {
        background: #3b82f6;
        color: white;
    }
    
    .btn-delete-user {
        background: #fee2e2;
        color: #ef4444;
    }
    
    .btn-delete-user:hover {
        background: #ef4444;
        color: white;
    }
</style>
@endsection

@section('content')
<div class="page-header">
    <h1>Users</h1>
    <button class="btn-add">
        <i class="fa-solid fa-plus"></i>
        Add User
    </button>
</div>

<div class="users-grid">
    @php
        $users = [
            ['name' => 'John Smith', 'email' => 'john.smith@email.com', 'role' => 'customer', 'orders' => 12, 'spent' => '1.2M', 'joined' => 'Jan 2024', 'active' => true],
            ['name' => 'Sarah Johnson', 'email' => 'sarah.j@email.com', 'role' => 'customer', 'orders' => 8, 'spent' => '890K', 'joined' => 'Dec 2023', 'active' => true],
            ['name' => 'Admin User', 'email' => 'admin@smartq.co.tz', 'role' => 'admin', 'orders' => 0, 'spent' => '0', 'joined' => 'Nov 2023', 'active' => true],
            ['name' => 'Mike Wilson', 'email' => 'mike.w@email.com', 'role' => 'seller', 'orders' => 45, 'spent' => '3.4M', 'joined' => 'Oct 2023', 'active' => true],
            ['name' => 'Emma Davis', 'email' => 'emma.d@email.com', 'role' => 'customer', 'orders' => 3, 'spent' => '245K', 'joined' => 'Mar 2024', 'active' => false],
            ['name' => 'Chris Brown', 'email' => 'chris.b@email.com', 'role' => 'customer', 'orders' => 15, 'spent' => '1.8M', 'joined' => 'Sep 2023', 'active' => true],
        ];
    @endphp
    
    @foreach($users as $user)
    <div class="user-card animate__animated animate__fadeInUp" style="animation-delay: {{ $loop->index * 50 }}ms;">
        <div class="user-header">
            <div class="user-avatar">{{ strtoupper(substr($user['name'], 0, 1)) }}</div>
            <div style="flex: 1;">
                <div class="user-info">
                    <h3>{{ $user['name'] }}</h3>
                    <p>{{ $user['email'] }}</p>
                </div>
                <span class="user-role role-{{ $user['role'] }}">
                    <i class="fa-solid fa-{{ $user['role'] == 'admin' ? 'shield' : ($user['role'] == 'seller' ? 'store' : 'user') }}"></i>
                    {{ ucfirst($user['role']) }}
                </span>
            </div>
        </div>
        
        <div class="user-stats">
            <div class="user-stat">
                <span class="stat-number">{{ $user['orders'] }}</span>
                <span class="stat-label">Orders</span>
            </div>
            <div class="user-stat">
                <span class="stat-number">{{ $user['spent'] }}</span>
                <span class="stat-label">Spent</span>
            </div>
            <div class="user-stat">
                <span class="stat-number">{{ $user['joined'] }}</span>
                <span class="stat-label">Joined</span>
            </div>
        </div>
        
        <div class="user-footer">
            <div class="user-status">
                <span class="status-dot {{ $user['active'] ? 'active' : '' }}"></span>
                <span style="color: {{ $user['active'] ? '#10b981' : '#64748b' }};">
                    {{ $user['active'] ? 'Active' : 'Inactive' }}
                </span>
            </div>
            <div class="user-actions">
                <button class="btn-user-action btn-edit-user">
                    <i class="fa-solid fa-pen"></i>
                </button>
                <button class="btn-user-action btn-delete-user">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
