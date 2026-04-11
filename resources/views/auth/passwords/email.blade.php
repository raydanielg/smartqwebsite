@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
<div class="auth-card">
    <!-- Left Panel - Branding -->
    <div class="auth-left">
        <div class="brand-label">SMART Q STORE</div>
        <h1 class="brand-title">Reset Your<br>Password</h1>
        <p class="brand-description">
            Forgot your password? No worries! Enter your email address and we'll send you a link to reset your password and get you back to managing your imports.
        </p>
        <p class="brand-tagline">Secure. Simple. Swift.</p>
        
        <div class="brand-features">
            <div class="feature-item">
                <i class="fas fa-shield-alt"></i>
                <span>Secure Password Recovery</span>
            </div>
            <div class="feature-item">
                <i class="fas fa-envelope"></i>
                <span>Instant Email Delivery</span>
            </div>
            <div class="feature-item">
                <i class="fas fa-lock"></i>
                <span>Protected Account Access</span>
            </div>
        </div>
    </div>

    <!-- Right Panel - Form -->
    <div class="auth-right">
        <a href="{{ route('login') }}" class="back-btn">
            <i class="fas fa-arrow-left" style="margin-right: 5px;"></i>Go Back
        </a>
        
        <div class="form-header">
            <p>SMART Q STORE</p>
            <h2>Forgot Password</h2>
        </div>

        @if (session('status'))
            <div style="background: #d4edda; color: #155724; padding: 12px 15px; border-radius: 8px; margin-bottom: 20px; font-size: 13px;">
                <i class="fas fa-check-circle" style="margin-right: 8px;"></i>{{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group">
                <label for="email" class="form-label">Email Address</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus 
                       placeholder="Enter your registered email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn-primary">
                <i class="fas fa-paper-plane" style="margin-right: 8px;"></i>Send Reset Link
            </button>

            <div class="auth-links">
                <span style="color: #666;">Remember your password? </span>
                <a href="{{ route('login') }}" style="color: #8B4513; font-weight: 600;">
                    Back to Login
                </a>
            </div>

            <div class="auth-footer">
                © {{ date('Y') }} Smart Q Store Ltd. All Rights Reserved.
            </div>
        </form>
    </div>
</div>
@endsection
