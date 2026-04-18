<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Admin - Smart Q Store')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom Admin Styles - Gold/Yellow Theme -->
    <style>
        :root {
            --primary-gold: #FFC107;
            --primary-gold-dark: #FFA000;
            --primary-gold-light: #FFD54F;
            --secondary-gold: #FF8F00;
            --accent-yellow: #FFEB3B;
            --success: #4CAF50;
            --info: #2196F3;
            --warning: #FF9800;
            --danger: #f44336;
            --sidebar-bg: #f5f5f5;
            --sidebar-hover: #e8e8e8;
            --text-primary: #1a1a2e;
            --text-secondary: #6b7280;
            --bg-main: #e8e8ec;
            --card-bg: #ffffff;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-main);
            color: var(--text-primary);
            min-height: 100vh;
        }
        
        /* Admin Layout Wrapper */
        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }
        
        /* Sidebar Styles */
        .admin-sidebar {
            width: 260px;
            background: var(--sidebar-bg);
            border-right: 1px solid #e0e0e0;
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 1000;
        }
        
        /* Brand Section */
        .sidebar-brand {
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid #e0e0e0;
            flex-shrink: 0;
        }
        
        .brand-logo {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary-gold), var(--secondary-gold));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
        }
        
        .brand-text {
            display: flex;
            flex-direction: column;
        }
        
        .brand-name {
            font-size: 18px;
            font-weight: 700;
            color: var(--text-primary);
            line-height: 1.2;
        }
        
        .brand-tagline {
            font-size: 10px;
            color: var(--primary-gold-dark);
            font-weight: 600;
            letter-spacing: 1px;
        }
        
        /* Navigation */
        .sidebar-nav {
            padding: 16px 12px;
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }
        
        .nav-section {
            margin-bottom: 8px;
        }
        
        .nav-section:last-child {
            margin-top: auto;
            margin-bottom: 0;
        }
        
        .nav-label {
            font-size: 10px;
            font-weight: 600;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 0 12px;
            margin-bottom: 8px;
            display: block;
        }
        
        .nav-list {
            list-style: none;
        }
        
        .nav-item {
            margin-bottom: 4px;
        }
        
        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px;
            border-radius: 10px;
            text-decoration: none;
            color: var(--text-primary);
            transition: all 0.2s ease;
        }
        
        .nav-link:hover {
            background: var(--sidebar-hover);
        }
        
        .nav-item.active .nav-link {
            background: linear-gradient(135deg, var(--primary-gold), var(--primary-gold-dark));
            color: white;
            box-shadow: 0 4px 12px rgba(255, 193, 7, 0.3);
        }
        
        .nav-item.active .nav-link .nav-icon {
            background: rgba(255, 255, 255, 0.2) !important;
        }
        
        .nav-icon {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 14px;
            flex-shrink: 0;
        }
        
        /* Simple icons - Malkia style (no background color) */
        .nav-icon.simple {
            width: 24px;
            height: 24px;
            background: transparent !important;
            color: var(--text-secondary);
            font-size: 18px;
        }
        
        .nav-item.active .nav-link .nav-icon.simple {
            color: white;
            background: transparent !important;
        }
        
        .nav-text {
            font-size: 14px;
            font-weight: 500;
        }
        
        /* Sign Out Section */
        .sign-out-section {
            margin-top: auto;
            padding-top: 20px;
            border-top: 1px solid #e0e0e0;
        }
        
        .sign-out-link {
            color: #ef4444 !important;
        }
        
        .sign-out-link:hover {
            background: #fef2f2 !important;
        }
        
        .sign-out-link .nav-icon.simple {
            color: #ef4444 !important;
        }
        
        /* Main Content Area */
        .admin-main {
            flex: 1;
            margin-left: 260px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        /* Header */
        .admin-header {
            background: var(--card-bg);
            padding: 16px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e0e0e0;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .page-title {
            font-size: 24px;
            font-weight: 600;
            color: var(--text-primary);
            margin: 0;
        }
        
        .header-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }
        
        .header-icon-btn {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: var(--bg-main);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-secondary);
            font-size: 16px;
            position: relative;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .header-icon-btn:hover {
            background: var(--primary-gold-light);
            color: var(--primary-gold-dark);
        }
        
        .notification-badge {
            position: absolute;
            top: -4px;
            right: -4px;
            width: 18px;
            height: 18px;
            background: var(--danger);
            color: white;
            font-size: 10px;
            font-weight: 600;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* User Profile */
        .user-profile .profile-trigger {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 10px;
            transition: all 0.2s ease;
        }
        
        .user-profile .profile-trigger:hover {
            background: var(--bg-main);
        }
        
        .avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-gold), var(--secondary-gold));
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 14px;
        }
        
        .user-info {
            display: flex;
            flex-direction: column;
            text-align: left;
        }
        
        .user-name {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-primary);
            line-height: 1.2;
        }
        
        .user-role {
            font-size: 11px;
            color: var(--text-secondary);
        }
        
        .dropdown-arrow {
            color: var(--text-secondary);
            font-size: 12px;
        }
        
        /* Dropdown Menu */
        .dropdown-menu {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 8px;
            min-width: 200px;
        }
        
        .dropdown-item {
            padding: 10px 14px;
            border-radius: 8px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--text-primary);
            transition: all 0.2s ease;
        }
        
        .dropdown-item:hover {
            background: var(--bg-main);
        }
        
        .dropdown-item i {
            color: var(--text-secondary);
            width: 18px;
        }
        
        .dropdown-divider {
            margin: 8px 0;
            border-color: #e0e0e0;
        }
        
        /* Content Area */
        .admin-content {
            flex: 1;
            padding: 24px;
        }
        
        /* Alerts */
        .alert {
            border: none;
            border-radius: 12px;
            padding: 16px 20px;
            margin-bottom: 20px;
        }
        
        .alert-success {
            background: #e8f5e9;
            color: #2e7d32;
        }
        
        .alert-danger {
            background: #ffebee;
            color: #c62828;
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .admin-sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            
            .admin-sidebar.show {
                transform: translateX(0);
            }
            
            .admin-main {
                margin-left: 0;
            }
            
            .sidebar-toggle {
                display: block;
            }
        }
        
        @media (max-width: 576px) {
            .admin-content {
                padding: 16px;
            }
            
            .user-info {
                display: none;
            }
        }
    </style>
    
    @yield('styles')
</head>
<body>
    <div class="admin-wrapper">
        <!-- Sidebar -->
        @include('partials.admin-sidebar')
        
        <!-- Main Content -->
        <div class="admin-main">
            <!-- Header -->
            @include('partials.admin-header')
            
            <!-- Content -->
            <main class="admin-content">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                    </div>
                @endif
                
                @yield('content')
            </main>
        </div>
    </div>
    
    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    
    @yield('scripts')
</body>
</html>
