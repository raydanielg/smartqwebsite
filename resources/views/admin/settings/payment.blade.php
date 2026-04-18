@extends('layouts.admin')

@section('title', 'Payment - Smart Q Store')

@section('styles')
<style>
    .settings-container { max-width: 900px; margin: 0 auto; }
    .settings-header { margin-bottom: 30px; }
    .settings-header h2 { font-size: 24px; font-weight: 700; color: #1e293b; margin: 0 0 8px 0; }
    .settings-header p { color: #64748b; font-size: 15px; margin: 0; }
    .settings-card { background: white; border-radius: 16px; padding: 30px; margin-bottom: 24px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); }
    .settings-card h3 { font-size: 16px; font-weight: 600; color: #1e293b; margin: 0 0 24px 0; display: flex; align-items: center; gap: 10px; padding-bottom: 16px; border-bottom: 1px solid #f1f5f9; }
    .settings-card h3 i { color: #667eea; font-size: 18px; }
    
    .payment-method { display: flex; align-items: center; justify-content: space-between; padding: 20px; border: 2px solid #e2e8f0; border-radius: 12px; margin-bottom: 16px; transition: all 0.3s ease; }
    .payment-method:hover { border-color: #667eea; }
    .payment-method.active { border-color: #667eea; background: #f8fafc; }
    
    .payment-info { display: flex; align-items: center; gap: 16px; }
    .payment-icon { width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 24px; }
    .mpesa-icon { background: #10b981; color: white; }
    .tigo-icon { background: #f59e0b; color: white; }
    .airtel-icon { background: #ef4444; color: white; }
    .bank-icon { background: #3b82f6; color: white; }
    .cod-icon { background: #64748b; color: white; }
    
    .payment-details h4 { font-size: 16px; font-weight: 600; color: #1e293b; margin: 0 0 4px 0; }
    .payment-details p { font-size: 13px; color: #64748b; margin: 0; }
    
    .toggle-switch { position: relative; width: 50px; height: 26px; }
    .toggle-switch input { opacity: 0; width: 0; height: 0; }
    .toggle-slider { position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #e2e8f0; transition: .4s; border-radius: 26px; }
    .toggle-slider:before { position: absolute; content: ""; height: 20px; width: 20px; left: 3px; bottom: 3px; background-color: white; transition: .4s; border-radius: 50%; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
    .toggle-switch input:checked + .toggle-slider { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
    .toggle-switch input:checked + .toggle-slider:before { transform: translateX(24px); }
    
    .form-group { margin-bottom: 20px; }
    .form-group label { display: block; font-size: 13px; font-weight: 600; color: #64748b; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 0.5px; }
    .form-control { width: 100%; padding: 14px 18px; border: 2px solid #e2e8f0; border-radius: 12px; font-size: 15px; font-family: 'Poppins', sans-serif; transition: all 0.3s ease; }
    .form-control:focus { border-color: #667eea; outline: none; box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1); }
    .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
    
    .btn-save { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; padding: 14px 32px; border-radius: 12px; font-size: 15px; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; }
</style>
@endsection

@section('content')
<div class="settings-container">
    <div class="settings-header">
        <h2>Payment Settings</h2>
        <p>Configure payment methods for your store</p>
    </div>

    <div class="settings-card animate__animated animate__fadeInUp">
        <h3><i class="fa-solid fa-mobile-screen"></i> Mobile Money</h3>
        
        <div class="payment-method active">
            <div class="payment-info">
                <div class="payment-icon mpesa-icon"><i class="fa-solid fa-money-bill-wave"></i></div>
                <div class="payment-details">
                    <h4>M-Pesa</h4>
                    <p>Tanzania's leading mobile money</p>
                </div>
            </div>
            <label class="toggle-switch">
                <input type="checkbox" checked>
                <span class="toggle-slider"></span>
            </label>
        </div>
        
        <div class="payment-method">
            <div class="payment-info">
                <div class="payment-icon tigo-icon"><i class="fa-solid fa-sim-card"></i></div>
                <div class="payment-details">
                    <h4>Tigo Pesa</h4>
                    <p>Fast and reliable payments</p>
                </div>
            </div>
            <label class="toggle-switch">
                <input type="checkbox">
                <span class="toggle-slider"></span>
            </label>
        </div>
        
        <div class="payment-method">
            <div class="payment-info">
                <div class="payment-icon airtel-icon"><i class="fa-solid fa-mobile"></i></div>
                <div class="payment-details">
                    <h4>Airtel Money</h4>
                    <p>Quick mobile transactions</p>
                </div>
            </div>
            <label class="toggle-switch">
                <input type="checkbox">
                <span class="toggle-slider"></span>
            </label>
        </div>
    </div>

    <div class="settings-card animate__animated animate__fadeInUp" style="animation-delay: 100ms;">
        <h3><i class="fa-solid fa-building-columns"></i> Bank & Cash</h3>
        
        <div class="payment-method">
            <div class="payment-info">
                <div class="payment-icon bank-icon"><i class="fa-solid fa-building-columns"></i></div>
                <div class="payment-details">
                    <h4>Bank Transfer</h4>
                    <p>Direct bank payments</p>
                </div>
            </div>
            <label class="toggle-switch">
                <input type="checkbox">
                <span class="toggle-slider"></span>
            </label>
        </div>
        
        <div class="payment-method active">
            <div class="payment-info">
                <div class="payment-icon cod-icon"><i class="fa-solid fa-hand-holding-dollar"></i></div>
                <div class="payment-details">
                    <h4>Cash on Delivery</h4>
                    <p>Pay when you receive</p>
                </div>
            </div>
            <label class="toggle-switch">
                <input type="checkbox" checked>
                <span class="toggle-slider"></span>
            </label>
        </div>
    </div>

    <div class="settings-card animate__animated animate__fadeInUp" style="animation-delay: 200ms;">
        <h3><i class="fa-solid fa-file-invoice"></i> Payment Details</h3>
        <div class="form-row">
            <div class="form-group">
                <label>Business Name</label>
                <input type="text" class="form-control" value="Smart Q Store">
            </div>
            <div class="form-group">
                <label>Paybill Number</label>
                <input type="text" class="form-control" value="123456">
            </div>
        </div>
    </div>

    <button class="btn-save">
        <i class="fa-solid fa-save"></i>
        Save Settings
    </button>
</div>
@endsection
