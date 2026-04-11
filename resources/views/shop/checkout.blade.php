@extends('layouts.shop')

@section('title', 'Checkout - Smart Q Store')

@section('content')
<!-- Checkout Hero -->
<section class="bg-gradient-to-br from-[#8B4513] to-[#654321] text-white py-12">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-3xl font-bold mb-2">Checkout</h1>
            <p class="text-white/80">Complete your order</p>
        </div>
    </div>
</section>

<!-- Checkout Content -->
<section class="section-padding bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Billing Details -->
                <div class="flex-1">
                    <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                        <h2 class="text-xl font-semibold mb-6">Billing Details</h2>
                        
                        <div class="grid sm:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Full Name *</label>
                                <input type="text" name="name" value="{{ auth()->user()->name ?? '' }}" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#8B4513] focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                                <input type="email" name="email" value="{{ auth()->user()->email ?? '' }}" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#8B4513] focus:border-transparent">
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number *</label>
                            <input type="tel" name="phone" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#8B4513] focus:border-transparent"
                                placeholder="+255 XXX XXX XXX">
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Street Address *</label>
                            <textarea name="address" rows="3" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#8B4513] focus:border-transparent"
                                placeholder="Enter your full address"></textarea>
                        </div>
                        
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">City *</label>
                                <input type="text" name="city" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#8B4513] focus:border-transparent"
                                    placeholder="e.g. Dar es Salaam">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Region</label>
                                <select name="region" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#8B4513] focus:border-transparent">
                                    <option value="">Select Region</option>
                                    <option value="dar-es-salaam">Dar es Salaam</option>
                                    <option value="arusha">Arusha</option>
                                    <option value="mwanza">Mwanza</option>
                                    <option value="dodoma">Dodoma</option>
                                    <option value="zanzibar">Zanzibar</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Payment Method -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h2 class="text-xl font-semibold mb-6">Payment Method</h2>
                        
                        <div class="space-y-3">
                            <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-[#8B4513] transition-colors has-[:checked]:border-[#8B4513] has-[:checked]:bg-[#8B4513]/5">
                                <input type="radio" name="payment_method" value="bank_transfer" class="w-4 h-4 text-[#8B4513]" checked>
                                <div class="ml-4 flex-1">
                                    <div class="font-medium">Bank Transfer</div>
                                    <div class="text-sm text-gray-500">Transfer to our company account</div>
                                </div>
                                <i class="fas fa-university text-2xl text-gray-400"></i>
                            </label>
                            
                            <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-[#8B4513] transition-colors has-[:checked]:border-[#8B4513] has-[:checked]:bg-[#8B4513]/5">
                                <input type="radio" name="payment_method" value="mobile_money" class="w-4 h-4 text-[#8B4513]">
                                <div class="ml-4 flex-1">
                                    <div class="font-medium">Mobile Money</div>
                                    <div class="text-sm text-gray-500">M-Pesa, Tigo Pesa, Airtel Money</div>
                                </div>
                                <i class="fas fa-mobile-alt text-2xl text-gray-400"></i>
                            </label>
                            
                            <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-[#8B4513] transition-colors has-[:checked]:border-[#8B4513] has-[:checked]:bg-[#8B4513]/5">
                                <input type="radio" name="payment_method" value="cash_on_delivery" class="w-4 h-4 text-[#8B4513]">
                                <div class="ml-4 flex-1">
                                    <div class="font-medium">Cash on Delivery</div>
                                    <div class="text-sm text-gray-500">Pay when you receive your order</div>
                                </div>
                                <i class="fas fa-money-bill-wave text-2xl text-gray-400"></i>
                            </label>
                        </div>
                    </div>
                </div>
                
                <!-- Order Summary -->
                <div class="lg:w-96">
                    <div class="bg-white rounded-xl shadow-sm p-6 sticky top-24">
                        <h3 class="text-lg font-semibold mb-6">Your Order</h3>
                        
                        <!-- Order Items -->
                        <div class="space-y-4 mb-6 max-h-64 overflow-y-auto">
                            @foreach($cartItems as $item)
                                <div class="flex gap-3">
                                    <div class="w-16 h-16 bg-gray-100 rounded-lg overflow-hidden flex-shrink-0">
                                        @if($item['product']->image)
                                            <img src="{{ $item['product']->image }}" alt="{{ $item['product']->name }}" class="w-full h-full object-cover">
                                        @endif
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-medium text-sm line-clamp-1">{{ $item['product']->name }}</div>
                                        <div class="text-sm text-gray-500">Qty: {{ $item['quantity'] }}</div>
                                        <div class="font-semibold text-[#8B4513]">${{ number_format($item['subtotal'], 2) }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <div class="border-t border-gray-200 pt-4 space-y-3">
                            <div class="flex justify-between text-gray-600">
                                <span>Subtotal</span>
                                <span>${{ number_format($total, 2) }}</span>
                            </div>
                            <div class="flex justify-between text-gray-600">
                                <span>Shipping</span>
                                <span>Free</span>
                            </div>
                            <div class="flex justify-between text-gray-600">
                                <span>Tax</span>
                                <span>Included</span>
                            </div>
                        </div>
                        
                        <div class="border-t border-gray-200 pt-4 mt-4">
                            <div class="flex justify-between text-xl font-bold">
                                <span>Total</span>
                                <span class="text-[#8B4513]">${{ number_format($total, 2) }}</span>
                            </div>
                        </div>
                        
                        <button type="submit" class="w-full btn-primary justify-center mt-6 text-center">
                            Place Order
                            <i class="fas fa-check"></i>
                        </button>
                        
                        <a href="{{ route('cart') }}" class="block text-center text-gray-500 hover:text-[#8B4513] mt-4 text-sm">
                            <i class="fas fa-arrow-left"></i> Back to Cart
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
