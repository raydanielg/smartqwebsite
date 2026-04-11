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
            <!-- Left Sidebar - Categories (Mega Menu Style) -->
            <div class="col-span-12 lg:col-span-3">
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="bg-[#FF6A00] text-white px-4 py-3 font-semibold flex items-center gap-2">
                        <i class="fas fa-list"></i> Categories
                    </div>
                    <div class="divide-y divide-gray-100">
                        @foreach($categories as $cat)
                        <a href="{{ route('shop.category', $cat->slug) }}" class="flex items-center gap-3 px-4 py-3 hover:bg-orange-50 transition-colors group">
                            <div class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center group-hover:bg-orange-100">
                                <i class="{{ $cat->icon }} text-gray-600 group-hover:text-[#FF6A00]"></i>
                            </div>
                            <span class="text-sm text-gray-700 group-hover:text-[#FF6A00]">{{ $cat->name }}</span>
                            <i class="fas fa-chevron-right text-xs text-gray-400 ml-auto"></i>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Center - Featured Products Grid -->
            <div class="col-span-12 lg:col-span-6">
                <div class="grid grid-cols-3 gap-4">
                    <!-- Product Cards -->
                    @foreach($featuredProducts->take(3) as $product)
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                        <a href="{{ route('shop.product', $product->slug) }}" class="block">
                            <div class="aspect-[4/3] bg-gray-100 relative overflow-hidden">
                                @if($product->image)
                                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover hover:scale-105 transition-transform">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <i class="fas fa-box text-3xl text-gray-300"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="p-3">
                                <h4 class="text-xs text-gray-500 mb-1">Frequently searched</h4>
                                <p class="font-medium text-sm text-gray-800 line-clamp-2">{{ $product->name }}</p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>

                <!-- Banner/Ad Space -->
                <div class="mt-4 bg-gradient-to-r from-orange-100 to-orange-50 rounded-lg p-4 flex items-center justify-between">
                    <div>
                        <h3 class="font-bold text-lg text-orange-800">Super April Exclusives</h3>
                        <p class="text-sm text-orange-600">Up to 50% off on selected items</p>
                    </div>
                    <a href="#" class="px-4 py-2 bg-[#FF6A00] text-white rounded-full text-sm font-medium hover:bg-[#e65c00]">
                        View more
                    </a>
                </div>
            </div>

            <!-- Right - Promotional Cards -->
            <div class="col-span-12 lg:col-span-3 space-y-4">
                <!-- Super Deals Card -->
                <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg p-4 text-white">
                    <h3 class="font-bold text-lg mb-1">Super Deals</h3>
                    <p class="text-sm text-orange-100 mb-3">Limited time offers</p>
                    <div class="flex gap-2">
                        <div class="bg-white/20 rounded px-2 py-1 text-xs">
                            <i class="fas fa-tag mr-1"></i>50% OFF
                        </div>
                    </div>
                </div>

                <!-- Categories for you -->
                <div class="bg-white rounded-lg shadow-sm p-4">
                    <h4 class="font-semibold text-sm mb-3 flex items-center gap-2">
                        <i class="fas fa-star text-[#FF6A00]"></i> Categories for you
                    </h4>
                    <div class="flex flex-wrap gap-2">
                        @foreach($categories->take(5) as $cat)
                        <a href="{{ route('shop.category', $cat->slug) }}" class="px-3 py-1.5 bg-gray-100 rounded-full text-xs text-gray-700 hover:bg-orange-100 hover:text-[#FF6A00] transition-colors">
                            {{ $cat->name }}
                        </a>
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
@endsection
