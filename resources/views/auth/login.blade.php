@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="auth-card">
    <!-- Left Panel - Branding -->
    <div class="auth-left">
        <div class="brand-label">SMART Q STORE</div>
        <h1 class="brand-title">Welcome to<br>Smart Q Store</h1>
        <p class="brand-description">
            Your trusted partner for importing goods from China to Tanzania. We provide fast, reliable, and affordable cargo, importation, and dropshipping services.
        </p>
        <p class="brand-tagline">Fast. Reliable. Delivered to your doorstep.</p>
        
        <div class="brand-features">
            <div class="feature-item">
                <i class="fas fa-box"></i>
                <span>Cargo & Importation Services</span>
            </div>
            <div class="feature-item">
                <i class="fas fa-shipping-fast"></i>
                <span>Fast & Secure Shipping</span>
            </div>
            <div class="feature-item">
                <i class="fas fa-hand-holding-usd"></i>
                <span>Dropshipping Solutions</span>
            </div>
        </div>
    </div>

    <!-- Right Panel - Form -->
    <div class="auth-right">
        <a href="{{ url('/') }}" class="back-btn">
            <i class="fas fa-arrow-left" style="margin-right: 5px;"></i>Go Back
        </a>
        
        <div class="form-header">
            <p>SMART Q STORE</p>
            <h2>Login</h2>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email" class="form-label">Email Address</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus 
                       placeholder="Enter your email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                       name="password" required autocomplete="current-password" 
                       placeholder="Enter your password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" 
                       {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    Remember Me
                </label>
            </div>

            <button type="submit" class="btn-primary">
                <i class="fas fa-sign-in-alt" style="margin-right: 8px;"></i>Login
            </button>

            <div class="auth-links">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
                @endif
                <br><br>
                @if (Route::has('register'))
                    <span style="color: #666;">Don't have an account? </span>
                    <a href="{{ route('register') }}" style="color: #8B4513; font-weight: 600;">
                        Register Now
                    </a>
                @endif
            </div>

            <div class="auth-footer">
                © {{ date('Y') }} Smart Q Store Ltd. All Rights Reserved.
            </div>
        </form>
    </div>
</div>
@endsection
