<section id="services" class="section-padding bg-gradient-to-br from-[#faf8f5] via-[#f5f0e8] to-[#e8e4df]">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center max-w-2xl mx-auto mb-16 reveal">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-[#8B4513]/10 rounded-full mb-4">
                <i class="fas fa-cogs text-[#8B4513] text-sm"></i>
                <span class="text-[#8B4513] font-medium text-sm">OUR SERVICES</span>
            </div>
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
                Import Solutions We Offer
            </h2>
            <p class="text-gray-600">
                Comprehensive import services tailored to your business needs. From sourcing to delivery, we handle it all.
            </p>
        </div>
        
        <!-- Services Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $service)
                <div class="bg-white rounded-2xl p-8 shadow-lg card-hover reveal" style="animation-delay: {{ $loop->index * 0.1 }}s">
                    <div class="w-14 h-14 bg-gradient-to-br from-[#8B4513]/10 to-[#D2691E]/10 rounded-xl flex items-center justify-center mb-6">
                        <i class="{{ $service->icon }} text-[#8B4513] text-2xl"></i>
                    </div>
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-xl font-semibold text-gray-900">{{ $service->title }}</h3>
                        @if($service->price_text)
                            <span class="px-3 py-1 bg-[#8B4513]/10 text-[#8B4513] text-sm font-medium rounded-full">
                                {{ $service->price_text }}
                            </span>
                        @endif
                    </div>
                    <p class="text-gray-500 text-sm mb-4">{{ $service->short_description }}</p>
                    <p class="text-gray-600 mb-6">{{ $service->description }}</p>
                    <a href="{{ route('register') }}" class="inline-flex items-center gap-2 w-full justify-center px-6 py-3 border-2 border-[#8B4513] text-[#8B4513] font-medium rounded-lg hover:bg-[#8B4513] hover:text-white transition-all">
                        Get Quote <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
