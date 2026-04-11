@extends('layouts.shop')

@section('title', 'Accio Work - Custom Manufacturing - Smart Q Store')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-br from-purple-600 to-purple-800 text-white py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/20 rounded-full mb-6">
                    <i class="fas fa-industry"></i>
                    <span class="font-medium">Accio Work</span>
                </div>
                <h1 class="text-4xl font-bold mb-4">Custom Manufacturing Solutions</h1>
                <p class="text-purple-100 text-lg mb-6">
                    Get products made exactly to your specifications. From concept to production, 
                    we connect you with the right manufacturers for OEM, ODM, and custom orders.
                </p>
                <a href="#quote" class="inline-flex items-center gap-2 px-6 py-3 bg-white text-purple-700 font-semibold rounded-lg hover:bg-purple-50 transition-colors">
                    <i class="fas fa-calculator"></i>
                    Get Custom Quote
                </a>
            </div>
            <div class="hidden lg:block">
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-white/10 rounded-2xl p-6 backdrop-blur">
                        <div class="text-3xl font-bold mb-1">500+</div>
                        <div class="text-purple-200">Factories</div>
                    </div>
                    <div class="bg-white/10 rounded-2xl p-6 backdrop-blur">
                        <div class="text-3xl font-bold mb-1">10K+</div>
                        <div class="text-purple-200">Custom Orders</div>
                    </div>
                    <div class="bg-white/10 rounded-2xl p-6 backdrop-blur">
                        <div class="text-3xl font-bold mb-1">50+</div>
                        <div class="text-purple-200">Industries</div>
                    </div>
                    <div class="bg-white/10 rounded-2xl p-6 backdrop-blur">
                        <div class="text-3xl font-bold mb-1">98%</div>
                        <div class="text-purple-200">Satisfaction</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services -->
<section class="section-padding bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900">Our Manufacturing Services</h2>
            <p class="text-gray-600 mt-2">End-to-end solutions for your production needs</p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <div class="p-6 border-2 border-purple-100 rounded-2xl hover:border-purple-500 transition-all">
                <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center mb-4">
                    <i class="fas fa-drafting-compass text-purple-600 text-2xl"></i>
                </div>
                <h3 class="font-semibold text-xl mb-2">OEM Manufacturing</h3>
                <p class="text-gray-600 mb-4">Original Equipment Manufacturing. We produce products based on your designs and specifications.</p>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li><i class="fas fa-check text-purple-500 mr-2"></i>Your design, our production</li>
                    <li><i class="fas fa-check text-purple-500 mr-2"></i>Full quality control</li>
                    <li><i class="fas fa-check text-purple-500 mr-2"></i>Scalable production</li>
                </ul>
            </div>
            
            <div class="p-6 border-2 border-purple-100 rounded-2xl hover:border-purple-500 transition-all">
                <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center mb-4">
                    <i class="fas fa-lightbulb text-purple-600 text-2xl"></i>
                </div>
                <h3 class="font-semibold text-xl mb-2">ODM Solutions</h3>
                <p class="text-gray-600 mb-4">Original Design Manufacturing. We design and develop products based on your concept.</p>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li><i class="fas fa-check text-purple-500 mr-2"></i>Concept to finished product</li>
                    <li><i class="fas fa-check text-purple-500 mr-2"></i>Professional R&D team</li>
                    <li><i class="fas fa-check text-purple-500 mr-2"></i>Patent assistance</li>
                </ul>
            </div>
            
            <div class="p-6 border-2 border-purple-100 rounded-2xl hover:border-purple-500 transition-all">
                <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center mb-4">
                    <i class="fas fa-palette text-purple-600 text-2xl"></i>
                </div>
                <h3 class="font-semibold text-xl mb-2">Product Customization</h3>
                <p class="text-gray-600 mb-4">Modify existing products to meet your specific requirements and branding needs.</p>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li><i class="fas fa-check text-purple-500 mr-2"></i>Private labeling</li>
                    <li><i class="fas fa-check text-purple-500 mr-2"></i>Custom packaging</li>
                    <li><i class="fas fa-check text-purple-500 mr-2"></i>Logo & branding</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Industries -->
