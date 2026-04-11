@extends('layouts.shop')

@section('title', 'Verified Manufacturers - Smart Q Store')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-br from-blue-600 to-blue-800 text-white py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/20 rounded-full mb-6">
                <i class="fas fa-badge-check"></i>
                <span class="font-medium">Verified Suppliers</span>
            </div>
            <h1 class="text-4xl font-bold mb-4">Verified Manufacturers</h1>
            <p class="text-blue-100 text-lg">
                Connect with pre-verified suppliers and manufacturers. Quality assured, business verified, 
                trade with confidence.
            </p>
        </div>
    </div>
</section>

<!-- Manufacturers List -->
<section class="section-padding bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Filters -->
        <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
            <div class="flex flex-wrap items-center gap-4">
                <div class="flex items-center gap-2">
                    <i class="fas fa-filter text-gray-400"></i>
                    <span class="font-medium">Filters:</span>
                </div>
                
                <!-- Country Filter -->
                <form action="{{ route('manufacturers') }}" method="GET" class="flex items-center gap-2">
                    <select name="country" onchange="this.form.submit()" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        <option value="">All Countries</option>
                        @foreach($countries as $country)
                            <option value="{{ $country }}" {{ request('country') == $country ? 'selected' : '' }}>{{ $country }}</option>
                        @endforeach
                    </select>
                    
                    @if(request('level'))
                        <input type="hidden" name="level" value="{{ request('level') }}">
                    @endif
                </form>
                
                <!-- Verification Level -->
                <form action="{{ route('manufacturers') }}" method="GET" class="flex items-center gap-2">
                    @if(request('country'))
                        <input type="hidden" name="country" value="{{ request('country') }}">
                    @endif
                    <select name="level" onchange="this.form.submit()" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        <option value="">All Levels</option>
                        <option value="gold" {{ request('level') == 'gold' ? 'selected' : '' }}>Gold Supplier</option>
                        <option value="silver" {{ request('level') == 'silver' ? 'selected' : '' }}>Silver Supplier</option>
                        <option value="bronze" {{ request('level') == 'bronze' ? 'selected' : '' }}>Bronze Supplier</option>
                    </select>
                </form>
                
                @if(request()->hasAny(['country', 'level']))
                    <a href="{{ route('manufacturers') }}" class="text-red-500 hover:text-red-700 text-sm">
                        <i class="fas fa-times-circle"></i> Clear Filters
                    </a>
                @endif
            </div>
        </div>
        
        <!-- Results Count -->
        <div class="mb-6">
            <p class="text-gray-600">
                Found <span class="font-semibold text-blue-600">{{ $manufacturers->total() }}</span> verified manufacturers
            </p>
        </div>
        
        <!-- Manufacturers Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($manufacturers as $manufacturer)
                <div class="bg-white rounded-xl shadow-sm overflow-hidden card-hover">
                    <!-- Header -->
                    <div class="p-6 border-b border-gray-100">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center">
                                    @if($manufacturer->logo)
                                        <img src="{{ $manufacturer->logo }}" alt="{{ $manufacturer->name }}" class="w-10 h-10 object-contain">
                                    @else
                                        <i class="fas fa-industry text-blue-600 text-xl"></i>
                                    @endif
                                </div>
                                <div>
                                    <h3 class="font-semibold text-lg">{{ $manufacturer->name }}</h3>
                                    <div class="flex items-center gap-2 text-sm text-gray-500">
                                        <img src="https://flagcdn.com/w20/{{ strtolower($manufacturer->country) }}.png" alt="{{ $manufacturer->country }}" class="w-4">
                                        {{ $manufacturer->city }}, {{ $manufacturer->country }}
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Verification Badge -->
                            @if($manufacturer->verification_level == 'gold')
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-700 text-xs font-bold rounded-full">
                                    <i class="fas fa-crown mr-1"></i>GOLD
                                </span>
                            @elseif($manufacturer->verification_level == 'silver')
                                <span class="px-3 py-1 bg-gray-100 text-gray-700 text-xs font-bold rounded-full">
                                    <i class="fas fa-medal mr-1"></i>SILVER
                                </span>
                            @elseif($manufacturer->verification_level == 'bronze')
                                <span class="px-3 py-1 bg-orange-100 text-orange-700 text-xs font-bold rounded-full">
                                    <i class="fas fa-award mr-1"></i>BRONZE
                                </span>
                            @endif
                        </div>
                        
                        <p class="text-gray-600 text-sm line-clamp-2">{{ $manufacturer->description }}</p>
                    </div>
                    
                    <!-- Stats -->
                    <div class="px-6 py-4 bg-gray-50">
                        <div class="grid grid-cols-3 gap-4 text-center">
                            <div>
                                <div class="text-lg font-bold text-blue-600">{{ $manufacturer->transactions_count }}+</div>
                                <div class="text-xs text-gray-500">Transactions</div>
                            </div>
                            <div>
                                <div class="text-lg font-bold text-blue-600">{{ $manufacturer->response_rate ?? 95 }}%</div>
                                <div class="text-xs text-gray-500">Response</div>
                            </div>
                            <div>
                                <div class="text-lg font-bold text-blue-600">{{ $manufacturer->year_established ? date('Y') - $manufacturer->year_established : 5 }}+</div>
                                <div class="text-xs text-gray-500">Years</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Products & CTA -->
                    <div class="p-6">
                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach(explode(',', $manufacturer->main_products ?? 'Electronics,Fashion') as $product)
                                <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded">{{ trim($product) }}</span>
                            @endforeach
                        </div>
                        
                        <a href="#" class="block w-full py-3 bg-blue-600 text-white text-center rounded-lg font-medium hover:bg-blue-700 transition-colors">
                            <i class="fas fa-comment-dots mr-2"></i>Contact Supplier
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- Pagination -->
        <div class="mt-8">
            {{ $manufacturers->links() }}
        </div>
        
        @if($manufacturers->count() == 0)
            <div class="text-center py-16 bg-white rounded-xl">
                <i class="fas fa-search text-6xl text-gray-300 mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">No manufacturers found</h3>
                <p class="text-gray-600">Try adjusting your filters</p>
            </div>
        @endif
    </div>
</section>

<!-- Why Verified Section -->
<section class="section-padding bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900">Why Verified Manufacturers?</h2>
            <p class="text-gray-600 mt-2">Your business deserves the best partners</p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-shield-check text-blue-600 text-2xl"></i>
                </div>
                <h3 class="font-semibold text-lg mb-2">Quality Assured</h3>
                <p class="text-gray-600 text-sm">All manufacturers undergo strict quality verification and business checks.</p>
            </div>
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-handshake text-green-600 text-2xl"></i>
                </div>
                <h3 class="font-semibold text-lg mb-2">Secure Trading</h3>
                <p class="text-gray-600 text-sm">Trade Assurance protects your orders and payments.</p>
            </div>
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-purple-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-headset text-purple-600 text-2xl"></i>
                </div>
                <h3 class="font-semibold text-lg mb-2">24/7 Support</h3>
                <p class="text-gray-600 text-sm">Our team is always available to help with any issues.</p>
            </div>
        </div>
    </div>
</section>
@endsection
