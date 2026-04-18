@extends('layouts.admin')

@section('title', 'Settings - Smart Q Store')

@section('styles')
<style>
    .settings-container {
        max-width: 900px;
        margin: 0 auto;
    }
    
    .settings-header {
        margin-bottom: 30px;
    }
    
    .settings-header h2 {
        font-size: 24px;
        font-weight: 700;
        color: #1e293b;
        margin: 0 0 8px 0;
    }
    
    .settings-header p {
        color: #64748b;
        font-size: 15px;
        margin: 0;
    }
    
    .settings-card {
        background: white;
        border-radius: 16px;
        padding: 30px;
        margin-bottom: 24px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    }
    
    .settings-card h3 {
        font-size: 16px;
        font-weight: 600;
        color: #1e293b;
        margin: 0 0 24px 0;
        display: flex;
        align-items: center;
        gap: 10px;
        padding-bottom: 16px;
        border-bottom: 1px solid #f1f5f9;
    }
    
    .settings-card h3 i {
        color: #667eea;
        font-size: 18px;
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
    
    .setting-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px 0;
        border-bottom: 1px solid #f1f5f9;
    }
    
    .setting-item:last-child {
        border-bottom: none;
    }
    
    .setting-info h4 {
        font-size: 15px;
        font-weight: 600;
        color: #1e293b;
        margin: 0 0 4px 0;
    }
    
    .setting-info p {
        font-size: 13px;
        color: #64748b;
        margin: 0;
    }
    
    /* Toggle Switch */
    .toggle-switch {
        position: relative;
        width: 50px;
        height: 26px;
    }
    
    .toggle-switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }
    
    .toggle-slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #e2e8f0;
        transition: .4s;
        border-radius: 26px;
    }
    
    .toggle-slider:before {
        position: absolute;
        content: "";
        height: 20px;
        width: 20px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        transition: .4s;
        border-radius: 50%;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .toggle-switch input:checked + .toggle-slider {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .toggle-switch input:checked + .toggle-slider:before {
        transform: translateX(24px);
    }
    
    @media (max-width: 768px) {
        .form-row {
            grid-template-columns: 1fr;
        }
        
        .setting-item {
            flex-direction: column;
            align-items: flex-start;
            gap: 12px;
        }
    }
</style>
@endsection

@section('content')
<div class="settings-container">
    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success mb-4" style="background: #d1fae5; color: #065f46; padding: 16px 20px; border-radius: 12px; font-weight: 500;">
            <i class="fa-solid fa-check-circle mr-2"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="settings-header">
        <h2>Settings</h2>
        <p>Manage your store preferences and configuration</p>
    </div>

    <!-- General Settings -->
    <div class="settings-card animate__animated animate__fadeInUp">
        <h3><i class="fa-solid fa-store"></i> General Settings</h3>
        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <label>Store Name</label>
                    <input type="text" name="site_name" class="form-control" value="{{ old('site_name', 'Smart Q Store') }}" required>
                </div>
                <div class="form-group">
                    <label>Store Email</label>
                    <input type="email" name="site_email" class="form-control" value="{{ old('site_email', 'info@smartq.co.tz') }}" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>Currency</label>
                    <select name="currency" class="form-control">
                        <option value="TZS" selected>TZS - Tanzanian Shilling</option>
                        <option value="USD">USD - US Dollar</option>
                        <option value="EUR">EUR - Euro</option>
                        <option value="GBP">GBP - British Pound</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Timezone</label>
                    <select name="timezone" class="form-control">
                        <option value="Africa/Dar_es_Salaam" selected>Africa/Dar es Salaam</option>
                        <option value="Africa/Nairobi">Africa/Nairobi</option>
                        <option value="UTC">UTC</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn-save">
                <i class="fa-solid fa-save"></i>
                Save Settings
            </button>
        </form>
    </div>

    <!-- Notifications -->
    <div class="settings-card animate__animated animate__fadeInUp" style="animation-delay: 100ms;">
        <h3><i class="fa-regular fa-bell"></i> Notifications</h3>
        <div class="setting-item">
            <div class="setting-info">
                <h4>Email Notifications</h4>
                <p>Receive email alerts for new orders</p>
            </div>
            <label class="toggle-switch">
                <input type="checkbox" checked>
                <span class="toggle-slider"></span>
            </label>
        </div>
        <div class="setting-item">
            <div class="setting-info">
                <h4>Order Updates</h4>
                <p>Get notified when order status changes</p>
            </div>
            <label class="toggle-switch">
                <input type="checkbox" checked>
                <span class="toggle-slider"></span>
            </label>
        </div>
        <div class="setting-item">
            <div class="setting-info">
                <h4>New User Registrations</h4>
                <p>Alert when new users sign up</p>
            </div>
            <label class="toggle-switch">
                <input type="checkbox">
                <span class="toggle-slider"></span>
            </label>
        </div>
    </div>

    <!-- Security -->
    <div class="settings-card animate__animated animate__fadeInUp" style="animation-delay: 200ms;">
        <h3><i class="fa-solid fa-shield-halved"></i> Security</h3>
        <div class="setting-item">
            <div class="setting-info">
                <h4>Two-Factor Authentication</h4>
                <p>Add an extra layer of security</p>
            </div>
            <label class="toggle-switch">
                <input type="checkbox">
                <span class="toggle-slider"></span>
            </label>
        </div>
        <div class="setting-item">
            <div class="setting-info">
                <h4>Login Notifications</h4>
                <p>Get notified of new login attempts</p>
            </div>
            <label class="toggle-switch">
                <input type="checkbox" checked>
                <span class="toggle-slider"></span>
            </label>
        </div>
    </div>
</div>
@endsection