<section class="section-padding bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900">Industries We Serve</h2>
            <p class="text-gray-600 mt-2">Expertise across multiple manufacturing sectors</p>
        </div>
        
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="p-6 bg-white rounded-xl shadow-sm hover:shadow-md transition-all text-center">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-microchip text-blue-600 text-xl"></i>
                </div>
                <h3 class="font-semibold">Electronics</h3>
                <p class="text-sm text-gray-600 mt-1">PCBs, devices, components</p>
            </div>
            <div class="p-6 bg-white rounded-xl shadow-sm hover:shadow-md transition-all text-center">
                <div class="w-12 h-12 bg-pink-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-tshirt text-pink-600 text-xl"></i>
                </div>
                <h3 class="font-semibold">Textiles & Apparel</h3>
                <p class="text-sm text-gray-600 mt-1">Clothing, fabrics, accessories</p>
            </div>
            <div class="p-6 bg-white rounded-xl shadow-sm hover:shadow-md transition-all text-center">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-couch text-green-600 text-xl"></i>
                </div>
                <h3 class="font-semibold">Home & Furniture</h3>
                <p class="text-sm text-gray-600 mt-1">Furniture, décor, appliances</p>
            </div>
            <div class="p-6 bg-white rounded-xl shadow-sm hover:shadow-md transition-all text-center">
                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-car text-orange-600 text-xl"></i>
                </div>
                <h3 class="font-semibold">Auto Parts</h3>
                <p class="text-sm text-gray-600 mt-1">Components, accessories</p>
            </div>
            <div class="p-6 bg-white rounded-xl shadow-sm hover:shadow-md transition-all text-center">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-heartbeat text-purple-600 text-xl"></i>
                </div>
                <h3 class="font-semibold">Medical Devices</h3>
                <p class="text-sm text-gray-600 mt-1">Equipment, supplies</p>
            </div>
            <div class="p-6 bg-white rounded-xl shadow-sm hover:shadow-md transition-all text-center">
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-boxes text-yellow-600 text-xl"></i>
                </div>
                <h3 class="font-semibold">Packaging</h3>
                <p class="text-sm text-gray-600 mt-1">Boxes, bags, labels</p>
            </div>
            <div class="p-6 bg-white rounded-xl shadow-sm hover:shadow-md transition-all text-center">
                <div class="w-12 h-12 bg-cyan-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-spray-can text-cyan-600 text-xl"></i>
                </div>
                <h3 class="font-semibold">Beauty & Personal</h3>
                <p class="text-sm text-gray-600 mt-1">Cosmetics, care products</p>
            </div>
            <div class="p-6 bg-white rounded-xl shadow-sm hover:shadow-md transition-all text-center">
                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-tools text-red-600 text-xl"></i>
                </div>
                <h3 class="font-semibold">Machinery</h3>
                <p class="text-sm text-gray-600 mt-1">Industrial equipment</p>
            </div>
        </div>
    </div>
</section>

<!-- Process -->
<section class="section-padding bg-purple-600 text-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold">How It Works</h2>
            <p class="text-purple-100 mt-2">From concept to delivery in 5 simple steps</p>
        </div>
        
        <div class="grid md:grid-cols-5 gap-6">
            <div class="text-center">
                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl font-bold">1</div>
                <h3 class="font-semibold mb-2">Submit Request</h3>
                <p class="text-purple-100 text-sm">Share your product requirements and specifications</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl font-bold">2</div>
                <h3 class="font-semibold mb-2">Get Quotes</h3>
                <p class="text-purple-100 text-sm">Receive competitive quotes from matching factories</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl font-bold">3</div>
                <h3 class="font-semibold mb-2">Sample Approval</h3>
                <p class="text-purple-100 text-sm">Review samples and approve for production</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl font-bold">4</div>
                <h3 class="font-semibold mb-2">Production</h3>
                <p class="text-purple-100 text-sm">Manufacturing with quality control checkpoints</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl font-bold">5</div>
                <h3 class="font-semibold mb-2">Delivery</h3>
                <p class="text-purple-100 text-sm">Shipping and logistics to your destination</p>
            </div>
        </div>
    </div>
</section>

<!-- Quote Form -->
<section id="quote" class="section-padding bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900">Request Custom Manufacturing Quote</h2>
                <p class="text-gray-600 mt-2">Tell us about your project and we'll get back to you within 24 hours</p>
            </div>
            
            <form action="{{ route('accio-work.submit') }}" method="POST" class="bg-gray-50 rounded-2xl p-8">
                @csrf
                
                <div class="grid sm:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Product Name *</label>
                        <input type="text" name="product_name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500" placeholder="e.g., Wireless Bluetooth Speaker">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Quantity Needed *</label>
                        <input type="number" name="quantity" required min="1" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500" placeholder="e.g., 1000">
                    </div>
                </div>
                
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Product Description *</label>
                    <textarea name="description" required rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500" placeholder="Describe your product idea, features, materials, etc."></textarea>
                </div>
                
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Technical Requirements</label>
                    <textarea name="requirements" required rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500" placeholder="Size, materials, colors, certifications needed, etc."></textarea>
                </div>
                
                <div class="grid sm:grid-cols-3 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Your Name *</label>
                        <input type="text" name="contact_name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                        <input type="email" name="contact_email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Phone *</label>
                        <input type="tel" name="contact_phone" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                    </div>
                </div>
                
                <div class="flex items-center gap-2 mb-6">
                    <input type="checkbox" id="nda" name="nda_required" class="w-4 h-4 text-purple-600">
                    <label for="nda" class="text-sm text-gray-600">I require an NDA (Non-Disclosure Agreement) for my project</label>
                </div>
                
                <button type="submit" class="w-full py-4 bg-purple-600 text-white font-semibold rounded-lg hover:bg-purple-700 transition-colors">
                    <i class="fas fa-paper-plane mr-2"></i>Submit Request
                </button>
                
                <p class="text-xs text-gray-500 text-center mt-4">
                    By submitting, you agree to our terms. Your information is kept confidential.
                </p>
            </form>
        </div>
    </div>
</section>
@endsection
