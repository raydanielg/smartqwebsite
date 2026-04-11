@extends('layouts.main')

@section('title', 'Shopping Cart - Smart Q Store')

@section('content')
<!-- Cart Hero -->
<section class="bg-gradient-to-br from-[#8B4513] to-[#654321] text-white py-12">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-3xl font-bold mb-2">Shopping Cart</h1>
            <p class="text-white/80">Review your items and proceed to checkout</p>
        </div>
    </div>
</section>

<!-- Cart Content -->
<section class="section-padding bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        @if(count($cartItems) > 0)
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Cart Items -->
                <div class="flex-1">
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                        <div class="p-6 border-b border-gray-100">
                            <h2 class="text-xl font-semibold">Cart Items ({{ count($cartItems) }})</h2>
                        </div>
                        
                        @foreach($cartItems as $item)
                            <div class="p-6 border-b border-gray-100 flex gap-4">
                                <!-- Product Image -->
                                <div class="w-24 h-24 flex-shrink-0 bg-gray-100 rounded-lg overflow-hidden">
                                    @if($item['product']->image)
                                        <img src="{{ $item['product']->image }}" alt="{{ $item['product']->name }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center">
                                            <i class="fas fa-box text-2xl text-gray-300"></i>
                                        </div>
                                    @endif
                                </div>
                                
                                <!-- Product Info -->
                                <div class="flex-1">
                                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                                        <div>
                                            <a href="{{ route('shop.product', $item['product']->slug) }}" class="font-semibold text-gray-900 hover:text-[#8B4513] transition-colors">
                                                {{ $item['product']->name }}
                                            </a>
                                            <div class="text-sm text-gray-500 mt-1">SKU: {{ $item['product']->sku }}</div>
                                        </div>
                                        
                                        <div class="text-lg font-bold text-[#8B4513]">
                                            ${{ number_format($item['subtotal'], 2) }}
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-center justify-between mt-4">
                                        <!-- Quantity -->
                                        <form action="{{ route('cart.update') }}" method="POST" class="flex items-center">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $item['product']->id }}">
                                            
                                            <div class="flex items-center border border-gray-300 rounded-lg">
                                                <button type="submit" name="quantity" value="{{ $item['quantity'] - 1 }}" 
                                                    class="px-3 py-2 hover:bg-gray-100 transition-colors {{ $item['quantity'] <= 1 ? 'text-gray-300 cursor-not-allowed' : '' }}">
                                                    <i class="fas fa-minus text-sm"></i>
                                                </button>
                                                <span class="w-12 text-center font-medium">{{ $item['quantity'] }}</span>
                                                <button type="submit" name="quantity" value="{{ $item['quantity'] + 1 }}"
                                                    class="px-3 py-2 hover:bg-gray-100 transition-colors">
                                                    <i class="fas fa-plus text-sm"></i>
                                                </button>
                                            </div>
                                        </form>
                                        
                                        <!-- Remove -->
                                        <form action="{{ route('cart.remove') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $item['product']->id }}">
                                            <button type="submit" class="text-red-500 hover:text-red-700 transition-colors flex items-center gap-1 text-sm">
                                                <i class="fas fa-trash-alt"></i> Remove
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <!-- Clear Cart -->
                    <div class="mt-4">
                        <form action="{{ route('cart.clear') }}" method="POST">
                            @csrf
                            <button type="submit" class="text-gray-500 hover:text-red-600 transition-colors text-sm flex items-center gap-2">
                                <i class="fas fa-trash"></i> Clear Cart
                            </button>
                        </form>
                    </div>
                    
                    <!-- Continue Shopping -->
                    <div class="mt-6">
                        <a href="{{ route('shop') }}" class="inline-flex items-center gap-2 text-[#8B4513] hover:gap-3 transition-all">
                            <i class="fas fa-arrow-left"></i> Continue Shopping
                        </a>
                    </div>
                </div>
                
                <!-- Order Summary -->
                <div class="lg:w-96">
                    <div class="bg-white rounded-xl shadow-sm p-6 sticky top-24">
                        <h3 class="text-lg font-semibold mb-6">Order Summary</h3>
                        
                        <div class="space-y-3 mb-6">
                            <div class="flex justify-between text-gray-600">
                                <span>Subtotal</span>
                                <span>${{ number_format($total, 2) }}</span>
                            </div>
                            <div class="flex justify-between text-gray-600">
                                <span>Shipping</span>
                                <span>Calculated at checkout</span>
                            </div>
                            <div class="flex justify-between text-gray-600">
                                <span>Tax</span>
                                <span>Calculated at checkout</span>
                            </div>
                        </div>
                        
                        <div class="border-t border-gray-200 pt-4 mb-6">
                            <div class="flex justify-between text-lg font-bold">
                                <span>Total</span>
                                <span class="text-[#8B4513]">${{ number_format($total, 2) }}</span>
                            </div>
                        </div>
                        
                        <a href="{{ route('checkout') }}" class="block w-full btn-primary justify-center text-center">
                            Proceed to Checkout
                            <i class="fas fa-arrow-right"></i>
                        </a>
                        
                        <div class="mt-6 text-center">
                            <p class="text-sm text-gray-500 mb-4">We accept:</p>
                            <div class="flex justify-center gap-2">
                                <i class="fab fa-cc-visa text-3xl text-gray-400"></i>
                                <i class="fab fa-cc-mastercard text-3xl text-gray-400"></i>
                                <i class="fab fa-cc-paypal text-3xl text-gray-400"></i>
                                <i class="fas fa-mobile-alt text-3xl text-gray-400"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center py-16 bg-white rounded-xl">
                <i class="fas fa-shopping-cart text-6xl text-gray-300 mb-6"></i>
                <h2 class="text-2xl font-semibold text-gray-900 mb-2">Your cart is empty</h2>
                <p class="text-gray-600 mb-8">Looks like you haven\'t added any products yet.</p>
                <a href="{{ route('shop') }}" class="btn-primary">
                    <i class="fas fa-store"></i>
                    Start Shopping
                </a>
            </div>
        @endif
    </div>
</section>
@endsection
