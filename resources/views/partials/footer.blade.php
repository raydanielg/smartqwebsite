<footer class="bg-gray-900 text-white pt-20 pb-8">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
            <!-- Company Info -->
            <div>
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-gradient-to-br from-[#8B4513] to-[#D2691E] rounded-lg flex items-center justify-center">
                        <i class="fas fa-box-open text-white text-lg"></i>
                    </div>
                    <div>
                        <span class="text-xl font-bold">Smart Q</span>
                        <span class="text-xs block text-[#D2691E] -mt-1">STORE</span>
                    </div>
                </div>
                <p class="text-gray-400 mb-6">
                    Your trusted partner for importing goods from China to Tanzania. Fast, reliable, and affordable cargo services.
                </p>
                <div class="flex gap-4">
                    @if(isset($siteSettings['facebook_url']))
                        <a href="{{ $siteSettings['facebook_url']->value }}" target="_blank" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-[#8B4513] transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    @endif
                    @if(isset($siteSettings['instagram_url']))
                        <a href="{{ $siteSettings['instagram_url']->value }}" target="_blank" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-[#8B4513] transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                    @endif
                    @if(isset($siteSettings['whatsapp_number']))
                        <a href="https://wa.me/{{ $siteSettings['whatsapp_number']->value }}" target="_blank" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-[#8B4513] transition-colors">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    @endif
                </div>
            </div>
            
            <!-- Quick Links -->
            <div>
                <h4 class="text-lg font-semibold mb-6">Quick Links</h4>
                <ul class="space-y-3">
                    <li><a href="#home" class="text-gray-400 hover:text-white transition-colors">Home</a></li>
                    <li><a href="#services" class="text-gray-400 hover:text-white transition-colors">Services</a></li>
                    <li><a href="#categories" class="text-gray-400 hover:text-white transition-colors">Categories</a></li>
                    <li><a href="#features" class="text-gray-400 hover:text-white transition-colors">Why Choose Us</a></li>
                    <li><a href="#faq" class="text-gray-400 hover:text-white transition-colors">FAQ</a></li>
                </ul>
            </div>
            
            <!-- Services -->
            <div>
                <h4 class="text-lg font-semibold mb-6">Our Services</h4>
                <ul class="space-y-3">
                    <li><a href="#services" class="text-gray-400 hover:text-white transition-colors">Air Cargo</a></li>
                    <li><a href="#services" class="text-gray-400 hover:text-white transition-colors">Sea Freight</a></li>
                    <li><a href="#services" class="text-gray-400 hover:text-white transition-colors">Dropshipping</a></li>
                    <li><a href="#services" class="text-gray-400 hover:text-white transition-colors">Product Sourcing</a></li>
                    <li><a href="#services" class="text-gray-400 hover:text-white transition-colors">Warehousing</a></li>
                </ul>
            </div>
            
            <!-- Contact -->
            <div>
                <h4 class="text-lg font-semibold mb-6">Contact Us</h4>
                <ul class="space-y-4">
                    @if(isset($siteSettings['office_address']))
                        <li class="flex items-start gap-3">
                            <i class="fas fa-map-marker-alt text-[#D2691E] mt-1"></i>
                            <span class="text-gray-400">{{ $siteSettings['office_address']->value }}</span>
                        </li>
                    @endif
                    @if(isset($siteSettings['contact_phone']))
                        <li class="flex items-center gap-3">
                            <i class="fas fa-phone text-[#D2691E]"></i>
                            <span class="text-gray-400">{{ $siteSettings['contact_phone']->value }}</span>
                        </li>
                    @endif
                    @if(isset($siteSettings['contact_email']))
                        <li class="flex items-center gap-3">
                            <i class="fas fa-envelope text-[#D2691E]"></i>
                            <span class="text-gray-400">{{ $siteSettings['contact_email']->value }}</span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        
        <!-- Bottom Bar -->
        <div class="border-t border-gray-800 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-gray-500 text-sm">
                    © {{ date('Y') }} Smart Q Store Ltd. All Rights Reserved.
                </p>
                <div class="flex gap-6 text-sm">
                    <a href="#" class="text-gray-500 hover:text-white transition-colors">Privacy Policy</a>
                    <a href="#" class="text-gray-500 hover:text-white transition-colors">Terms of Service</a>
                </div>
            </div>
        </div>
    </div>
</footer>
