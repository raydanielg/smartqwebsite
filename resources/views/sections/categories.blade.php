<section id="categories" class="section-padding bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center max-w-2xl mx-auto mb-16 reveal">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-[#8B4513]/10 rounded-full mb-4">
                <i class="fas fa-th-large text-[#8B4513] text-sm"></i>
                <span class="text-[#8B4513] font-medium text-sm">PRODUCT CATEGORIES</span>
            </div>
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
                What Can You Import?
            </h2>
            <p class="text-gray-600">
                We handle a wide range of product categories. From electronics to machinery, we\'ve got you covered.
            </p>
        </div>
        
        <!-- Categories Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($categories as $category)
                <div class="group bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl p-8 card-hover reveal" style="animation-delay: {{ $loop->index * 0.1 }}s">
                    <div class="w-16 h-16 bg-gradient-to-br from-[#8B4513] to-[#D2691E] rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i class="{{ $category->icon }} text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ $category->name }}</h3>
                    <p class="text-gray-600 mb-4">{{ $category->description }}</p>
                    <a href="#contact" class="inline-flex items-center gap-2 text-[#8B4513] font-medium hover:gap-3 transition-all">
                        Import Now <i class="fas fa-arrow-right text-sm"></i>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
