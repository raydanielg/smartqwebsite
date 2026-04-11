<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title', 'Authentication')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #f5f5f5;
            min-height: 100vh;
        }
        
        .auth-container {
            display: flex;
            min-height: 100vh;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: linear-gradient(135deg, #e8e4df 0%, #d4d0cb 100%);
        }
        
        .auth-card {
            display: flex;
            width: 100%;
            max-width: 1000px;
            min-height: 580px;
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 25px 80px rgba(0,0,0,0.15);
        }
        
        /* Left Panel - Branding */
        .auth-left {
            flex: 1;
            background: linear-gradient(145deg, #8B4513 0%, #654321 50%, #4a3728 100%);
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: #fff;
            position: relative;
            overflow: hidden;
        }
        
        .auth-left::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, transparent 70%);
            pointer-events: none;
        }
        
        .brand-label {
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: rgba(255,255,255,0.7);
            margin-bottom: 20px;
        }
        
        .brand-title {
            font-size: 32px;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 20px;
            color: #fff;
        }
        
        .brand-description {
            font-size: 14px;
            line-height: 1.7;
            color: rgba(255,255,255,0.85);
            margin-bottom: 30px;
        }
        
        .brand-tagline {
            font-size: 13px;
            font-style: italic;
            color: rgba(255,255,255,0.7);
        }
        
        .brand-features {
            margin-top: 40px;
        }
        
        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            font-size: 13px;
            color: rgba(255,255,255,0.9);
        }
        
        .feature-item i {
            width: 24px;
            height: 24px;
            background: rgba(255,255,255,0.15);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            font-size: 11px;
        }
        
        /* Right Panel - Form */
        .auth-right {
            flex: 1;
            background: #c8c4bf;
            padding: 50px 45px;
            display: flex;
            flex-direction: column;
            position: relative;
        }
        
        .back-btn {
            position: absolute;
            top: 25px;
            right: 25px;
            background: #2d2d2d;
            color: #fff;
            border: none;
            padding: 8px 18px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .back-btn:hover {
            background: #444;
            color: #fff;
            transform: translateY(-2px);
        }
        
        .form-header {
            text-align: center;
            margin-bottom: 35px;
            margin-top: 20px;
        }
        
        .form-header h2 {
            font-size: 24px;
            font-weight: 600;
            color: #2d2d2d;
            margin-bottom: 8px;
        }
        
        .form-header p {
            font-size: 12px;
            color: #666;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        
        .form-group {
            margin-bottom: 22px;
        }
        
        .form-label {
            display: block;
            font-size: 12px;
            font-weight: 500;
            color: #444;
            margin-bottom: 8px;
        }
        
        .form-control {
            width: 100%;
            padding: 14px 18px;
            border: none;
            border-radius: 10px;
            background: rgba(255,255,255,0.7);
            font-size: 14px;
            color: #333;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            outline: none;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(139,69,19,0.1);
        }
        
        .form-control.is-invalid {
            background: rgba(220,53,69,0.1);
            box-shadow: 0 0 0 3px rgba(220,53,69,0.1);
        }
        
        .invalid-feedback {
            font-size: 12px;
            color: #dc3545;
            margin-top: 6px;
        }
        
        .form-check {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }
        
        .form-check-input {
            width: 18px;
            height: 18px;
            border: 2px solid #999;
            border-radius: 4px;
            margin-right: 10px;
            cursor: pointer;
        }
        
        .form-check-label {
            font-size: 13px;
            color: #555;
            cursor: pointer;
        }
        
        .btn-primary {
            width: 100%;
            padding: 15px;
            background: #2d2d2d;
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background: #444;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        
        .auth-links {
            text-align: center;
            margin-top: 25px;
        }
        
        .auth-links a {
            font-size: 13px;
            color: #555;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .auth-links a:hover {
            color: #8B4513;
        }
        
        .auth-footer {
            text-align: center;
            margin-top: auto;
            padding-top: 30px;
            font-size: 11px;
            color: #777;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .auth-card {
                flex-direction: column;
                max-width: 450px;
            }
            
            .auth-left {
                padding: 40px 30px;
                min-height: 200px;
            }
            
            .auth-right {
                padding: 40px 30px;
            }
            
            .brand-title {
                font-size: 24px;
            }
            
            .back-btn {
                position: static;
                align-self: flex-end;
                margin-bottom: 15px;
            }
        }
        
        /* Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .auth-card {
            animation: fadeInUp 0.6s ease-out;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        @yield('content')
    </div>
</body>
</html>
