<section id="testimonials" class="section-padding bg-gradient-to-br from-[#faf8f5] via-[#f5f0e8] to-[#e8e4df]">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center max-w-2xl mx-auto mb-16 reveal">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-[#8B4513]/10 rounded-full mb-4">
                <i class="fas fa-comments text-[#8B4513] text-sm"></i>
                <span class="text-[#8B4513] font-medium text-sm">TESTIMONIALS</span>
            </div>
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
                What Our Clients Say
            </h2>
            <p class="text-gray-600">
                Don\'t just take our word for it. Here\'s what our satisfied customers have to say about our services.
            </p>
        </div>
        
        <!-- Testimonials Grid -->
        <div class="grid md:grid-cols-2 gap-8">
            @foreach($testimonials as $testimonial)
                <div class="bg-white rounded-2xl p-8 shadow-lg card-hover reveal" style="animation-delay: {{ $loop->index * 0.1 }}s">
                    <!-- Rating -->
                    <div class="flex gap-1 mb-4">
                        @for($i = 0; $i < $testimonial->rating; $i++)
                            <i class="fas fa-star text-yellow-400"></i>
                        @endfor
                    </div>
                    
                    <!-- Quote -->
                    <div class="relative mb-6">
                        <i class="fas fa-quote-left text-[#8B4513]/20 text-4xl absolute -top-2 -left-2"></i>
                        <p class="text-gray-700 relative z-10 pl-6">
                            {{ $testimonial->content }}
                        </p>
                    </div>
                    
                    <!-- Author -->
                    <div class="flex items-center gap-4 pt-4 border-t border-gray-100">
                        <div class="w-12 h-12 bg-gradient-to-br from-[#8B4513] to-[#D2691E] rounded-full flex items-center justify-center text-white font-bold text-lg">
                            {{ substr($testimonial->name, 0, 1) }}
                        </div>
                        <div>
                            <div class="font-semibold text-gray-900">{{ $testimonial->name }}</div>
                            <div class="text-sm text-gray-500">
                                {{ $testimonial->position }}
                                @if($testimonial->company)
                                    at {{ $testimonial->company }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
