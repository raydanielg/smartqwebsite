@extends('layouts.main')

@section('title', $category->name . ' - Smart Q Store')

@section('content')
<!-- Category Hero -->
<section class="bg-gradient-to-br from-[#8B4513] to-[#654321] text-white py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-white/20 rounded-full mb-4">
                <i class="{{ $category->icon }} text-3xl"></i>
            </div>
            <h1 class="text-4xl font-bold mb-4">{{ $category->name }}</h1>
            <p class="text-white/80 max-w-2xl mx-auto">{{ $category->description }}</p>
        </div>
    </div>
</section>

<!-- Category Products -->
<section class="section-padding bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar - Other Categories -->
            <div class="lg:w-64 flex-shrink-0">
                <div class="bg-white rounded-xl shadow-sm p-6 sticky top-24">
                    <h3 class="font-semibold text-lg mb-4">Categories</h3>
                    <div class="space-y-2">
                        @foreach($categories as $cat)
                            <a href="{{ route('shop.category', $cat->slug) }}" 
                                class="flex items-center gap-3 p-3 rounded-lg {{ $cat->id == $category->id ? 'bg-[#8B4513] text-white' : 'text-gray-600 hover:bg-gray-100' }} transition-colors">
                                <i class="{{ $cat->icon }} w-5"></i>
                                <span>{{ $cat->name }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <!-- Products -->
            <div class="flex-1">
                <div class="flex items-center justify-between mb-6">
                    <p class="text-gray-600">
                        Showing <span class="font-semibold">{{ $products->count() }}</span> products
                    </p>
                    
                    <!-- Sort -->
                    <form action="" method="GET" class="flex items-center gap-2">
                        <span class="text-sm text-gray-500">Sort by:</span>
                        <select name="sort" onchange="this.form.submit()" 
                            class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#8B4513]">
                            <option value="newest">Newest</option>
                            <option value="price_low">Price: Low to High</option>
                            <option value="price_high">Price: High to Low</option>
                        </select>
                    </form>
                </div>
                
                @if($products->count() > 0)
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($products as $product)
                            <div class="bg-white rounded-xl shadow-sm overflow-hidden card-hover group">
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
                                </a>
                                
                                <div class="p-4">
                                    <a href="{{ route('shop.product', $product->slug) }}" class="block font-semibold text-gray-900 hover:text-[#8B4513] transition-colors mb-2 line-clamp-2">
                                        {{ $product->name }}
                                    </a>
                                    <p class="text-sm text-gray-500 mb-3 line-clamp-2">{{ $product->short_description }}</p>
                                    
                                    <div class="flex items-center justify-between">
                                        <div>
                                            @if($product->is_on_sale)
                                                <span class="text-lg font-bold text-[#8B4513]">${{ number_format($product->final_price, 2) }}</span>
                                                <span class="text-sm text-gray-400 line-through ml-2">${{ number_format($product->price, 2) }}</span>
                                            @else
                                                <span class="text-lg font-bold text-[#8B4513]">${{ number_format($product->price, 2) }}</span>
                                            @endif
                                        </div>
                                        <form action="{{ route('cart.add') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="w-10 h-10 bg-[#8B4513] text-white rounded-full flex items-center justify-center hover:bg-[#654321] transition-colors">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="mt-8">
                        {{ $products->links() }}
                    </div>
                @else
                    <div class="text-center py-16 bg-white rounded-xl">
                        <i class="fas fa-box-open text-6xl text-gray-300 mb-4"></i>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">No products in this category</h3>
                        <p class="text-gray-600 mb-4">Check back soon for new arrivals!</p>
                        <a href="{{ route('shop') }}" class="btn-primary">
                            Browse All Products
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
