<section id="features" class="section-padding bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center max-w-2xl mx-auto mb-16 reveal">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-[#8B4513]/10 rounded-full mb-4">
                <i class="fas fa-star text-[#8B4513] text-sm"></i>
                <span class="text-[#8B4513] font-medium text-sm">WHY CHOOSE US</span>
            </div>
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
                The Smart Q Advantage
            </h2>
            <p class="text-gray-600">
                We combine experience, technology, and dedication to provide the best import services in Tanzania.
            </p>
        </div>
        
        <!-- Features Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($features as $feature)
                <div class="flex gap-4 reveal" style="animation-delay: {{ $loop->index * 0.1 }}s">
                    <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-[#8B4513] to-[#D2691E] rounded-lg flex items-center justify-center">
                        <i class="{{ $feature->icon }} text-white text-lg"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $feature->title }}</h3>
                        <p class="text-gray-600 text-sm">{{ $feature->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- CTA -->
        <div class="mt-16 text-center reveal">
            <div class="bg-gradient-to-r from-[#8B4513] to-[#654321] rounded-2xl p-8 md:p-12 text-white">
                <h3 class="text-2xl md:text-3xl font-bold mb-4">
                    Ready to Start Importing?
                </h3>
                <p class="text-white/80 mb-8 max-w-xl mx-auto">
                    Join thousands of satisfied customers who trust Smart Q Store for their import needs. Sign up today and get your first shipment!
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white text-[#8B4513] font-semibold rounded-lg hover:bg-gray-100 transition-colors">
                        <i class="fas fa-user-plus"></i>
                        Create Account
                    </a>
                    <a href="#contact" class="inline-flex items-center justify-center gap-2 px-8 py-4 border-2 border-white text-white font-semibold rounded-lg hover:bg-white/10 transition-colors">
                        <i class="fas fa-phone"></i>
                        Contact Sales
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
