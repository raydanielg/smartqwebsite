<section id="home" class="relative min-h-[90vh] flex items-center overflow-hidden bg-gradient-to-br from-[#faf8f5] via-[#f5f0e8] to-[#e8e4df]">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-30">
        <div class="absolute top-20 left-10 w-72 h-72 bg-[#8B4513] rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-float"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-[#D2691E] rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-float" style="animation-delay: 2s;"></div>
    </div>
    
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Content -->
            <div class="animate-fadeInUp">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-[#8B4513]/10 rounded-full mb-6">
                    <span class="w-2 h-2 bg-[#8B4513] rounded-full animate-pulse"></span>
                    <span class="text-[#8B4513] font-medium text-sm">SMART Q STORE</span>
                </div>
                
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-gray-900 leading-tight mb-6">
                    Import From <span class="text-[#8B4513]">China</span> To Tanzania Made Easy
                </h1>
                
                <p class="text-lg text-gray-600 mb-8 max-w-lg">
                    Your trusted partner for importing goods from China to Tanzania. We provide fast, reliable, and affordable cargo, importation, and dropshipping services.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 mb-12">
                    <a href="#services" class="btn-primary">
                        <i class="fas fa-rocket"></i>
                        Get Started
                    </a>
                    <a href="#about" class="btn-secondary">
                        <i class="fas fa-play-circle"></i>
                        Learn More
                    </a>
                </div>
                
                <!-- Stats -->
                <div class="grid grid-cols-3 gap-6">
                    <div>
                        <div class="text-3xl font-bold text-[#8B4513]">3-7</div>
                        <div class="text-sm text-gray-600">Days Air Cargo</div>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-[#8B4513]">1000+</div>
                        <div class="text-sm text-gray-600">Happy Clients</div>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-[#8B4513]">24/7</div>
                        <div class="text-sm text-gray-600">Support</div>
                    </div>
                </div>
            </div>
            
            <!-- Hero Image -->
            <div class="relative animate-fadeIn hidden lg:block">
                <div class="relative group">
                    <!-- Main Hero Image -->
                    <div class="relative rounded-2xl shadow-2xl overflow-hidden">
                        <img src="{{ asset('34337.jpg') }}" alt="SmartQ Premium Collection" class="w-full h-[500px] object-cover group-hover:scale-105 transition-transform duration-700">
                        
                        <!-- Overlay Badge -->
                        <div class="absolute top-6 right-6 bg-[#FF6A00] text-white px-4 py-2 rounded-full font-bold shadow-lg animate-pulse">
                            NEW 2025
                        </div>
                        
                        <!-- Bottom Info Bar -->
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-6">
                            <div class="flex items-center justify-between text-white">
                                <div>
                                    <h3 class="text-xl font-bold">Premium Collection</h3>
                                    <p class="text-sm text-gray-300">Quality products from China to Tanzania</p>
                                </div>
                                <a href="{{ route('shop') }}" class="px-4 py-2 bg-white text-gray-900 rounded-full text-sm font-semibold hover:bg-gray-100 transition-colors">
                                    Shop Now <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Floating Stats Cards -->
                    <div class="absolute -top-4 -left-4 bg-white rounded-xl shadow-xl p-4 animate-float">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-[#FF6A00]/10 rounded-full flex items-center justify-center">
                                <i class="fas fa-shipping-fast text-[#FF6A00] text-xl"></i>
                            </div>
                            <div>
                                <div class="text-lg font-bold text-gray-900">3-7 Days</div>
                                <div class="text-xs text-gray-500">Fast Delivery</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="absolute -bottom-4 -right-4 bg-white rounded-xl shadow-xl p-4 animate-float" style="animation-delay: 1s;">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-check-circle text-green-600 text-xl"></i>
                            </div>
                            <div>
                                <div class="text-lg font-bold text-gray-900">1000+</div>
                                <div class="text-xs text-gray-500">Happy Clients</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <a href="#services" class="text-[#8B4513]">
            <i class="fas fa-chevron-down text-2xl"></i>
        </a>
    </div>
</section>
