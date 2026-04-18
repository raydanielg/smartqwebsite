@extends('layouts.admin')

@section('title', 'Shipping - Smart Q Store')

@section('styles')
<style>
    .settings-container { max-width: 900px; margin: 0 auto; }
    .settings-header { margin-bottom: 30px; }
    .settings-header h2 { font-size: 24px; font-weight: 700; color: #1e293b; margin: 0 0 8px 0; }
    .settings-header p { color: #64748b; font-size: 15px; margin: 0; }
    .settings-card { background: white; border-radius: 16px; padding: 30px; margin-bottom: 24px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); }
    .settings-card h3 { font-size: 16px; font-weight: 600; color: #1e293b; margin: 0 0 24px 0; display: flex; align-items: center; gap: 10px; padding-bottom: 16px; border-bottom: 1px solid #f1f5f9; }
    .settings-card h3 i { color: #667eea; font-size: 18px; }
    
    .shipping-zone { border: 2px solid #e2e8f0; border-radius: 12px; padding: 20px; margin-bottom: 16px; }
    .zone-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; }
    .zone-name { font-size: 16px; font-weight: 600; color: #1e293b; }
    .zone-badge { padding: 4px 12px; background: #dbeafe; color: #1e40af; border-radius: 20px; font-size: 11px; font-weight: 700; }
    
    .zone-rates { display: flex; gap: 16px; flex-wrap: wrap; }
    .rate-card { flex: 1; min-width: 150px; background: #f8fafc; border-radius: 10px; padding: 16px; text-align: center; }
    .rate-name { font-size: 13px; color: #64748b; margin-bottom: 4px; }
    .rate-price { font-size: 20px; font-weight: 700; color: #1e293b; }
    .rate-time { font-size: 12px; color: #94a3b8; }
    
    .form-group { margin-bottom: 20px; }
    .form-group label { display: block; font-size: 13px; font-weight: 600; color: #64748b; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 0.5px; }
    .form-control { width: 100%; padding: 14px 18px; border: 2px solid #e2e8f0; border-radius: 12px; font-size: 15px; font-family: 'Poppins', sans-serif; }
    .form-control:focus { border-color: #667eea; outline: none; box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1); }
    .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
    
    .toggle-switch { position: relative; width: 50px; height: 26px; }
    .toggle-switch input { opacity: 0; width: 0; height: 0; }
    .toggle-slider { position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #e2e8f0; transition: .4s; border-radius: 26px; }
    .toggle-slider:before { position: absolute; content: ""; height: 20px; width: 20px; left: 3px; bottom: 3px; background-color: white; transition: .4s; border-radius: 50%; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
    .toggle-switch input:checked + .toggle-slider { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
    .toggle-switch input:checked + .toggle-slider:before { transform: translateX(24px); }
    
    .setting-item { display: flex; align-items: center; justify-content: space-between; padding: 20px 0; border-bottom: 1px solid #f1f5f9; }
    .setting-item:last-child { border-bottom: none; padding-bottom: 0; }
    .setting-info h4 { font-size: 15px; font-weight: 600; color: #1e293b; margin: 0 0 4px 0; }
    .setting-info p { font-size: 13px; color: #64748b; margin: 0; }
    
    .btn-save { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; padding: 14px 32px; border-radius: 12px; font-size: 15px; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; }
</style>
@endsection

@section('content')
<div class="settings-container">
    <div class="settings-header">
        <h2>Shipping Settings</h2>
        <p>Configure delivery zones and rates</p>
    </div>

    <div class="settings-card animate__animated animate__fadeInUp">
        <h3><i class="fa-solid fa-map-location-dot"></i> Shipping Zones</h3>
        
        <div class="shipping-zone">
            <div class="zone-header">
                <span class="zone-name">Dar es Salaam</span>
                <span class="zone-badge">Default</span>
            </div>
            <div class="zone-rates">
                <div class="rate-card">
                    <div class="rate-name">Standard</div>
                    <div class="rate-price">TZS 5,000</div>
                    <div class="rate-time">1-2 days</div>
                </div>
                <div class="rate-card">
                    <div class="rate-name">Express</div>
                    <div class="rate-price">TZS 10,000</div>
                    <div class="rate-time">Same day</div>
                </div>
                <div class="rate-card">
                    <div class="rate-name">Free</div>
                    <div class="rate-price">TZS 0</div>
                    <div class="rate-time">Orders TZS 100k+</div>
                </div>
            </div>
        </div>
        
        <div class="shipping-zone">
            <div class="zone-header">
                <span class="zone-name">Other Regions</span>
                <span class="zone-badge">All Regions</span>
            </div>
            <div class="zone-rates">
                <div class="rate-card">
                    <div class="rate-name">Standard</div>
                    <div class="rate-price">TZS 15,000</div>
                    <div class="rate-time">3-5 days</div>
                </div>
                <div class="rate-card">
                    <div class="rate-name">Express</div>
                    <div class="rate-price">TZS 25,000</div>
                    <div class="rate-time">1-2 days</div>
                </div>
            </div>
        </div>
    </div>

    <div class="settings-card animate__animated animate__fadeInUp" style="animation-delay: 100ms;">
        <h3><i class="fa-solid fa-box-open"></i> Shipping Options</h3>
        
        <div class="setting-item">
            <div class="setting-info">
                <h4>Free Shipping Threshold</h4>
                <p>Orders above this amount get free shipping</p>
            </div>
            <div class="form-group" style="margin: 0; width: 200px;">
                <input type="text" class="form-control" value="100000">
            </div>
        </div>
        
        <div class="setting-item">
            <div class="setting-info">
                <h4>Enable Local Pickup</h4>
                <p>Allow customers to pick up from store</p>
            </div>
            <label class="toggle-switch">
                <input type="checkbox" checked>
                <span class="toggle-slider"></span>
            </label>
        </div>
        
        <div class="setting-item">
            <div class="setting-info">
                <h4>Require Phone Number</h4>
                <p>Mandatory for delivery coordination</p>
            </div>
            <label class="toggle-switch">
                <input type="checkbox" checked>
                <span class="toggle-slider"></span>
            </label>
        </div>
    </div>

    <button class="btn-save">
        <i class="fa-solid fa-save"></i>
        Save Settings
    </button>
</div>
@endsection
