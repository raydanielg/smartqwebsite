@extends('layouts.shop')

@section('title', 'Shop - Smart Q Store')

@section('content')
<!-- Alibaba-Style Hero Section -->
<section class="bg-gray-100 py-4">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Top Quick Links -->
        <div class="flex items-center gap-6 mb-4 text-sm">
            <a href="#" class="flex items-center gap-2 text-gray-700 hover:text-[#FF6A00]">
                <i class="far fa-edit"></i> Request for Quotation
            </a>
            <a href="#" class="flex items-center gap-2 text-gray-700 hover:text-[#FF6A00]">
                <i class="fas fa-crown"></i> Top Ranking
            </a>
            <a href="#" class="flex items-center gap-2 text-gray-700 hover:text-[#FF6A00]">
                <i class="fas fa-magic"></i> Fast customization
            </a>
        </div>

        <!-- Main Hero Grid -->
        <div class="grid grid-cols-12 gap-4">
            <!-- Left Sidebar - Categories (Scrollable - 6 visible) -->
            <div class="col-span-12 lg:col-span-3">
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="bg-[#FF6A00] text-white px-4 py-3 font-semibold flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-list"></i> Categories
                        </div>
                        <span class="text-xs bg-white/20 px-2 py-1 rounded">{{ $categories->count() }} total</span>
                    </div>
                    <div class="divide-y divide-gray-100 max-h-[320px] overflow-y-auto scrollbar-thin">
                        @foreach($categories->take(12) as $cat)
                        <a href="{{ route('shop.category', $cat->slug) }}" class="flex items-center gap-3 px-4 py-3 hover:bg-orange-50 transition-colors group">
                            <div class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center group-hover:bg-orange-100">
                                <i class="{{ $cat->icon }} text-gray-600 group-hover:text-[#FF6A00] text-lg"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <span class="text-sm font-medium text-gray-700 group-hover:text-[#FF6A00] block truncate">{{ $cat->name }}</span>
                                <span class="text-xs text-gray-400">{{ rand(50, 500) }} items</span>
                            </div>
                            <i class="fas fa-chevron-right text-xs text-gray-400 ml-auto flex-shrink-0"></i>
                        </a>
                        @endforeach
                    </div>
                    <div class="px-4 py-2 bg-gray-50 border-t text-center">
                        <a href="#" class="text-xs text-[#FF6A00] hover:underline font-medium">
                            View all categories <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Center - Main Hero Image & Products -->
            <div class="col-span-12 lg:col-span-6 space-y-4">
                <!-- Main Hero Image -->
                <div class="relative rounded-xl overflow-hidden shadow-lg group" style="height: 200px;">
                    <img src="{{ asset('34337.jpg') }}" alt="SmartQ Hero" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-r from-black/60 to-transparent flex items-center">
                        <div class="p-6 text-white">
                            <span class="bg-[#FF6A00] text-xs font-bold px-3 py-1 rounded-full mb-2 inline-block">NEW ARRIVAL</span>
                            <h2 class="text-2xl font-bold mb-1">Premium Collection 2025</h2>
                            <p class="text-sm text-gray-200 mb-3">Discover quality products at unbeatable prices</p>
                            <a href="#" class="inline-flex items-center gap-2 px-4 py-2 bg-white text-gray-900 rounded-full text-sm font-semibold hover:bg-gray-100 transition-colors">
                                Shop Now <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Featured Product Cards -->
                <div class="grid grid-cols-3 gap-3">
                    @foreach($featuredProducts->take(3) as $product)
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow border border-gray-100">
                        <a href="{{ route('shop.product', $product->slug) }}" class="block">
                            <div class="aspect-square bg-gray-100 relative overflow-hidden">
                                @if($product->image)
                                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <i class="fas fa-box text-3xl text-gray-300"></i>
                                    </div>
                                @endif
                                <div class="absolute top-2 right-2 bg-[#FF6A00] text-white text-xs font-bold px-2 py-1 rounded">
                                    -{{ rand(15, 45) }}%
                                </div>
                            </div>
                            <div class="p-2">
                                <p class="text-xs text-gray-500 mb-1">Hot Selling</p>
                                <p class="font-medium text-xs text-gray-800 line-clamp-2">{{ $product->name }}</p>
                                <div class="flex items-center gap-1 mt-1">
                                    <span class="font-bold text-[#FF6A00] text-sm">${{ number_format($product->final_price * 0.75, 2) }}</span>
                                    <span class="text-xs text-gray-400 line-through">${{ number_format($product->final_price, 2) }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Right - Super Deals Carousel -->
            <div class="col-span-12 lg:col-span-3">
                <div class="bg-gradient-to-br from-orange-500 to-red-600 rounded-xl overflow-hidden text-white shadow-lg">
                    <!-- Header -->
                    <div class="p-4 border-b border-white/20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-bolt text-yellow-300 text-xl"></i>
                                <h3 class="font-bold text-lg">Super Deals</h3>
                            </div>
                            <span class="text-xs bg-white/20 px-2 py-1 rounded-full animate-pulse">Live</span>
                        </div>
                        <p class="text-sm text-orange-100 mt-1">Up to 70% off</p>
                    </div>
                    
                    <!-- Deals Carousel -->
                    <div class="relative overflow-hidden" style="height: 280px;">
                        <div id="deals-carousel" class="flex transition-transform duration-500" style="width: 300%;">
                            @foreach($featuredProducts->take(3) as $index => $deal)
                            <div class="w-1/3 p-3 flex-shrink-0">
                                <a href="{{ route('shop.product', $deal->slug) }}" class="block bg-white rounded-lg overflow-hidden text-gray-800 group">
                                    <div class="aspect-square relative overflow-hidden">
                                        @if($deal->image)
                                            <img src="{{ $deal->image }}" alt="{{ $deal->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                        @else
                                            <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                                <i class="fas fa-image text-4xl text-gray-400"></i>
                                            </div>
                                        @endif
                                        <div class="absolute top-2 left-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded">
                                            -{{ rand(30, 70) }}%
                                        </div>
                                    </div>
                                    <div class="p-3">
                                        <p class="text-xs text-gray-500 line-clamp-1">{{ $deal->name }}</p>
                                        <div class="flex items-center gap-2 mt-1">
                                            <span class="font-bold text-[#FF6A00] text-lg">${{ number_format($deal->final_price * 0.6, 2) }}</span>
                                            <span class="text-xs text-gray-400 line-through">${{ number_format($deal->final_price, 2) }}</span>
                                        </div>
                                        <div class="mt-2 bg-red-50 rounded-full h-1.5 overflow-hidden">
                                            <div class="bg-red-500 h-full rounded-full" style="width: {{ rand(40, 90) }}%"></div>
                                        </div>
                                        <p class="text-xs text-red-500 mt-1">{{ rand(5, 50) }} sold</p>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                        
                        <!-- Carousel Controls -->
                        <button onclick="moveCarousel(-1)" class="absolute left-2 top-1/2 -translate-y-1/2 w-8 h-8 bg-white/90 rounded-full flex items-center justify-center text-gray-700 hover:bg-white shadow-lg">
                            <i class="fas fa-chevron-left text-xs"></i>
                        </button>
                        <button onclick="moveCarousel(1)" class="absolute right-2 top-1/2 -translate-y-1/2 w-8 h-8 bg-white/90 rounded-full flex items-center justify-center text-gray-700 hover:bg-white shadow-lg">
                            <i class="fas fa-chevron-right text-xs"></i>
                        </button>
                        
                        <!-- Dots -->
                        <div class="absolute bottom-2 left-1/2 -translate-x-1/2 flex gap-1">
                            @foreach($featuredProducts->take(3) as $index => $deal)
                            <button onclick="goToSlide({{ $index }})" class="deal-dot w-2 h-2 rounded-full bg-white/50 hover:bg-white transition-colors {{ $index == 0 ? 'bg-white' : '' }}" data-index="{{ $index }}"></button>
                            @endforeach
                        </div>
                    </div>
                    
                    <!-- Countdown -->
                    <div class="px-4 py-3 bg-black/20 border-t border-white/20">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-orange-100">Ending in:</span>
                            <div class="flex items-center gap-1 font-mono">
                                <span class="bg-white/20 px-2 py-1 rounded text-xs" id="countdown-hours">04</span>:
                                <span class="bg-white/20 px-2 py-1 rounded text-xs" id="countdown-minutes">32</span>:
                                <span class="bg-white/20 px-2 py-1 rounded text-xs" id="countdown-seconds">15</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Tags -->
                <div class="mt-4 bg-white rounded-lg shadow-sm p-4">
                    <h4 class="font-semibold text-sm mb-3 flex items-center gap-2">
                        <i class="fas fa-fire text-red-500"></i> Trending
                    </h4>
                    <div class="flex flex-wrap gap-2">
                        @php
                        $trending = ['Flash Sale', 'New Arrival', 'Free Shipping', 'Best Seller', 'Limited'];
                        $colors = ['red', 'orange', 'blue', 'green', 'purple'];
                        @endphp
                        @foreach($trending as $index => $tag)
                        <span class="px-3 py-1.5 bg-{{ $colors[$index] }}-100 text-{{ $colors[$index] }}-600 rounded-full text-xs font-medium cursor-pointer hover:bg-{{ $colors[$index] }}-200 transition-colors">
                            {{ $tag }}
                        </span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Fast Customization Section -->
<section class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 py-12">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-8 items-center">
            <!-- Left Content -->
            <div class="lg:w-1/3 text-white">
                <div class="flex items-center gap-2 mb-4">
                    <i class="fas fa-magic text-[#FF6A00] text-2xl"></i>
                    <h2 class="text-2xl font-bold">Fast customization</h2>
                </div>
                <p class="text-gray-300 mb-6">Realize your custom product ideas fast and easy</p>
                <ul class="space-y-3 text-sm text-gray-400">
                    <li class="flex items-center gap-2">
                        <i class="fas fa-circle text-[#FF6A00] text-xs"></i> Low MOQ
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fas fa-circle text-[#FF6A00] text-xs"></i> 14-day dispatch
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fas fa-circle text-[#FF6A00] text-xs"></i> Free branding
                    </li>
                </ul>
                <a href="{{ route('accio-work') }}" class="mt-6 inline-flex items-center gap-2 px-6 py-3 bg-white text-gray-900 rounded-full font-medium hover:bg-gray-100 transition-colors">
                    Explore now <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <!-- Right Products -->
            <div class="lg:w-2/3 grid grid-cols-2 sm:grid-cols-4 gap-4">
                @foreach($products->take(4) as $product)
                <div class="bg-white rounded-lg overflow-hidden group">
                    <a href="{{ route('shop.product', $product->slug) }}" class="block">
                        <div class="aspect-square bg-gray-100 relative overflow-hidden">
                            @if($product->image)
                                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <i class="fas fa-box text-4xl text-gray-300"></i>
                                </div>
                            @endif
                            @if($product->is_customizable ?? false)
                                <span class="absolute top-2 left-2 bg-gray-900 text-white text-xs px-2 py-1 rounded">Logo/Print</span>
                            @endif
                        </div>
                        <div class="p-3">
                            <p class="font-bold text-gray-900">TSh {{ number_format($product->price * 2500, 0) }}</p>
                            <p class="text-xs text-gray-500">MOQ: {{ rand(1, 100) }}</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Products Grid Section -->
<section class="section-padding bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-900">All Products</h2>
            <div class="flex items-center gap-4">
                <form action="{{ route('shop') }}" method="GET" class="flex items-center gap-2">
                    <select name="sort" onchange="this.form.submit()" class="px-4 py-2 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-[#FF6A00]">
                        <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
                        <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                        <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                    </select>
                </form>
            </div>
        </div>

        @if($products->count() > 0)
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach($products as $product)
            <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow group">
                <a href="{{ route('shop.product', $product->slug) }}" class="block relative aspect-square bg-gray-100 overflow-hidden">
                    @if($product->image)
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <i class="fas fa-box text-5xl text-gray-300"></i>
                        </div>
                    @endif
                    @if($product->is_on_sale)
                        <span class="absolute top-2 left-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded">SALE</span>
                    @endif
                </a>
                <div class="p-4">
                    <div class="text-xs text-[#FF6A00] font-medium mb-1">{{ $product->category->name }}</div>
                    <a href="{{ route('shop.product', $product->slug) }}" class="block font-semibold text-gray-900 hover:text-[#FF6A00] transition-colors mb-2 line-clamp-2 text-sm">
                        {{ $product->name }}
                    </a>
                    <div class="flex items-center justify-between">
                        <div>
                            @if($product->is_on_sale)
                                <span class="text-lg font-bold text-[#FF6A00]">${{ number_format($product->final_price, 2) }}</span>
                                <span class="text-sm text-gray-400 line-through ml-1">${{ number_format($product->price, 2) }}</span>
                            @else
                                <span class="text-lg font-bold text-[#FF6A00]">${{ number_format($product->price, 2) }}</span>
                            @endif
                        </div>
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="w-8 h-8 bg-[#FF6A00] text-white rounded-full flex items-center justify-center hover:bg-[#e65c00] transition-colors">
                                <i class="fas fa-plus text-xs"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $products->links() }}
        </div>
        @else
        <div class="text-center py-16 bg-white rounded-lg">
            <i class="fas fa-search text-6xl text-gray-300 mb-4"></i>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">No products found</h3>
            <p class="text-gray-600">Try adjusting your search or filters</p>
        </div>
        @endif
    </div>
</section>

@push('scripts')
<script>
    // Deals Carousel
    let currentSlide = 0;
    const totalSlides = 3;
    const carousel = document.getElementById('deals-carousel');
    const dots = document.querySelectorAll('.deal-dot');

    function moveCarousel(direction) {
        currentSlide += direction;
        if (currentSlide < 0) currentSlide = totalSlides - 1;
        if (currentSlide >= totalSlide) currentSlide = 0;
        updateCarousel();
    }

    function goToSlide(index) {
        currentSlide = index;
        updateCarousel();
    }

    function updateCarousel() {
        if (carousel) {
            carousel.style.transform = `translateX(-${currentSlide * 33.333}%)`;
        }
        dots.forEach((dot, index) => {
            dot.classList.toggle('bg-white', index === currentSlide);
            dot.classList.toggle('bg-white/50', index !== currentSlide);
        });
    }

    // Auto-advance carousel
    setInterval(() => {
        moveCarousel(1);
    }, 4000);

    // Countdown Timer
    function updateCountdown() {
        const hours = document.getElementById('countdown-hours');
        const minutes = document.getElementById('countdown-minutes');
        const seconds = document.getElementById('countdown-seconds');

        if (!hours || !minutes || !seconds) return;

        let h = parseInt(hours.textContent);
        let m = parseInt(minutes.textContent);
        let s = parseInt(seconds.textContent);

        s--;
        if (s < 0) {
            s = 59;
            m--;
            if (m < 0) {
                m = 59;
                h--;
                if (h < 0) {
                    h = 23;
                }
            }
        }

        hours.textContent = h.toString().padStart(2, '0');
        minutes.textContent = m.toString().padStart(2, '0');
        seconds.textContent = s.toString().padStart(2, '0');
    }

    setInterval(updateCountdown, 1000);

    // Scroll reveal animation
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    document.querySelectorAll('.group').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        observer.observe(el);
    });
</script>
@endpush
@endsection
