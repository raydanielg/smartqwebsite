@extends('layouts.main')

@section('title', 'Shop - Smart Q Store')

@section('content')
<!-- Shop Hero -->
<section class="bg-gradient-to-br from-[#8B4513] to-[#654321] text-white py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl font-bold mb-4">Our Shop</h1>
            <p class="text-white/80 max-w-2xl mx-auto">
                Browse our collection of quality products imported directly from China. 
                Electronics, fashion, home goods, and more at competitive prices.
            </p>
        </div>
    </div>
</section>

<!-- Shop Content -->
<section class="section-padding bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar Filters -->
            <div class="lg:w-64 flex-shrink-0">
                <div class="bg-white rounded-xl shadow-sm p-6 sticky top-24">
                    <h3 class="font-semibold text-lg mb-4 flex items-center gap-2">
                        <i class="fas fa-filter text-[#8B4513]"></i> Filters
                    </h3>
                    
                    <!-- Search -->
                    <form action="{{ route('shop') }}" method="GET" class="mb-6">
                        <div class="relative">
                            <input type="text" name="search" value="{{ request('search') }}" 
                                placeholder="Search products..."
                                class="w-full px-4 py-2 pl-10 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#8B4513] focus:border-transparent">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                    </form>
                    
                    <!-- Categories -->
                    <div class="mb-6">
                        <h4 class="font-medium mb-3">Categories</h4>
                        <div class="space-y-2">
                            <a href="{{ route('shop') }}" 
                                class="block py-2 px-3 rounded-lg {{ !request('category') ? 'bg-[#8B4513] text-white' : 'text-gray-600 hover:bg-gray-100' }} transition-colors">
                                All Products
                            </a>
                            @foreach($categories as $cat)
                                <a href="{{ route('shop', ['category' => $cat->id]) }}" 
                                    class="block py-2 px-3 rounded-lg {{ request('category') == $cat->id ? 'bg-[#8B4513] text-white' : 'text-gray-600 hover:bg-gray-100' }} transition-colors">
                                    <i class="{{ $cat->icon }} w-5"></i> {{ $cat->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                    
                    <!-- Sort -->
                    <div>
                        <h4 class="font-medium mb-3">Sort By</h4>
                        <form action="{{ route('shop') }}" method="GET" id="sort-form">
                            @foreach(request()->except('sort', 'page') as $key => $value)
                                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                            @endforeach
                            <select name="sort" onchange="this.form.submit()" 
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#8B4513]">
                                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest First</option>
                                <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                                <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name: A to Z</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Products Grid -->
            <div class="flex-1">
                <!-- Results Header -->
                <div class="flex items-center justify-between mb-6">
                    <p class="text-gray-600">
                        Showing <span class="font-semibold">{{ $products->firstItem() ?? 0 }}-{{ $products->lastItem() ?? 0 }}</span> 
                        of <span class="font-semibold">{{ $products->total() }}</span> products
                    </p>
                </div>
                
                @if($products->count() > 0)
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($products as $product)
                            <div class="bg-white rounded-xl shadow-sm overflow-hidden card-hover group">
                                <!-- Product Image -->
                                <a href="{{ route('shop.product', $product->slug) }}" class="block relative aspect-square bg-gray-100 overflow-hidden">
                                    @if($product->image)
                                        <img src="{{ $product->image }}" alt="{{ $product->name }}" 
                                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center">
                                            <i class="fas fa-box text-6xl text-gray-300"></i>
                                        </div>
                                    @endif
                                    
                                    @if($product->is_on_sale)
                                        <span class="absolute top-3 left-3 bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full">
                                            SALE
                                        </span>
                                    @endif
                                    
                                    @if($product->is_featured)
                                        <span class="absolute top-3 right-3 bg-[#D4AF37] text-white text-xs font-bold px-3 py-1 rounded-full">
                                            FEATURED
                                        </span>
                                    @endif
                                    
                                    <!-- Quick Add Button -->
                                    <form action="{{ route('cart.add') }}" method="POST" class="absolute bottom-3 right-3 opacity-0 group-hover:opacity-100 transition-opacity">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" class="w-10 h-10 bg-[#8B4513] text-white rounded-full flex items-center justify-center hover:bg-[#654321] transition-colors shadow-lg">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </form>
                                </a>
                                
                                <!-- Product Info -->
                                <div class="p-4">
                                    <div class="text-xs text-[#8B4513] font-medium mb-1">{{ $product->category->name }}</div>
                                    <a href="{{ route('shop.product', $product->slug) }}" class="block font-semibold text-gray-900 hover:text-[#8B4513] transition-colors mb-2 line-clamp-2">
                                        {{ $product->name }}
                                    </a>
                                    <p class="text-sm text-gray-500 mb-3 line-clamp-2">{{ $product->short_description }}</p>
                                    
                                    <!-- Price -->
                                    <div class="flex items-center justify-between">
                                        <div>
                                            @if($product->is_on_sale)
                                                <span class="text-lg font-bold text-[#8B4513]">${{ number_format($product->final_price, 2) }}</span>
                                                <span class="text-sm text-gray-400 line-through ml-2">${{ number_format($product->price, 2) }}</span>
                                            @else
                                                <span class="text-lg font-bold text-[#8B4513]">${{ number_format($product->price, 2) }}</span>
                                            @endif
                                        </div>
                                        <a href="{{ route('shop.product', $product->slug) }}" class="text-sm text-gray-500 hover:text-[#8B4513] transition-colors">
                                            View <i class="fas fa-arrow-right text-xs"></i>
                                        </a>
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
                    <div class="text-center py-16 bg-white rounded-xl">
                        <i class="fas fa-search text-6xl text-gray-300 mb-4"></i>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">No products found</h3>
                        <p class="text-gray-600">Try adjusting your search or filters</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Featured Products Section -->
@if($featuredProducts->count() > 0)
<section class="section-padding bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900">Featured Products</h2>
            <p class="text-gray-600 mt-2">Our most popular items this week</p>
        </div>
        
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($featuredProducts as $product)
                <div class="bg-gray-50 rounded-xl overflow-hidden card-hover">
                    <a href="{{ route('shop.product', $product->slug) }}" class="block relative aspect-square bg-gray-100">
                        @if($product->image)
                            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                        @endif
                    </a>
                    <div class="p-4">
                        <a href="{{ route('shop.product', $product->slug) }}" class="font-semibold text-gray-900 hover:text-[#8B4513]">
                            {{ Str::limit($product->name, 40) }}
                        </a>
                        <div class="mt-2 font-bold text-[#8B4513]">${{ number_format($product->final_price, 2) }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
