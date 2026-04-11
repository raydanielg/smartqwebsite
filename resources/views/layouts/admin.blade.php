<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Admin - Smart Q Store')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom Admin Styles -->
    <style>
        :root {
            --primary: #4e73df;
            --success: #1cc88a;
            --info: #36b9cc;
            --warning: #f6c23e;
            --danger: #e74a3b;
        }
        
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fc;
        }
        
        /* Sidebar */
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, #4e73df 10%, #224abe 100%);
        }
        
        .sidebar .nav-item .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 1rem;
            font-weight: 600;
        }
        
        .sidebar .nav-item .nav-link:hover,
        .sidebar .nav-item.active .nav-link {
            color: #fff;
            background: rgba(255,255,255,0.1);
        }
        
        .sidebar-brand {
            height: 4.375rem;
            text-decoration: none;
            font-size: 1.5rem;
            font-weight: 800;
            padding: 1.5rem 1rem;
            text-align: center;
            letter-spacing: 0.05rem;
            color: #fff;
            display: block;
        }
        
        .sidebar-brand i {
            color: #fff;
        }
        
        /* Cards */
        .card {
            border: none;
            border-radius: 0.35rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58,59,69,0.15);
        }
        
        .border-left-primary { border-left: 0.25rem solid #4e73df !important; }
        .border-left-success { border-left: 0.25rem solid #1cc88a !important; }
        .border-left-info { border-left: 0.25rem solid #36b9cc !important; }
        .border-left-warning { border-left: 0.25rem solid #f6c23e !important; }
        
        /* Icon Circles */
        .icon-circle {
            height: 3rem;
            width: 3rem;
            border-radius: 100%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        
        .bg-primary { background-color: #4e73df !important; }
        .bg-success { background-color: #1cc88a !important; }
        .bg-info { background-color: #36b9cc !important; }
        .bg-warning { background-color: #f6c23e !important; }
        
        /* Topbar */
        .topbar {
            height: 4.375rem;
            background-color: #fff;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58,59,69,0.15);
        }
        
        /* Badge Colors */
        .badge-primary { background-color: #4e73df; }
        .badge-success { background-color: #1cc88a; }
        .badge-info { background-color: #36b9cc; }
        .badge-warning { background-color: #f6c23e; }
        .badge-danger { background-color: #e74a3b; }
        
        /* Content Wrapper */
        #content-wrapper {
            background-color: #f8f9fc;
            width: 100%;
            overflow-x: hidden;
        }
        
        #content {
            flex: 1 0 auto;
        }
        
        /* Footer */
        footer.sticky-footer {
            padding: 2rem 0;
            flex-shrink: 0;
        }
        
        /* Responsive */
        @media (min-width: 768px) {
            .sidebar {
                width: 14rem !important;
            }
            .sidebar .nav-item .nav-link {
                display: block;
                width: 100%;
                text-align: left;
                padding: 1rem;
            }
        }
    </style>
    
    @yield('styles')
</head>
<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-crown fa-2x"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>
            
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider">
            
            <!-- Heading -->
            <div class="sidebar-heading">Management</div>
            
            <!-- Nav Item - Users -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.users') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span>
                </a>
            </li>
            
            <!-- Nav Item - Products -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.products') }}">
                    <i class="fas fa-fw fa-box"></i>
                    <span>Products</span>
                </a>
            </li>
            
            <!-- Nav Item - Manufacturers -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.manufacturers') }}">
                    <i class="fas fa-fw fa-industry"></i>
                    <span>Manufacturers</span>
                </a>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider">
            
            <!-- Heading -->
            <div class="sidebar-heading">System</div>
            
            @if(auth()->user()->isSuperAdmin())
            <!-- Nav Item - Roles -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.roles') }}">
                    <i class="fas fa-fw fa-user-shield"></i>
                    <span>Roles & Permissions</span>
                </a>
            </li>
            
            <!-- Nav Item - Settings -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.settings') }}">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Settings</span>
                </a>
            </li>
            
            <!-- Nav Item - Super Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.super.dashboard') }}">
                    <i class="fas fa-fw fa-crown"></i>
                    <span>Super Admin</span>
                </a>
            </li>
            @endif
            
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            
            <!-- Nav Item - Back to Site -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('shop') }}">
                    <i class="fas fa-fw fa-store"></i>
                    <span>Back to Shop</span>
                </a>
            </li>
        </ul>
        <!-- End of Sidebar -->
        
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                @if(Auth::user()->highestRole())
                                    <span class="badge" style="background-color: {{ Auth::user()->highestRole()->color }}">
                                        <i class="{{ Auth::user()->highestRole()->icon }} mr-1"></i>
                                        {{ Auth::user()->highestRole()->display_name }}
                                    </span>
                                @endif
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
                                <a class="dropdown-item" href="{{ route('landing') }}">
                                    <i class="fas fa-store fa-sm fa-fw mr-2 text-gray-400"></i>
                                    View Shop
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->
                
                <!-- Begin Page Content -->
                <div class="container-fluid">
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
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Smart Q Store {{ date('Y') }}</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    
    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    
    @yield('scripts')
</body>
</html>
