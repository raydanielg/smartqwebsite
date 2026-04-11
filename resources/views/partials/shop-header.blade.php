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
            <!-- Left Navigation -->
            <div class="flex items-center gap-1">
                <!-- All Categories Dropdown -->
                <div class="relative group">
                    <button class="flex items-center gap-2 px-3 py-2 font-medium hover:text-[#FF6A00] transition-colors rounded-lg hover:bg-gray-50">
                        <i class="fas fa-th-large"></i>
                        All categories
                        <i class="fas fa-chevron-down text-xs"></i>
                    </button>
                    <div class="absolute left-0 top-full mt-1 w-72 bg-white rounded-xl shadow-2xl py-3 hidden group-hover:block border z-50 animate-fadeIn">
                        <div class="px-4 py-2 border-b border-gray-100 mb-2">
                            <span class="text-xs text-gray-500 uppercase font-semibold">Browse Categories</span>
                        </div>
                        @foreach($categories ?? [] as $cat)
                            <a href="{{ route('shop.category', $cat->slug) }}" class="flex items-center gap-3 px-4 py-2.5 hover:bg-orange-50 transition-colors group/item">
                                <div class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center group-hover/item:bg-orange-200 transition-colors">
                                    <i class="{{ $cat->icon }} text-[#FF6A00] text-sm"></i>
                                </div>
                                <div>
                                    <span class="font-medium text-gray-800">{{ $cat->name }}</span>
                                    <div class="text-xs text-gray-500">{{ $cat->products_count ?? rand(10, 500) }} products</div>
                                </div>
                                <i class="fas fa-chevron-right text-xs text-gray-400 ml-auto"></i>
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Verified Manufacturers -->
                <div class="relative group">
                    <a href="{{ route('manufacturers') }}" class="flex items-center gap-1.5 px-3 py-2 text-sm hover:text-[#FF6A00] transition-colors rounded-lg hover:bg-gray-50" title="Connect with verified suppliers and manufacturers">
                        <i class="fas fa-badge-check text-blue-500"></i>
                        Verified manufacturers
                    </a>
                    <!-- Tooltip -->
                    <div class="absolute left-1/2 -translate-x-1/2 top-full mt-2 w-64 bg-gray-900 text-white text-xs p-3 rounded-lg shadow-xl opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none z-50">
                        <i class="fas fa-info-circle mr-1"></i> 
                        All suppliers are pre-verified for quality and reliability. Shop with confidence.
                        <div class="absolute -top-1 left-1/2 -translate-x-1/2 w-2 h-2 bg-gray-900 rotate-45"></div>
                    </div>
                </div>

                <!-- Order Protection -->
                <div class="relative group">
                    <a href="{{ route('order.protection') }}" class="flex items-center gap-1.5 px-3 py-2 text-sm hover:text-[#FF6A00] transition-colors rounded-lg hover:bg-gray-50" title="Your orders are protected">
                        <i class="fas fa-shield-alt text-green-500"></i>
                        Order protections
                    </a>
                    <div class="absolute left-1/2 -translate-x-1/2 top-full mt-2 w-64 bg-gray-900 text-white text-xs p-3 rounded-lg shadow-xl opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none z-50">
                        <i class="fas fa-shield-alt mr-1"></i>
                        Full refund if products don't match description. Damage protection included.
                        <div class="absolute -top-1 left-1/2 -translate-x-1/2 w-2 h-2 bg-gray-900 rotate-45"></div>
                    </div>
                </div>

                <!-- Accio Work -->
                <div class="relative group">
                    <a href="{{ route('accio-work') }}" class="flex items-center gap-1.5 px-3 py-2 text-sm hover:text-[#FF6A00] transition-colors rounded-lg hover:bg-gray-50" title="Custom manufacturing solutions">
                        <i class="fas fa-industry text-purple-500"></i>
                        Accio Work
                    </a>
                    <div class="absolute left-1/2 -translate-x-1/2 top-full mt-2 w-64 bg-gray-900 text-white text-xs p-3 rounded-lg shadow-xl opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none z-50">
                        <i class="fas fa-cogs mr-1"></i>
                        Custom manufacturing and OEM services for your business needs.
                        <div class="absolute -top-1 left-1/2 -translate-x-1/2 w-2 h-2 bg-gray-900 rotate-45"></div>
                    </div>
                </div>

                <!-- Tax Exemption -->
                <div class="relative group">
                    <a href="{{ route('tax-exemption') }}" class="flex items-center gap-1.5 px-3 py-2 text-sm hover:text-[#FF6A00] transition-colors rounded-lg hover:bg-gray-50" title="Tax exemption program for businesses">
                        <i class="fas fa-calculator text-teal-500"></i>
                        Tax exemption
                    </a>
                    <div class="absolute left-1/2 -translate-x-1/2 top-full mt-2 w-64 bg-gray-900 text-white text-xs p-3 rounded-lg shadow-xl opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none z-50">
                        <i class="fas fa-percentage mr-1"></i>
                        Business customers can apply for tax-exempt purchasing and refunds.
                        <div class="absolute -top-1 left-1/2 -translate-x-1/2 w-2 h-2 bg-gray-900 rotate-45"></div>
                    </div>
                </div>
            </div>
            
            <!-- Right Navigation -->
            <div class="flex items-center gap-1">
                <!-- Buyer Central -->
                <div class="relative group">
                    <a href="{{ route('buyer-central') }}" class="flex items-center gap-1.5 px-3 py-2 text-sm hover:text-[#FF6A00] transition-colors rounded-lg hover:bg-gray-50" title="Tools and resources for buyers">
                        <i class="fas fa-briefcase text-[#FF6A00]"></i>
                        Buyer Central
                    </a>
                    <div class="absolute right-0 top-full mt-2 w-72 bg-white rounded-xl shadow-2xl py-3 hidden group-hover:block border z-50 animate-fadeIn">
                        <div class="px-4 py-2 border-b border-gray-100 mb-2">
                            <span class="text-xs text-gray-500 uppercase font-semibold">Buyer Tools</span>
                        </div>
                        <a href="#" class="flex items-center gap-3 px-4 py-2.5 hover:bg-orange-50 transition-colors">
                            <i class="fas fa-search-dollar text-blue-500"></i>
                            <div>
                                <div class="font-medium text-sm">Request for Quotation</div>
                                <div class="text-xs text-gray-500">Get custom quotes from suppliers</div>
                            </div>
                        </a>
                        <a href="#" class="flex items-center gap-3 px-4 py-2.5 hover:bg-orange-50 transition-colors">
                            <i class="fas fa-boxes text-green-500"></i>
                            <div>
                                <div class="font-medium text-sm">Ready to Ship</div>
                                <div class="text-xs text-gray-500">Products with fast shipping</div>
                            </div>
                        </a>
                        <a href="#" class="flex items-center gap-3 px-4 py-2.5 hover:bg-orange-50 transition-colors">
                            <i class="fas fa-file-contract text-purple-500"></i>
                            <div>
                                <div class="font-medium text-sm">Trade Assurance</div>
                                <div class="text-xs text-gray-500">Order protection & secure payment</div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Help Center -->
                <div class="relative group">
                    <a href="#" class="flex items-center gap-1.5 px-3 py-2 text-sm hover:text-[#FF6A00] transition-colors rounded-lg hover:bg-gray-50" title="Get help and support">
                        <i class="fas fa-headset text-cyan-500"></i>
                        Help Center
                    </a>
                    <div class="absolute right-0 top-full mt-2 w-64 bg-white rounded-xl shadow-2xl py-3 hidden group-hover:block border z-50">
                        <div class="px-4 py-2 border-b border-gray-100 mb-2">
                            <span class="text-xs text-gray-500 uppercase font-semibold">Support</span>
                        </div>
                        <a href="#" class="block px-4 py-2 hover:bg-orange-50 text-sm"><i class="fas fa-question-circle mr-2 text-gray-400"></i>FAQs</a>
                        <a href="#" class="block px-4 py-2 hover:bg-orange-50 text-sm"><i class="fas fa-comment-dots mr-2 text-gray-400"></i>Live Chat</a>
                        <a href="#" class="block px-4 py-2 hover:bg-orange-50 text-sm"><i class="fas fa-envelope mr-2 text-gray-400"></i>Contact Us</a>
                    </div>
                </div>

                <!-- App & Extension -->
                <div class="relative group">
                    <a href="#" class="flex items-center gap-1.5 px-3 py-2 text-sm hover:text-[#FF6A00] transition-colors rounded-lg hover:bg-gray-50" title="Download our mobile app">
                        <i class="fas fa-mobile-alt text-pink-500"></i>
                        App & extension
                    </a>
                    <div class="absolute right-0 top-full mt-2 w-56 bg-white rounded-xl shadow-2xl p-4 hidden group-hover:block border z-50">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-orange-100 rounded-xl mx-auto mb-3 flex items-center justify-center">
                                <i class="fas fa-qrcode text-3xl text-[#FF6A00]"></i>
                            </div>
                            <p class="text-sm font-medium mb-2">Scan to download app</p>
                            <p class="text-xs text-gray-500 mb-3">Shop on the go!</p>
                            <div class="flex gap-2 justify-center">
                                <button class="px-3 py-1.5 bg-gray-900 text-white text-xs rounded-lg">
                                    <i class="fab fa-apple mr-1"></i>iOS
                                </button>
                                <button class="px-3 py-1.5 bg-gray-900 text-white text-xs rounded-lg">
                                    <i class="fab fa-android mr-1"></i>Android
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Become a Supplier -->
                <div class="relative group">
                    <a href="{{ route('become-supplier') }}" class="flex items-center gap-1.5 px-3 py-2 text-sm hover:text-[#FF6A00] transition-colors rounded-lg hover:bg-gray-50" title="Sell your products on our platform">
                        <i class="fas fa-store text-indigo-500"></i>
                        Become a supplier
                    </a>
                    <div class="absolute right-0 top-full mt-2 w-64 bg-gray-900 text-white text-xs p-3 rounded-lg shadow-xl opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none z-50">
                        <i class="fas fa-handshake mr-1"></i>
                        Join 10,000+ suppliers. Expand your business to Africa. Free registration.
                        <div class="absolute -top-1 right-4 w-2 h-2 bg-gray-900 rotate-45"></div>
                    </div>
                </div>
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
