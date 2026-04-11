@extends('layouts.shop')

@section('title', 'Buyer Central - Smart Q Store')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-br from-orange-500 to-orange-700 text-white py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/20 rounded-full mb-6">
                <i class="fas fa-briefcase"></i>
                <span class="font-medium">Buyer Central</span>
            </div>
            <h1 class="text-4xl font-bold mb-4">Everything for Buyers</h1>
            <p class="text-orange-100 text-lg">
                Tools, resources, and services to help you source products efficiently 
                and grow your business.
            </p>
        </div>
    </div>
</section>

<!-- Quick Tools -->
<section class="section-padding bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900">Quick Tools</h2>
            <p class="text-gray-600 mt-2">Essential tools for efficient sourcing</p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <a href="#" class="group p-6 border-2 border-gray-200 rounded-2xl hover:border-orange-500 transition-all">
                <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-4 group-hover:bg-blue-200 transition-colors">
                    <i class="fas fa-search-dollar text-blue-600 text-2xl"></i>
                </div>
                <h3 class="font-semibold text-xl mb-2">Request for Quotation</h3>
                <p class="text-gray-600 text-sm mb-4">Post your buying needs and get custom quotes from multiple suppliers.</p>
                <span class="text-orange-500 font-medium text-sm group-hover:gap-2 transition-all">Get Quotes <i class="fas fa-arrow-right ml-1"></i></span>
            </a>
            
            <a href="#" class="group p-6 border-2 border-gray-200 rounded-2xl hover:border-orange-500 transition-all">
                <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center mb-4 group-hover:bg-green-200 transition-colors">
                    <i class="fas fa-boxes text-green-600 text-2xl"></i>
                </div>
                <h3 class="font-semibold text-xl mb-2">Ready to Ship</h3>
                <p class="text-gray-600 text-sm mb-4">Browse products in stock with fast shipping - receive in 7-15 days.</p>
                <span class="text-orange-500 font-medium text-sm group-hover:gap-2 transition-all">Browse Now <i class="fas fa-arrow-right ml-1"></i></span>
            </a>
            
            <a href="{{ route('order.protection') }}" class="group p-6 border-2 border-gray-200 rounded-2xl hover:border-orange-500 transition-all">
                <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center mb-4 group-hover:bg-purple-200 transition-colors">
                    <i class="fas fa-file-contract text-purple-600 text-2xl"></i>
                </div>
                <h3 class="font-semibold text-xl mb-2">Trade Assurance</h3>
                <p class="text-gray-600 text-sm mb-4">Order protection and secure payment for worry-free trading.</p>
                <span class="text-orange-500 font-medium text-sm group-hover:gap-2 transition-all">Learn More <i class="fas fa-arrow-right ml-1"></i></span>
            </a>
        </div>
    </div>
</section>

<!-- Sourcing Solutions -->
<section class="section-padding bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Sourcing Solutions</h2>
                <div class="space-y-6">
                    <div class="flex gap-4">
                        <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-industry text-orange-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg">Custom Manufacturing</h3>
                            <p class="text-gray-600 text-sm">Get products made to your exact specifications with OEM/ODM services.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-users text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg">Private Sourcing Events</h3>
                            <p class="text-gray-600 text-sm">Connect with pre-qualified suppliers in exclusive matching events.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-warehouse text-green-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg">Warehousing & Logistics</h3>
                            <p class="text-gray-600 text-sm">Store goods in our warehouses and manage fulfillment efficiently.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-search text-purple-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg">Supplier Discovery</h3>
                            <p class="text-gray-600 text-sm">Find verified suppliers with our advanced search and filters.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl p-8 shadow-lg">
                <h3 class="font-semibold text-xl mb-6">Buyer Benefits</h3>
                <div class="space-y-4">
                    <div class="flex items-center gap-3 p-4 bg-green-50 rounded-lg">
                        <i class="fas fa-check-circle text-green-500 text-xl"></i>
                        <div>
                            <div class="font-medium">Verified Suppliers Only</div>
                            <div class="text-sm text-gray-600">All suppliers are pre-screened and verified</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 p-4 bg-blue-50 rounded-lg">
                        <i class="fas fa-check-circle text-blue-500 text-xl"></i>
                        <div>
                            <div class="font-medium">Competitive Pricing</div>
                            <div class="text-sm text-gray-600">Get factory-direct prices with no middlemen</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 p-4 bg-purple-50 rounded-lg">
                        <i class="fas fa-check-circle text-purple-500 text-xl"></i>
                        <div>
                            <div class="font-medium">Secure Transactions</div>
                            <div class="text-sm text-gray-600">Payment protection and escrow services</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 p-4 bg-orange-50 rounded-lg">
                        <i class="fas fa-check-circle text-orange-500 text-xl"></i>
                        <div>
                            <div class="font-medium">Dedicated Support</div>
                            <div class="text-sm text-gray-600">24/7 customer service and dispute resolution</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products -->
@if($featuredProducts->count() > 0)
<section class="section-padding bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-3xl font-bold text-gray-900">Trending Products</h2>
                <p class="text-gray-600 mt-1">Popular items among buyers</p>
            </div>
            <a href="{{ route('shop') }}" class="text-orange-500 font-medium hover:text-orange-600">
                View All <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
        
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($featuredProducts as $product)
                <div class="bg-white border border-gray-200 rounded-xl overflow-hidden card-hover">
                    <a href="{{ route('shop.product', $product->slug) }}" class="block relative aspect-square bg-gray-100">
                        @if($product->image)
                            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                        @endif
                    </a>
                    <div class="p-4">
                        <div class="text-xs text-orange-500 font-medium mb-1">{{ $product->category->name }}</div>
                        <a href="{{ route('shop.product', $product->slug) }}" class="font-semibold text-gray-900 hover:text-orange-500 line-clamp-2">
                            {{ $product->name }}
                        </a>
                        <div class="mt-2 flex items-center justify-between">
                            <span class="text-lg font-bold text-orange-600">${{ number_format($product->final_price, 2) }}</span>
                            <span class="text-xs text-gray-500">MOQ: {{ $product->stock_quantity }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="section-padding bg-orange-600 text-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold mb-4">Ready to Start Sourcing?</h2>
        <p class="text-orange-100 mb-8 max-w-2xl mx-auto">
            Join thousands of buyers who trust Smart Q Store for their procurement needs. 
            Get started today and grow your business.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('shop') }}" class="px-8 py-4 bg-white text-orange-600 font-semibold rounded-lg hover:bg-orange-50 transition-colors">
                <i class="fas fa-search mr-2"></i>Browse Products
            </a>
            <a href="#" class="px-8 py-4 border-2 border-white text-white font-semibold rounded-lg hover:bg-white/10 transition-colors">
                <i class="fas fa-file-invoice mr-2"></i>Post RFQ
            </a>
        </div>
    </div>
</section>
@endsection
