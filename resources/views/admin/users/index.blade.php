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
    <h1>Users ({{ $totalUsers ?? 0 }})</h1>
    <button class="btn-add">
        <i class="fa-solid fa-plus"></i>
        Add User
    </button>
</div>

<div class="users-grid">
    @forelse($users as $user)
    @php
        $userRole = $user->roles->first();
        $roleName = $userRole ? $userRole->name : 'customer';
    @endphp
    <div class="user-card animate__animated animate__fadeInUp" style="animation-delay: {{ $loop->index * 50 }}ms;">
        <div class="user-header">
            <div class="user-avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
            <div style="flex: 1;">
                <div class="user-info">
                    <h3>{{ $user->name }}</h3>
                    <p>{{ $user->email }}</p>
                </div>
                <span class="user-role role-{{ $roleName }}">
                    <i class="fa-solid fa-{{ $roleName == 'admin' || $roleName == 'superadmin' ? 'shield' : ($roleName == 'seller' ? 'store' : 'user') }}"></i>
                    {{ ucfirst($roleName) }}
                </span>
            </div>
        </div>
        
        <div class="user-stats">
            <div class="user-stat">
                <span class="stat-number">{{ $user->orders_count ?? 0 }}</span>
                <span class="stat-label">Orders</span>
            </div>
            <div class="user-stat">
                <span class="stat-number">{{ $user->created_at->format('M Y') }}</span>
                <span class="stat-label">Joined</span>
            </div>
            <div class="user-stat">
                <span class="stat-number" style="font-size: 14px;">{{ $user->email_verified_at ? 'Verified' : 'Unverified' }}</span>
                <span class="stat-label">Status</span>
            </div>
        </div>
        
        <div class="user-footer">
            <div class="user-status">
                <span class="status-dot {{ $user->email_verified_at ? 'active' : '' }}"></span>
                <span style="color: {{ $user->email_verified_at ? '#10b981' : '#64748b' }};">
                    {{ $user->email_verified_at ? 'Active' : 'Inactive' }}
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
    @empty
        <div style="grid-column: 1/-1; text-align: center; padding: 60px; color: #64748b;">
            <i class="fa-solid fa-users" style="font-size: 48px; margin-bottom: 16px; opacity: 0.5;"></i>
            <h3>No users found</h3>
            <p>Add your first user to get started</p>
        </div>
    @endforelse
</div>

<div style="margin-top: 24px;">
    {{ $users->links() }}
</div>
@endsection
