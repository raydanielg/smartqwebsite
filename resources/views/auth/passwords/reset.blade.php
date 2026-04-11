@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
<div class="auth-card">
    <!-- Left Panel - Branding -->
    <div class="auth-left">
        <div class="brand-label">SMART Q STORE</div>
        <h1 class="brand-title">Create New<br>Password</h1>
        <p class="brand-description">
            Set a new secure password for your account. Make sure it's strong and unique to keep your import business protected.
        </p>
        <p class="brand-tagline">Strong passwords, secure business.</p>
        
        <div class="brand-features">
            <div class="feature-item">
                <i class="fas fa-key"></i>
                <span>New Password Setup</span>
            </div>
            <div class="feature-item">
                <i class="fas fa-user-shield"></i>
                <span>Enhanced Security</span>
            </div>
            <div class="feature-item">
                <i class="fas fa-check-double"></i>
                <span>Instant Access Restore</span>
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
            <h2>Reset Password</h2>
        </div>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label for="email" class="form-label">Email Address</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                       name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" 
                       placeholder="Your email address" readonly style="background: #e9ecef;">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">New Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                       name="password" required autocomplete="new-password" 
                       placeholder="Enter new password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password-confirm" class="form-label">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control" 
                       name="password_confirmation" required autocomplete="new-password" 
                       placeholder="Confirm new password">
            </div>

            <button type="submit" class="btn-primary">
                <i class="fas fa-redo-alt" style="margin-right: 8px;"></i>Reset Password
            </button>

            <div class="auth-links">
                <span style="color: #666;">Need help? </span>
                <a href="{{ route('login') }}" style="color: #8B4513; font-weight: 600;">
                    Contact Support
                </a>
            </div>

            <div class="auth-footer">
                © {{ date('Y') }} Smart Q Store Ltd. All Rights Reserved.
            </div>
        </form>
    </div>
</div>
@endsection
