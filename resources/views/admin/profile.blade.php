@extends('layouts.admin')

@section('title', 'My Profile - Smart Q Store')

@section('styles')
<style>
    .profile-container {
        max-width: 1000px;
        margin: 0 auto;
    }
    
    .profile-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 16px;
        padding: 40px;
        color: white;
        margin-bottom: 30px;
        position: relative;
        overflow: hidden;
    }
    
    .profile-header::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 300px;
        height: 300px;
        background: rgba(255,255,255,0.1);
        border-radius: 50%;
        transform: translate(100px, -100px);
    }
    
    .profile-avatar-section {
        display: flex;
        align-items: center;
        gap: 24px;
        position: relative;
        z-index: 1;
    }
    
    .profile-avatar {
        width: 100px;
        height: 100px;
        border-radius: 24px;
        background: white;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #667eea;
        font-size: 42px;
        font-weight: 700;
        border: 4px solid rgba(255,255,255,0.3);
        box-shadow: 0 10px 40px rgba(0,0,0,0.2);
    }
    
    .profile-info h2 {
        font-size: 28px;
        font-weight: 700;
        margin: 0 0 8px 0;
    }
    
    .profile-info p {
        font-size: 15px;
        opacity: 0.9;
        margin: 0;
    }
    
    .profile-stats {
        display: flex;
        gap: 30px;
        margin-top: 30px;
        position: relative;
        z-index: 1;
    }
    
    .profile-stat {
        text-align: center;
    }
    
    .profile-stat .value {
        font-size: 24px;
        font-weight: 700;
        display: block;
    }
    
    .profile-stat .label {
        font-size: 13px;
        opacity: 0.8;
    }
    
    .profile-card {
        background: white;
        border-radius: 16px;
        padding: 30px;
        margin-bottom: 24px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    }
    
    .profile-card h3 {
        font-size: 18px;
        font-weight: 600;
        color: #1e293b;
        margin: 0 0 24px 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .profile-card h3 i {
        color: #667eea;
        font-size: 20px;
    }
    
    .form-group {
        margin-bottom: 24px;
    }
    
    .form-group label {
        display: block;
        font-size: 13px;
        font-weight: 600;
        color: #64748b;
        margin-bottom: 8px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .form-control {
        width: 100%;
        padding: 14px 18px;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: 15px;
        transition: all 0.3s ease;
        font-family: 'Poppins', sans-serif;
    }
    
    .form-control:focus {
        border-color: #667eea;
        outline: none;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
    }
    
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }
    
    .btn-save {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        padding: 14px 32px;
        border-radius: 12px;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    
    .btn-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
    }
    
    .btn-cancel {
        background: #f1f5f9;
        color: #64748b;
        border: none;
        padding: 14px 32px;
        border-radius: 12px;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        margin-left: 12px;
        transition: all 0.3s ease;
    }
    
    .btn-cancel:hover {
        background: #e2e8f0;
    }
    
    @media (max-width: 768px) {
        .form-row {
            grid-template-columns: 1fr;
        }
        
        .profile-header {
            padding: 24px;
        }
        
        .profile-avatar-section {
            flex-direction: column;
            text-align: center;
        }
        
        .profile-stats {
            justify-content: center;
        }
    }
</style>
@endsection

@section('content')
<div class="profile-container">
    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success mb-4" style="background: #d1fae5; color: #065f46; padding: 16px 20px; border-radius: 12px; font-weight: 500;">
            <i class="fa-solid fa-check-circle mr-2"></i>
            {{ session('success') }}
        </div>
    @endif

    <!-- Profile Header -->
    <div class="profile-header animate__animated animate__fadeIn">
        <div class="profile-avatar-section">
            <div class="profile-avatar">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>
            <div class="profile-info">
                <h2>{{ $user->name }}</h2>
                <p>{{ $user->email }} • {{ $user->highestRole()->display_name ?? 'Administrator' }}</p>
            </div>
        </div>
        <div class="profile-stats">
            <div class="profile-stat">
                <span class="value">{{ $user->created_at->format('M Y') }}</span>
                <span class="label">Member Since</span>
            </div>
            <div class="profile-stat">
                <span class="value">{{ $user->updated_at->diffForHumans() }}</span>
                <span class="label">Last Updated</span>
            </div>
        </div>
    </div>

    <!-- Personal Information -->
    <div class="profile-card animate__animated animate__fadeInUp">
        <h3><i class="fa-regular fa-user"></i> Personal Information</h3>
        <form action="{{ route('admin.profile.update') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                    @error('name')
                        <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone ?? '') }}" placeholder="+255 XXX XXX XXX">
            </div>
            <button type="submit" class="btn-save">
                <i class="fa-solid fa-save"></i>
                Save Changes
            </button>
        </form>
    </div>

    <!-- Change Password -->
    <div class="profile-card animate__animated animate__fadeInUp" style="animation-delay: 100ms;">
        <h3><i class="fa-solid fa-lock"></i> Change Password</h3>
        <form action="{{ route('admin.profile.update') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <label>New Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter new password">
                    @error('password')
                        <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm new password">
                </div>
            </div>
            <button type="submit" class="btn-save">
                <i class="fa-solid fa-key"></i>
                Update Password
            </button>
        </form>
    </div>
</div>
@endsection
