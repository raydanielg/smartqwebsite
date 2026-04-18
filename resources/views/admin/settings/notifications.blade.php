@extends('layouts.admin')

@section('title', 'Notifications - Smart Q Store')

@section('styles')
<style>
    .settings-container { max-width: 900px; margin: 0 auto; }
    .settings-header { margin-bottom: 30px; }
    .settings-header h2 { font-size: 24px; font-weight: 700; color: #1e293b; margin: 0 0 8px 0; }
    .settings-header p { color: #64748b; font-size: 15px; margin: 0; }
    .settings-card { background: white; border-radius: 16px; padding: 30px; margin-bottom: 24px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); }
    .settings-card h3 { font-size: 16px; font-weight: 600; color: #1e293b; margin: 0 0 24px 0; display: flex; align-items: center; gap: 10px; padding-bottom: 16px; border-bottom: 1px solid #f1f5f9; }
    .settings-card h3 i { color: #667eea; font-size: 18px; }
    
    .notification-group { margin-bottom: 24px; }
    .group-title { font-size: 14px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 16px; }
    
    .notification-item { display: flex; align-items: center; justify-content: space-between; padding: 16px 0; border-bottom: 1px solid #f1f5f9; }
    .notification-item:last-child { border-bottom: none; }
    
    .notification-info { display: flex; align-items: center; gap: 14px; }
    .notification-icon { width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 18px; }
    .icon-order { background: #dbeafe; color: #3b82f6; }
    .icon-user { background: #d1fae5; color: #10b981; }
    .icon-system { background: #fef3c7; color: #f59e0b; }
    .icon-promo { background: #fce7f3; color: #ec4899; }
    
    .notification-details h4 { font-size: 15px; font-weight: 600; color: #1e293b; margin: 0 0 4px 0; }
    .notification-details p { font-size: 13px; color: #64748b; margin: 0; }
    
    .toggle-channels { display: flex; gap: 12px; }
    .channel-toggle { display: flex; flex-direction: column; align-items: center; gap: 6px; }
    .channel-label { font-size: 11px; font-weight: 600; color: #64748b; text-transform: uppercase; }
    
    .toggle-switch { position: relative; width: 44px; height: 24px; }
    .toggle-switch input { opacity: 0; width: 0; height: 0; }
    .toggle-slider { position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #e2e8f0; transition: .4s; border-radius: 24px; }
    .toggle-slider:before { position: absolute; content: ""; height: 18px; width: 18px; left: 3px; bottom: 3px; background-color: white; transition: .4s; border-radius: 50%; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
    .toggle-switch input:checked + .toggle-slider { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
    .toggle-switch input:checked + .toggle-slider:before { transform: translateX(20px); }
    
    .btn-save { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; padding: 14px 32px; border-radius: 12px; font-size: 15px; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; }
</style>
@endsection

@section('content')
<div class="settings-container">
    <div class="settings-header">
        <h2>Notification Settings</h2>
        <p>Choose what notifications you want to receive</p>
    </div>

    <div class="settings-card animate__animated animate__fadeInUp">
        <h3><i class="fa-solid fa-bell"></i> Notification Preferences</h3>
        
        <div class="notification-group">
            <div class="group-title">Orders</div>
            
            <div class="notification-item">
                <div class="notification-info">
                    <div class="notification-icon icon-order">
                        <i class="fa-solid fa-bag-shopping"></i>
                    </div>
                    <div class="notification-details">
                        <h4>New Order Placed</h4>
                        <p>When a customer places a new order</p>
                    </div>
                </div>
                <div class="toggle-channels">
                    <div class="channel-toggle">
                        <span class="channel-label">Email</span>
                        <label class="toggle-switch">
                            <input type="checkbox" checked>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                    <div class="channel-toggle">
                        <span class="channel-label">Push</span>
                        <label class="toggle-switch">
                            <input type="checkbox" checked>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="notification-item">
                <div class="notification-info">
                    <div class="notification-icon icon-order">
                        <i class="fa-solid fa-truck"></i>
                    </div>
                    <div class="notification-details">
                        <h4>Order Status Updates</h4>
                        <p>When order status changes</p>
                    </div>
                </div>
                <div class="toggle-channels">
                    <div class="channel-toggle">
                        <span class="channel-label">Email</span>
                        <label class="toggle-switch">
                            <input type="checkbox" checked>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                    <div class="channel-toggle">
                        <span class="channel-label">Push</span>
                        <label class="toggle-switch">
                            <input type="checkbox">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="notification-group">
            <div class="group-title">Users</div>
            
            <div class="notification-item">
                <div class="notification-info">
                    <div class="notification-icon icon-user">
                        <i class="fa-solid fa-user-plus"></i>
                    </div>
                    <div class="notification-details">
                        <h4>New User Registration</h4>
                        <p>When a new user signs up</p>
                    </div>
                </div>
                <div class="toggle-channels">
                    <div class="channel-toggle">
                        <span class="channel-label">Email</span>
                        <label class="toggle-switch">
                            <input type="checkbox">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                    <div class="channel-toggle">
                        <span class="channel-label">Push</span>
                        <label class="toggle-switch">
                            <input type="checkbox" checked>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="notification-group">
            <div class="group-title">System</div>
            
            <div class="notification-item">
                <div class="notification-info">
                    <div class="notification-icon icon-system">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                    </div>
                    <div class="notification-details">
                        <h4>Low Stock Alert</h4>
                        <p>When product stock is running low</p>
                    </div>
                </div>
                <div class="toggle-channels">
                    <div class="channel-toggle">
                        <span class="channel-label">Email</span>
                        <label class="toggle-switch">
                            <input type="checkbox" checked>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                    <div class="channel-toggle">
                        <span class="channel-label">Push</span>
                        <label class="toggle-switch">
                            <input type="checkbox" checked>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="notification-item">
                <div class="notification-info">
                    <div class="notification-icon icon-promo">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div class="notification-details">
                        <h4>Marketing Emails</h4>
                        <p>Newsletters and promotional content</p>
                    </div>
                </div>
                <div class="toggle-channels">
                    <div class="channel-toggle">
                        <span class="channel-label">Email</span>
                        <label class="toggle-switch">
                            <input type="checkbox">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                    <div class="channel-toggle">
                        <span class="channel-label">Push</span>
                        <label class="toggle-switch">
                            <input type="checkbox">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button class="btn-save">
        <i class="fa-solid fa-save"></i>
        Save Preferences
    </button>
</div>
@endsection
