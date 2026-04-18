@extends('layouts.admin')

@section('title', 'Staff - Smart Q Store')

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
    
    .staff-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 16px;
        padding: 30px;
        color: white;
        margin-bottom: 24px;
    }
    
    .staff-header h2 {
        font-size: 20px;
        font-weight: 700;
        margin: 0 0 8px 0;
    }
    
    .staff-header p {
        font-size: 14px;
        opacity: 0.9;
        margin: 0;
    }
    
    .staff-table-container {
        background: white;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        overflow: hidden;
    }
    
    .staff-table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .staff-table th {
        background: #f8fafc;
        padding: 16px 20px;
        text-align: left;
        font-size: 12px;
        font-weight: 600;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .staff-table td {
        padding: 20px;
        border-bottom: 1px solid #f1f5f9;
    }
    
    .staff-table tr:hover {
        background: #f8fafc;
    }
    
    .staff-info {
        display: flex;
        align-items: center;
        gap: 16px;
    }
    
    .staff-avatar {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 18px;
        font-weight: 700;
        border: 3px solid #f1f5f9;
    }
    
    .staff-details h4 {
        font-size: 15px;
        font-weight: 700;
        color: #1e293b;
        margin: 0 0 4px 0;
    }
    
    .staff-details p {
        font-size: 13px;
        color: #64748b;
        margin: 0;
    }
    
    .department-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 12px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 600;
    }
    
    .dept-sales { background: #dbeafe; color: #1e40af; }
    .dept-support { background: #d1fae5; color: #065f46; }
    .dept-tech { background: #fce7f3; color: #be185d; }
    .dept-admin { background: #fef3c7; color: #92400e; }
    
    .role-badge {
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
    
    .role-superadmin {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }
    
    .role-admin {
        background: #fee2e2;
        color: #dc2626;
    }
    
    .role-manager {
        background: #d1fae5;
        color: #059669;
    }
    
    .staff-status {
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .status-indicator {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: #10b981;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2);
    }
    
    .status-indicator.away {
        background: #f59e0b;
        box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.2);
    }
    
    .status-text {
        font-size: 13px;
        font-weight: 600;
        color: #475569;
    }
    
    .last-seen {
        font-size: 12px;
        color: #94a3b8;
    }
    
    .action-btns {
        display: flex;
        gap: 8px;
    }
    
    .btn-icon-action {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        transition: all 0.2s ease;
    }
    
    .btn-edit {
        background: #dbeafe;
        color: #3b82f6;
    }
    
    .btn-edit:hover {
        background: #3b82f6;
        color: white;
    }
    
    .btn-permissions {
        background: #f3e8ff;
        color: #9333ea;
    }
    
    .btn-permissions:hover {
        background: #9333ea;
        color: white;
    }
</style>
@endsection

@section('content')
<div class="page-header">
    <h1>Staff Management ({{ $totalStaff ?? 0 }})</h1>
    <button class="btn-add" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; padding: 12px 24px; border-radius: 12px; font-size: 14px; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; gap: 8px;">
        <i class="fa-solid fa-user-plus"></i>
        Add Staff
    </button>
</div>

<div class="staff-header animate__animated animate__fadeIn">
    <h2><i class="fa-solid fa-users-gear mr-2"></i>Team Overview</h2>
    <p>Manage your team members, permissions and access levels</p>
</div>

<div class="staff-table-container animate__animated animate__fadeInUp">
    <table class="staff-table">
        <thead>
            <tr>
                <th>Staff Member</th>
                <th>Role</th>
                <th>Joined</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($staff as $member)
            @php
                $staffRole = $member->roles->first();
                $roleName = $staffRole ? $staffRole->name : 'staff';
            @endphp
            <tr>
                <td>
                    <div class="staff-info">
                        <div class="staff-avatar">{{ strtoupper(substr($member->name, 0, 1)) }}</div>
                        <div class="staff-details">
                            <h4>{{ $member->name }}</h4>
                            <p>{{ $member->email }}</p>
                        </div>
                    </div>
                </td>
                <td>
                    <span class="role-badge role-{{ $roleName }}">
                        <i class="fa-solid fa-{{ $roleName == 'superadmin' ? 'crown' : ($roleName == 'manager' ? 'user-tie' : 'user-shield') }}"></i>
                        {{ ucfirst($roleName) }}
                    </span>
                </td>
                <td>
                    <span style="color: #64748b; font-size: 14px;">{{ $member->created_at?->format('M d, Y') ?? 'N/A' }}</span>
                </td>
                <td>
                    <div class="staff-status">
                        <span class="status-indicator {{ $member->email_verified_at ? '' : 'away' }}"></span>
                        <div>
                            <div class="status-text">{{ $member->email_verified_at ? 'Active' : 'Pending' }}</div>
                            <div class="last-seen">{{ $member->created_at?->diffForHumans() ?? 'N/A' }}</div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="action-btns">
                        <button class="btn-icon-action btn-edit" title="Edit">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                        <button class="btn-icon-action btn-permissions" title="Permissions">
                            <i class="fa-solid fa-key"></i>
                        </button>
                    </div>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center; padding: 40px; color: #64748b;">
                        <i class="fa-solid fa-users-gear" style="font-size: 36px; margin-bottom: 12px; opacity: 0.5;"></i>
                        <p>No staff members found</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
