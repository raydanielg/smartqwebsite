@extends('layouts.admin')

@section('title', 'Appearance - Smart Q Store')

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
    
    .theme-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
        margin-bottom: 24px;
    }
    
    .theme-option {
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        padding: 20px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
    }
    
    .theme-option:hover, .theme-option.active {
        border-color: #667eea;
        background: #f8fafc;
    }
    
    .theme-option.active {
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }
    
    .theme-preview {
        height: 80px;
        border-radius: 8px;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
    }
    
    .theme-light { background: #f8fafc; color: #1e293b; }
    .theme-dark { background: #1e293b; color: white; }
    .theme-auto { background: linear-gradient(135deg, #f8fafc 50%, #1e293b 50%); }
    
    .theme-name {
        font-size: 14px;
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 4px;
    }
    
    .theme-desc {
        font-size: 12px;
        color: #64748b;
    }
    
    .color-grid {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }
    
    .color-option {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        cursor: pointer;
        position: relative;
        transition: all 0.2s ease;
        border: 3px solid transparent;
    }
    
    .color-option:hover {
        transform: scale(1.1);
    }
    
    .color-option.active {
        border-color: #1e293b;
    }
    
    .color-option.active::after {
        content: '\f00c';
        font-family: 'Font Awesome 6 Free';
        font-weight: 900;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        font-size: 16px;
    }
    
    .color-blue { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
    .color-green { background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); }
    .color-orange { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); }
    .color-purple { background: linear-gradient(135deg, #8e2de2 0%, #4a00e0 100%); }
    .color-dark { background: linear-gradient(135deg, #434343 0%, #000000 100%); }
    
    .logo-section {
        border: 2px dashed #e2e8f0;
        border-radius: 16px;
        padding: 40px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .logo-section:hover {
        border-color: #667eea;
        background: #f8fafc;
    }
    
    .logo-placeholder {
        width: 100px;
        height: 100px;
        border-radius: 20px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        margin: 0 auto 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 36px;
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
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
</style>
@endsection

@section('content')
<div class="settings-container">
    <div class="settings-header">
        <h2>Appearance</h2>
        <p>Customize the look and feel of your store</p>
    </div>

    <div class="settings-card animate__animated animate__fadeInUp">
        <h3><i class="fa-solid fa-palette"></i> Theme</h3>
        <div class="theme-grid">
            <div class="theme-option active">
                <div class="theme-preview theme-light">
                    <i class="fa-solid fa-sun"></i>
                </div>
                <div class="theme-name">Light</div>
                <div class="theme-desc">Clean & bright</div>
            </div>
            <div class="theme-option">
                <div class="theme-preview theme-dark">
                    <i class="fa-solid fa-moon"></i>
                </div>
                <div class="theme-name">Dark</div>
                <div class="theme-desc">Easy on eyes</div>
            </div>
            <div class="theme-option">
                <div class="theme-preview theme-auto">
                    <i class="fa-solid fa-circle-half-stroke"></i>
                </div>
                <div class="theme-name">Auto</div>
                <div class="theme-desc">System preference</div>
            </div>
        </div>
    </div>

    <div class="settings-card animate__animated animate__fadeInUp" style="animation-delay: 100ms;">
        <h3><i class="fa-solid fa-droplet"></i> Primary Color</h3>
        <div class="color-grid">
            <div class="color-option color-blue active"></div>
            <div class="color-option color-green"></div>
            <div class="color-option color-orange"></div>
            <div class="color-option color-purple"></div>
            <div class="color-option color-dark"></div>
        </div>
    </div>

    <div class="settings-card animate__animated animate__fadeInUp" style="animation-delay: 200ms;">
        <h3><i class="fa-solid fa-image"></i> Logo & Branding</h3>
        <div class="logo-section">
            <div class="logo-placeholder">
                <i class="fa-solid fa-cloud-arrow-up"></i>
            </div>
            <h4 style="font-size: 16px; font-weight: 600; color: #1e293b; margin: 0 0 8px 0;">Upload Logo</h4>
            <p style="font-size: 13px; color: #64748b; margin: 0;">PNG, JPG up to 2MB</p>
        </div>
    </div>

    <button class="btn-save">
        <i class="fa-solid fa-save"></i>
        Save Changes
    </button>
</div>
@endsection
