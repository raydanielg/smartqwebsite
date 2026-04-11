<header class="fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-sm transition-all duration-300">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-[#8B4513] to-[#654321] rounded-lg flex items-center justify-center">
                    <i class="fas fa-box-open text-white text-lg"></i>
                </div>
                <div>
                    <span class="text-xl font-bold text-gray-800">Smart Q</span>
                    <span class="text-xs block text-[#8B4513] -mt-1">STORE</span>
                </div>
            </a>
            
            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center gap-8">
                <a href="#home" class="text-gray-700 hover:text-[#8B4513] font-medium transition-colors">Home</a>
                <a href="#services" class="text-gray-700 hover:text-[#8B4513] font-medium transition-colors">Services</a>
                <a href="#categories" class="text-gray-700 hover:text-[#8B4513] font-medium transition-colors">Categories</a>
                <a href="#features" class="text-gray-700 hover:text-[#8B4513] font-medium transition-colors">Why Us</a>
                <a href="#testimonials" class="text-gray-700 hover:text-[#8B4513] font-medium transition-colors">Reviews</a>
                <a href="#faq" class="text-gray-700 hover:text-[#8B4513] font-medium transition-colors">FAQ</a>
            </nav>
            
            <!-- CTA Buttons -->
            <div class="hidden lg:flex items-center gap-4">
                @guest
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-[#8B4513] font-medium transition-colors">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="btn-primary text-sm">
                        Get Started
                    </a>
                @else
                    <div class="relative group">
                        <button class="flex items-center gap-2 text-gray-700 hover:text-[#8B4513] font-medium">
                            <span>{{ Auth::user()->name }}</span>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </button>
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl py-2 hidden group-hover:block">
                            <a href="{{ url('/home') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Dashboard</a>
                            <form method="POST" action="{{ route('logout') }}" class="block">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @endguest
            </div>
            
            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="lg:hidden p-2 text-gray-700">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>
    </div>
    
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="lg:hidden hidden bg-white border-t">
        <div class="container mx-auto px-4 py-4 space-y-4">
            <a href="#home" class="block text-gray-700 hover:text-[#8B4513] font-medium py-2">Home</a>
            <a href="#services" class="block text-gray-700 hover:text-[#8B4513] font-medium py-2">Services</a>
            <a href="#categories" class="block text-gray-700 hover:text-[#8B4513] font-medium py-2">Categories</a>
            <a href="#features" class="block text-gray-700 hover:text-[#8B4513] font-medium py-2">Why Us</a>
            <a href="#testimonials" class="block text-gray-700 hover:text-[#8B4513] font-medium py-2">Reviews</a>
            <a href="#faq" class="block text-gray-700 hover:text-[#8B4513] font-medium py-2">FAQ</a>
            <hr class="border-gray-200">
            @guest
                <a href="{{ route('login') }}" class="block text-gray-700 hover:text-[#8B4513] font-medium py-2">Login</a>
                <a href="{{ route('register') }}" class="block btn-primary text-center justify-center">Get Started</a>
            @else
                <a href="{{ url('/home') }}" class="block text-gray-700 hover:text-[#8B4513] font-medium py-2">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left text-gray-700 hover:text-[#8B4513] font-medium py-2">
                        Logout
                    </button>
                </form>
            @endguest
        </div>
    </div>
</header>

<!-- Spacer for fixed header -->
<div class="h-20"></div>
