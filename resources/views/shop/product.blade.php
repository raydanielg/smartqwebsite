@extends('layouts.main')

@section('title', $product->name . ' - Smart Q Store')

@section('content')
<!-- Breadcrumb -->
<div class="bg-gray-100 py-4">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-2 text-sm text-gray-600">
            <a href="{{ route('landing') }}" class="hover:text-[#8B4513]">Home</a>
            <i class="fas fa-chevron-right text-xs"></i>
            <a href="{{ route('shop') }}" class="hover:text-[#8B4513]">Shop</a>
            <i class="fas fa-chevron-right text-xs"></i>
            <a href="{{ route('shop.category', $product->category->slug) }}" class="hover:text-[#8B4513]">{{ $product->category->name }}</a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="text-gray-900">{{ $product->name }}</span>
        </div>
    </div>
</div>

<!-- Product Detail -->
<section class="section-padding bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12">
            <!-- Product Image -->
            <div class="relative">
                @if($product->image)
                    <div class="aspect-square bg-gray-100 rounded-2xl overflow-hidden">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                    </div>
                @else
                    <div class="aspect-square bg-gray-100 rounded-2xl flex items-center justify-center">
                        <i class="fas fa-box text-8xl text-gray-300"></i>
                    </div>
                @endif
                
                @if($product->is_on_sale)
                    <span class="absolute top-4 left-4 bg-red-500 text-white font-bold px-4 py-2 rounded-full">
                        SAVE {{ round((1 - $product->sale_price / $product->price) * 100) }}%
                    </span>
                @endif
            </div>
            
            <!-- Product Info -->
            <div>
                <div class="text-sm text-[#8B4513] font-medium mb-2">{{ $product->category->name }}</div>
                <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">{{ $product->name }}</h1>
                
                <!-- Rating -->
                <div class="flex items-center gap-2 mb-4">
                    <div class="flex text-yellow-400">
                        @for($i = 0; $i < 5; $i++)
                            <i class="fas fa-star"></i>
                        @endfor
                    </div>
                    <span class="text-gray-500 text-sm">(4.9) 128 reviews</span>
                </div>
                
                <!-- Price -->
                <div class="mb-6">
                    @if($product->is_on_sale)
                        <span class="text-4xl font-bold text-[#8B4513]">${{ number_format($product->final_price, 2) }}</span>
                        <span class="text-xl text-gray-400 line-through ml-3">${{ number_format($product->price, 2) }}</span>
                    @else
                        <span class="text-4xl font-bold text-[#8B4513]">${{ number_format($product->price, 2) }}</span>
                    @endif
                </div>
                
                <!-- Short Description -->
                <p class="text-gray-600 mb-6">{{ $product->short_description }}</p>
                
                <!-- Stock Status -->
                <div class="flex items-center gap-2 mb-6">
                    @if($product->stock_quantity > 0)
                        <span class="w-3 h-3 bg-green-500 rounded-full"></span>
                        <span class="text-green-600 font-medium">In Stock ({{ $product->stock_quantity }} available)</span>
                    @else
                        <span class="w-3 h-3 bg-red-500 rounded-full"></span>
                        <span class="text-red-600 font-medium">Out of Stock</span>
                    @endif
                </div>
                
                <!-- SKU -->
                <div class="text-sm text-gray-500 mb-6">
                    SKU: <span class="font-medium">{{ $product->sku }}</span>
                </div>
                
                <!-- Add to Cart -->
                @if($product->stock_quantity > 0)
                    <form action="{{ route('cart.add') }}" method="POST" class="flex gap-4 mb-8">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        
                        <div class="flex items-center border border-gray-300 rounded-lg">
                            <button type="button" onclick="decrementQty()" class="px-4 py-3 hover:bg-gray-100 transition-colors">
                                <i class="fas fa-minus"></i>
                            </button>
                            <input type="number" name="quantity" id="quantity" value="1" min="1" max="{{ $product->stock_quantity }}"
                                class="w-16 text-center border-none focus:ring-0">
                            <button type="button" onclick="incrementQty({{ $product->stock_quantity }})" class="px-4 py-3 hover:bg-gray-100 transition-colors">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                        
                        <button type="submit" class="flex-1 btn-primary justify-center text-lg">
                            <i class="fas fa-shopping-cart"></i>
                            Add to Cart
                        </button>
                    </form>
                @else
                    <button disabled class="w-full py-4 bg-gray-300 text-gray-500 rounded-lg font-medium cursor-not-allowed mb-8">
                        Out of Stock
                    </button>
                @endif
                
                <!-- Features -->
                <div class="grid grid-cols-3 gap-4 mb-8">
                    <div class="text-center p-4 bg-gray-50 rounded-lg">
                        <i class="fas fa-truck text-[#8B4513] text-xl mb-2"></i>
                        <div class="text-sm font-medium">Free Shipping</div>
                        <div class="text-xs text-gray-500">Orders over $500</div>
                    </div>
                    <div class="text-center p-4 bg-gray-50 rounded-lg">
                        <i class="fas fa-shield-alt text-[#8B4513] text-xl mb-2"></i>
                        <div class="text-sm font-medium">Secure Payment</div>
                        <div class="text-xs text-gray-500">100% protected</div>
                    </div>
                    <div class="text-center p-4 bg-gray-50 rounded-lg">
                        <i class="fas fa-undo text-[#8B4513] text-xl mb-2"></i>
                        <div class="text-sm font-medium">Easy Returns</div>
                        <div class="text-xs text-gray-500">30 day policy</div>
                    </div>
                </div>
                
                <!-- Share -->
                <div class="flex items-center gap-4">
                    <span class="text-gray-600">Share:</span>
                    <a href="#" class="w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition-colors">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-sky-500 text-white rounded-full flex items-center justify-center hover:bg-sky-600 transition-colors">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-green-500 text-white rounded-full flex items-center justify-center hover:bg-green-600 transition-colors">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Description Tabs -->
        <div class="mt-16">
            <div class="border-b border-gray-200">
                <nav class="flex gap-8">
                    <button class="pb-4 border-b-2 border-[#8B4513] text-[#8B4513] font-medium">
                        Description
                    </button>
                    <button class="pb-4 border-b-2 border-transparent text-gray-500 hover:text-gray-700">
                        Shipping & Returns
                    </button>
                </nav>
            </div>
            
            <div class="py-8">
                <div class="prose max-w-none text-gray-600">
                    {!! nl2br(e($product->description)) !!}
                </div>
            </div>
        </div>
        
        <!-- Related Products -->
        @if($relatedProducts->count() > 0)
            <div class="mt-16 pt-16 border-t border-gray-200">
                <h2 class="text-2xl font-bold text-gray-900 mb-8">Related Products</h2>
                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($relatedProducts as $related)
                        <div class="bg-gray-50 rounded-xl overflow-hidden card-hover">
                            <a href="{{ route('shop.product', $related->slug) }}" class="block relative aspect-square bg-gray-100">
                                @if($related->image)
                                    <img src="{{ $related->image }}" alt="{{ $related->name }}" class="w-full h-full object-cover">
                                @endif
                            </a>
                            <div class="p-4">
                                <a href="{{ route('shop.product', $related->slug) }}" class="font-semibold text-gray-900 hover:text-[#8B4513] line-clamp-2">
                                    {{ $related->name }}
                                </a>
                                <div class="mt-2 font-bold text-[#8B4513]">${{ number_format($related->final_price, 2) }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>

<script>
    function incrementQty(max) {
        const input = document.getElementById('quantity');
        const current = parseInt(input.value);
        if (current < max) {
            input.value = current + 1;
        }
    }
    
    function decrementQty() {
        const input = document.getElementById('quantity');
        const current = parseInt(input.value);
        if (current > 1) {
            input.value = current - 1;
        }
    }
</script>
@endsection
