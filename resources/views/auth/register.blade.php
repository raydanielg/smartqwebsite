@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<div class="auth-card">
    <!-- Left Panel - Branding -->
    <div class="auth-left">
        <div class="brand-label">SMART Q STORE</div>
        <h1 class="brand-title">Join<br>Smart Q Store</h1>
        <p class="brand-description">
            Create your account today and start importing goods from China to Tanzania with ease. Access our cargo, importation, and dropshipping services.
        </p>
        <p class="brand-tagline">Start your business journey with us.</p>
        
        <div class="brand-features">
            <div class="feature-item">
                <i class="fas fa-user-plus"></i>
                <span>Free Account Registration</span>
            </div>
            <div class="feature-item">
                <i class="fas fa-globe"></i>
                <span>Connect with China Suppliers</span>
            </div>
            <div class="feature-item">
                <i class="fas fa-headset"></i>
                <span>24/7 Customer Support</span>
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
            <h2>Register</h2>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name" class="form-label">Full Name</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                       name="name" value="{{ old('name') }}" required autocomplete="name" autofocus 
                       placeholder="Enter your full name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email Address</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                       name="email" value="{{ old('email') }}" required autocomplete="email" 
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
                       name="password" required autocomplete="new-password" 
                       placeholder="Create a password">
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
                       placeholder="Confirm your password">
            </div>

            <button type="submit" class="btn-primary">
                <i class="fas fa-user-plus" style="margin-right: 8px;"></i>Create Account
            </button>

            <div class="auth-links">
                <span style="color: #666;">Already have an account? </span>
                <a href="{{ route('login') }}" style="color: #8B4513; font-weight: 600;">
                    Login Here
                </a>
            </div>

            <div class="auth-footer">
                © {{ date('Y') }} Smart Q Store Ltd. All Rights Reserved.
            </div>
        </form>
    </div>
</div>
@endsection
