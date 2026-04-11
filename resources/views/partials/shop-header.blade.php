<!-- Top Bar -->
<div class="bg-[#f2f2f2] text-xs text-gray-600">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between py-2">
            <div class="flex items-center gap-4">
                <span>Welcome to Smart Q Store</span>
                <span class="hidden sm:inline">|</span>
                <a href="{{ route('landing') }}" class="hover:text-[#FF6A00] transition-colors">Main Site</a>
            </div>
            <div class="flex items-center gap-4">
                <a href="#" class="hover:text-[#FF6A00] transition-colors">Help Center</a>
                <a href="#" class="hover:text-[#FF6A00] transition-colors">Buyer Protection</a>
                <span class="hidden sm:inline">|</span>
                @guest
                    <a href="{{ route('login') }}" class="hover:text-[#FF6A00] transition-colors">Sign In</a>
                @else
                    <span class="text-[#FF6A00]">{{ Auth::user()->name }}</span>
                @endguest
            </div>
        </div>
    </div>
</div>

<!-- Main Header -->
<header class="bg-white shadow-sm sticky top-0 z-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Top Section -->
        <div class="flex items-center justify-between py-4">
            <!-- Logo -->
            <a href="{{ route('shop') }}" class="flex items-center gap-2">
                <div class="text-2xl font-bold text-[#FF6A00]">
                    <i class="fas fa-box-open mr-1"></i>Smart Q
                </div>
                <span class="text-gray-400 text-sm hidden sm:inline">STORE</span>
            </a>
            
            <!-- Center Section - Deliver & Search -->
            <div class="hidden md:flex items-center gap-6 flex-1 mx-8 max-w-2xl">
                <!-- Deliver To -->
                <div class="flex items-center gap-2 text-sm">
                    <span class="text-gray-500">Deliver to:</span>
                    <div class="flex items-center gap-1 cursor-pointer hover:text-[#FF6A00]">
                        <img src="https://flagcdn.com/w20/tz.png" alt="TZ" class="w-5 h-auto">
                        <span class="font-medium">TZ</span>
                        <i class="fas fa-chevron-down text-xs"></i>
                    </div>
                </div>
                
                <!-- Search Bar -->
                <div class="flex-1 relative">
                    <form action="{{ route('shop') }}" method="GET" class="flex">
                        <input type="text" name="search" placeholder="Search products, suppliers..." 
                            value="{{ request('search') }}"
                            class="flex-1 px-4 py-2.5 border-2 border-[#FF6A00] rounded-l-lg focus:outline-none focus:border-[#FF6A00]">
                        <button type="submit" class="px-6 py-2.5 bg-[#FF6A00] text-white font-medium rounded-r-lg hover:bg-[#e65c00] transition-colors">
                            <i class="fas fa-search"></i> Search
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- Right Section -->
            <div class="flex items-center gap-4">
                <!-- Language -->
                <div class="hidden lg:flex items-center gap-1 text-sm cursor-pointer hover:text-[#FF6A00]">
                    <i class="fas fa-globe"></i>
                    <span>English-TZS</span>
                    <i class="fas fa-chevron-down text-xs"></i>
                </div>
                
                <!-- Cart -->
                <a href="{{ route('cart') }}" class="relative p-2 hover:text-[#FF6A00] transition-colors">
                    <i class="fas fa-shopping-cart text-xl"></i>
                    <span id="cart-count" class="absolute -top-1 -right-1 w-5 h-5 bg-[#FF6A00] text-white text-xs rounded-full flex items-center justify-center font-bold">0</span>
                </a>
                
                <!-- Sign In -->
                @guest
                    <a href="{{ route('login') }}" class="hidden sm:flex items-center gap-1 text-sm hover:text-[#FF6A00] transition-colors">
                        <i class="far fa-user"></i>
                        <span>Sign in</span>
                    </a>
                @else
                    <div class="relative group">
                        <button class="flex items-center gap-1 text-sm hover:text-[#FF6A00]">
                            <i class="far fa-user"></i>
                            <span class="hidden sm:inline">{{ Str::limit(Auth::user()->name, 10) }}</span>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </button>
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl py-2 hidden group-hover:block border">
                            <a href="{{ url('/home') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">My Account</a>
                            <a href="{{ route('cart') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">My Orders</a>
                            <form method="POST" action="{{ route('logout') }}" class="block">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Sign Out</button>
                            </form>
                        </div>
                    </div>
                @endguest
                
                <!-- Create Account Button -->
                @guest
                    <a href="{{ route('register') }}" class="hidden sm:inline-flex items-center gap-2 px-5 py-2 bg-[#FF6A00] text-white text-sm font-medium rounded-full hover:bg-[#e65c00] transition-colors">
                        Create account
                    </a>
                @endif
                
                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="lg:hidden p-2 text-gray-700 hover:text-[#FF6A00]">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
        
        <!-- Navigation Bar -->
        <nav class="hidden lg:flex items-center justify-between py-3 border-t border-gray-100">
            <div class="flex items-center gap-8">
                <!-- All Categories Dropdown -->
                <div class="relative group">
                    <button class="flex items-center gap-2 font-medium hover:text-[#FF6A00] transition-colors">
                        <i class="fas fa-th-large"></i>
                        All Categories
                        <i class="fas fa-chevron-down text-xs"></i>
                    </button>
                    <div class="absolute left-0 top-full mt-2 w-64 bg-white rounded-lg shadow-xl py-2 hidden group-hover:block border z-50">
                        @foreach($categories ?? [] as $cat)
                            <a href="{{ route('shop.category', $cat->slug) }}" class="flex items-center gap-3 px-4 py-3 hover:bg-gray-50 transition-colors">
                                <i class="{{ $cat->icon }} text-[#FF6A00] w-5"></i>
                                <span>{{ $cat->name }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
                
                <a href="{{ route('shop') }}?featured=1" class="text-sm hover:text-[#FF6A00] transition-colors">Featured Products</a>
                <a href="{{ route('shop') }}?sort=price_low" class="text-sm hover:text-[#FF6A00] transition-colors">Best Deals</a>
                <a href="#" class="text-sm hover:text-[#FF6A00] transition-colors">New Arrivals</a>
                <a href="#" class="text-sm hover:text-[#FF6A00] transition-colors">Order Protection</a>
            </div>
            
            <div class="flex items-center gap-6 text-sm">
                <a href="#" class="hover:text-[#FF6A00] transition-colors">Buyer Central</a>
                <a href="#" class="hover:text-[#FF6A00] transition-colors">Help Center</a>
                <a href="#" class="hover:text-[#FF6A00] transition-colors">Get App</a>
                <a href="#" class="hover:text-[#FF6A00] transition-colors">Become a Supplier</a>
            </div>
        </nav>
        
        <!-- Mobile Search (visible only on mobile) -->
        <div class="md:hidden pb-4">
            <form action="{{ route('shop') }}" method="GET" class="flex">
                <input type="text" name="search" placeholder="Search products..." 
                    class="flex-1 px-4 py-2 border-2 border-[#FF6A00] rounded-l-lg focus:outline-none text-sm">
                <button type="submit" class="px-4 py-2 bg-[#FF6A00] text-white rounded-r-lg">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
    </div>
    
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="lg:hidden hidden bg-white border-t shadow-lg">
        <div class="container mx-auto px-4 py-4 space-y-4">
            <!-- Categories -->
            <div class="border-b pb-4">
                <h4 class="font-semibold mb-3 text-gray-500 text-sm uppercase">Categories</h4>
                <div class="space-y-2">
                    @foreach($categories ?? [] as $cat)
                        <a href="{{ route('shop.category', $cat->slug) }}" class="flex items-center gap-3 py-2 text-gray-700 hover:text-[#FF6A00]">
                            <i class="{{ $cat->icon }} w-5"></i>
                            {{ $cat->name }}
                        </a>
                    @endforeach
                </div>
            </div>
            
            <!-- Quick Links -->
            <div class="border-b pb-4">
                <h4 class="font-semibold mb-3 text-gray-500 text-sm uppercase">Quick Links</h4>
                <div class="space-y-2">
                    <a href="{{ route('shop') }}" class="block py-2 text-gray-700 hover:text-[#FF6A00]">All Products</a>
                    <a href="{{ route('cart') }}" class="block py-2 text-gray-700 hover:text-[#FF6A00]">Shopping Cart</a>
                    <a href="#" class="block py-2 text-gray-700 hover:text-[#FF6A00]">My Orders</a>
                    <a href="#" class="block py-2 text-gray-700 hover:text-[#FF6A00]">Help Center</a>
                </div>
            </div>
            
            <!-- Auth -->
            <div class="flex gap-3">
                @guest
                    <a href="{{ route('login') }}" class="flex-1 py-3 border-2 border-[#FF6A00] text-[#FF6A00] text-center rounded-lg font-medium">
                        Sign In
                    </a>
                    <a href="{{ route('register') }}" class="flex-1 py-3 bg-[#FF6A00] text-white text-center rounded-lg font-medium">
                        Create Account
                    </a>
                @else
                    <a href="{{ url('/home') }}" class="flex-1 py-3 bg-[#FF6A00] text-white text-center rounded-lg font-medium">
                        My Account
                    </a>
                @endguest
            </div>
        </div>
    </div>
</header>

<!-- Spacer -->
<div class="h-4"></div>

<!-- Cart Update Script -->
<script>
    // Update cart count from session
    function updateCartCount() {
        fetch('{{ route("cart.count") }}')
            .then(response => response.json())
            .then(data => {
                const cartCount = document.getElementById('cart-count');
                if (cartCount) {
                    cartCount.textContent = data.count || 0;
                }
            })
            .catch(error => console.error('Error:', error));
    }
    
    // Update on page load
    document.addEventListener('DOMContentLoaded', updateCartCount);
</script>
