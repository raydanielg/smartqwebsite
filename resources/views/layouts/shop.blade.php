<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {{-- SmartQ SEO Meta Tags --}}
    {!! \App\Helpers\SEOHelper::render() !!}
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    {{-- Page Specific SEO Override --}}
    <title>@yield('seo_title', config('seo.pages.shop.title'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Custom Styles -->
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background: #f5f5f5; }
        
        /* Alibaba Orange Theme */
        :root { --primary: #FF6A00; --primary-dark: #e65c00; }
        
        .btn-primary {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 12px 24px; background: var(--primary); color: white;
            font-weight: 600; border-radius: 20px; text-decoration: none;
            transition: all 0.3s ease; border: none; cursor: pointer;
        }
        .btn-primary:hover { background: var(--primary-dark); transform: translateY(-1px); }
        
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-4px); box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        
        /* Smooth scroll */
        html { scroll-behavior: smooth; }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: var(--primary); border-radius: 4px; }
        
        /* Animations */
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        .animate-fadeIn { animation: fadeIn 0.5s ease; }
        
        @keyframes slideUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        .animate-slideUp { animation: slideUp 0.6s ease; }
        
        /* Toast notifications */
        .toast {
            position: fixed; bottom: 20px; right: 20px;
            background: #333; color: white; padding: 12px 24px;
            border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.3);
            z-index: 9999; transform: translateX(150%); transition: transform 0.3s ease;
        }
        .toast.show { transform: translateX(0); }
        .toast.success { background: #22c55e; }
        .toast.error { background: #ef4444; }
    </style>
    
    @yield('styles')
</head>
<body>
    <!-- Shop Header -->
    @include('partials.shop-header')
    
    <!-- Flash Messages -->
    @if(session('success'))
        <div class="fixed top-24 right-4 z-50 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg animate-fadeIn" id="flash-message">
            <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="fixed top-24 right-4 z-50 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg animate-fadeIn" id="flash-message">
            <i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}
        </div>
    @endif
    
    <!-- Main Content -->
    <main>
        @yield('content')
    </main>
    
    <!-- Simple Footer for Shop -->
    <footer class="bg-white border-t mt-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <h4 class="font-bold text-lg mb-4 text-[#FF6A00]">Smart Q Store</h4>
                    <p class="text-gray-600 text-sm">Your trusted partner for importing quality products from China to Tanzania.</p>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Customer Service</h4>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li><a href="#" class="hover:text-[#FF6A00]">Help Center</a></li>
                        <li><a href="#" class="hover:text-[#FF6A00]">Contact Us</a></li>
                        <li><a href="#" class="hover:text-[#FF6A00]">Order Tracking</a></li>
                        <li><a href="#" class="hover:text-[#FF6A00]">Returns & Refunds</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">About Us</h4>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li><a href="#" class="hover:text-[#FF6A00]">Company Info</a></li>
                        <li><a href="#" class="hover:text-[#FF6A00]">Careers</a></li>
                        <li><a href="#" class="hover:text-[#FF6A00]">Terms of Service</a></li>
                        <li><a href="#" class="hover:text-[#FF6A00]">Privacy Policy</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Download App</h4>
                    <div class="flex gap-2">
                        <button class="px-4 py-2 bg-gray-900 text-white rounded-lg text-sm">
                            <i class="fab fa-apple mr-1"></i> App Store
                        </button>
                        <button class="px-4 py-2 bg-gray-900 text-white rounded-lg text-sm">
                            <i class="fab fa-google-play mr-1"></i> Play Store
                        </button>
                    </div>
                </div>
            </div>
            <div class="border-t mt-8 pt-8 text-center text-sm text-gray-500">
                © {{ date('Y') }} Smart Q Store Ltd. All Rights Reserved.
            </div>
        </div>
    </footer>
    
    <!-- Toast Container -->
    <div id="toast-container"></div>
    
    <!-- Scripts -->
    <script>
        // Mobile menu toggle
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            
            if (mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                });
            }
            
            // Flash message auto-hide
            const flashMessage = document.getElementById('flash-message');
            if (flashMessage) {
                setTimeout(() => {
                    flashMessage.style.opacity = '0';
                    setTimeout(() => flashMessage.remove(), 300);
                }, 4000);
            }
            
            // Update cart count
            updateCartCount();
        });
        
        // Toast notification
        function showToast(message, type = 'success') {
            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');
            toast.className = `toast ${type}`;
            toast.innerHTML = `<i class="fas fa-${type === 'success' ? 'check' : 'exclamation'}-circle mr-2"></i>${message}`;
            container.appendChild(toast);
            
            setTimeout(() => toast.classList.add('show'), 100);
            setTimeout(() => {
                toast.classList.remove('show');
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }
        
        // Update cart count
        function updateCartCount() {
            fetch('/cart/count')
                .then(r => r.json())
                .then(data => {
                    const count = data.count || 0;
                    const cartBadge = document.getElementById('cart-count');
                    if (cartBadge) cartBadge.textContent = count;
                })
                .catch(() => {});
        }
        
        // Add to cart with AJAX
        document.querySelectorAll('.add-to-cart-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                
                fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(r => r.json())
                .then(data => {
                    if (data.success) {
                        showToast(data.message || 'Added to cart!');
                        updateCartCount();
                    }
                })
                .catch(() => showToast('Error adding to cart', 'error'));
            });
        });
    </script>
    
    @stack('scripts')
    @yield('scripts')
</body>
</html>
