<section id="contact" class="section-padding bg-gradient-to-r from-[#8B4513] to-[#654321] text-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Content -->
            <div class="reveal">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 rounded-full mb-6">
                    <i class="fas fa-headset text-sm"></i>
                    <span class="font-medium text-sm">CONTACT US</span>
                </div>
                <h2 class="text-3xl sm:text-4xl font-bold mb-6">
                    Let\'s Start Your Import Journey
                </h2>
                <p class="text-white/80 mb-8">
                    Ready to import from China? Our team is here to help you every step of the way. Get in touch with us today!
                </p>
                
                <div class="space-y-4">
                    @if(isset($siteSettings['contact_phone']))
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-white/10 rounded-lg flex items-center justify-center">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div>
                                <div class="text-sm text-white/60">Phone</div>
                                <div class="font-semibold">{{ $siteSettings['contact_phone']->value }}</div>
                            </div>
                        </div>
                    @endif
                    
                    @if(isset($siteSettings['contact_email']))
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-white/10 rounded-lg flex items-center justify-center">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <div class="text-sm text-white/60">Email</div>
                                <div class="font-semibold">{{ $siteSettings['contact_email']->value }}</div>
                            </div>
                        </div>
                    @endif
                    
                    @if(isset($siteSettings['office_address']))
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-white/10 rounded-lg flex items-center justify-center">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <div class="text-sm text-white/60">Office</div>
                                <div class="font-semibold">{{ $siteSettings['office_address']->value }}</div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            
            <!-- Quick Contact Form -->
            <div class="bg-white rounded-2xl p-8 text-gray-800 reveal">
                <h3 class="text-2xl font-bold mb-6">Send us a Message</h3>
                <form action="#" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                        <input type="text" name="name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#8B4513] focus:border-transparent" placeholder="Your name" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#8B4513] focus:border-transparent" placeholder="your@email.com" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">What do you want to import?</label>
                        <textarea name="message" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#8B4513] focus:border-transparent" placeholder="Tell us about your import needs..." required></textarea>
                    </div>
                    <button type="submit" class="w-full btn-primary justify-center">
                        <i class="fas fa-paper-plane"></i>
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
