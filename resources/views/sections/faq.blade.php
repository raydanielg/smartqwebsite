<section id="faq" class="section-padding bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center max-w-2xl mx-auto mb-16 reveal">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-[#8B4513]/10 rounded-full mb-4">
                <i class="fas fa-question-circle text-[#8B4513] text-sm"></i>
                <span class="text-[#8B4513] font-medium text-sm">FAQ</span>
            </div>
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
                Frequently Asked Questions
            </h2>
            <p class="text-gray-600">
                Got questions? We\'ve got answers. If you can\'t find what you\'re looking for, feel free to contact us.
            </p>
        </div>
        
        <!-- FAQ Grid -->
        <div class="max-w-3xl mx-auto space-y-4">
            @foreach($faqs as $index => $faq)
                <div class="bg-gray-50 rounded-xl overflow-hidden reveal" style="animation-delay: {{ $loop->index * 0.05 }}s">
                    <button class="faq-toggle w-full flex items-center justify-between p-6 text-left hover:bg-gray-100 transition-colors" onclick="toggleFaq(this)">
                        <span class="font-semibold text-gray-900 pr-4">{{ $faq->question }}</span>
                        <i class="fas fa-chevron-down text-[#8B4513] transform transition-transform flex-shrink-0"></i>
                    </button>
                    <div class="faq-content hidden px-6 pb-6">
                        <p class="text-gray-600">{{ $faq->answer }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- Contact CTA -->
        <div class="mt-12 text-center reveal">
            <p class="text-gray-600 mb-4">Still have questions?</p>
            <a href="#contact" class="inline-flex items-center gap-2 text-[#8B4513] font-medium hover:gap-3 transition-all">
                Contact Our Support Team <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
    
    <script>
        function toggleFaq(button) {
            const content = button.nextElementSibling;
            const icon = button.querySelector('i');
            const isHidden = content.classList.contains('hidden');
            
            // Close all other FAQs
            document.querySelectorAll('.faq-content').forEach(c => c.classList.add('hidden'));
            document.querySelectorAll('.faq-toggle i').forEach(i => i.style.transform = 'rotate(0deg)');
            
            // Toggle current
            if (isHidden) {
                content.classList.remove('hidden');
                icon.style.transform = 'rotate(180deg)';
            }
        }
    </script>
</section>
