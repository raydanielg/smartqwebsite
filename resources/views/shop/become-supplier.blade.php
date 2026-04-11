@extends('layouts.shop')

@section('title', 'Become a Supplier - Smart Q Store')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-br from-indigo-600 to-indigo-800 text-white py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/20 rounded-full mb-6">
                    <i class="fas fa-store"></i>
                    <span class="font-medium">Partner With Us</span>
                </div>
                <h1 class="text-4xl font-bold mb-4">Become a Supplier</h1>
                <p class="text-indigo-100 text-lg mb-6">
                    Join 10,000+ suppliers and reach millions of buyers across Africa. 
                    Expand your business with Smart Q Store's powerful platform.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="#apply" class="inline-flex items-center gap-2 px-6 py-3 bg-white text-indigo-700 font-semibold rounded-lg hover:bg-indigo-50 transition-colors">
                        <i class="fas fa-rocket"></i>
                        Start Selling
                    </a>
                    <a href="#benefits" class="inline-flex items-center gap-2 px-6 py-3 border-2 border-white text-white font-semibold rounded-lg hover:bg-white/10 transition-colors">
                        <i class="fas fa-info-circle"></i>
                        Learn More
                    </a>
                </div>
            </div>
            <div class="hidden lg:block">
                <div class="bg-white/10 rounded-2xl p-8 backdrop-blur">
                    <div class="space-y-4">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <i class="fas fa-users text-2xl"></i>
                            </div>
                            <div>
                                <div class="text-2xl font-bold">2M+</div>
                                <div class="text-indigo-200">Active Buyers</div>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <i class="fas fa-globe-africa text-2xl"></i>
                            </div>
                            <div>
                                <div class="text-2xl font-bold">50+</div>
                                <div class="text-indigo-200">Countries</div>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <i class="fas fa-chart-line text-2xl"></i>
                            </div>
                            <div>
                                <div class="text-2xl font-bold">$500M+</div>
                                <div class="text-indigo-200">Annual GMV</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Benefits -->
<section id="benefits" class="section-padding bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900">Why Sell on Smart Q Store?</h2>
            <p class="text-gray-600 mt-2">Powerful tools and resources to grow your business</p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="p-6 border border-gray-200 rounded-2xl hover:shadow-lg transition-all">
                <div class="w-14 h-14 bg-indigo-100 rounded-xl flex items-center justify-center mb-4">
                    <i class="fas fa-globe text-indigo-600 text-2xl"></i>
                </div>
                <h3 class="font-semibold text-xl mb-2">Global Reach</h3>
                <p class="text-gray-600">Access buyers from 50+ countries. Expand your market beyond borders with our logistics network.</p>
            </div>
            <div class="p-6 border border-gray-200 rounded-2xl hover:shadow-lg transition-all">
                <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center mb-4">
                    <i class="fas fa-dollar-sign text-green-600 text-2xl"></i>
                </div>
                <h3 class="font-semibold text-xl mb-2">Zero Commission</h3>
                <p class="text-gray-600">No hidden fees or commissions. Keep 100% of your profits. Only pay for optional promoted listings.</p>
            </div>
            <div class="p-6 border border-gray-200 rounded-2xl hover:shadow-lg transition-all">
                <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-4">
                    <i class="fas fa-shield-alt text-blue-600 text-2xl"></i>
                </div>
                <h3 class="font-semibold text-xl mb-2">Secure Payments</h3>
                <p class="text-gray-600">Guaranteed payment protection. Get paid on time, every time with our escrow system.</p>
            </div>
            <div class="p-6 border border-gray-200 rounded-2xl hover:shadow-lg transition-all">
                <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center mb-4">
                    <i class="fas fa-chart-bar text-purple-600 text-2xl"></i>
                </div>
                <h3 class="font-semibold text-xl mb-2">Business Insights</h3>
                <p class="text-gray-600">Access real-time analytics, market trends, and buyer behavior data to optimize your sales.</p>
            </div>
            <div class="p-6 border border-gray-200 rounded-2xl hover:shadow-lg transition-all">
                <div class="w-14 h-14 bg-orange-100 rounded-xl flex items-center justify-center mb-4">
                    <i class="fas fa-truck text-orange-600 text-2xl"></i>
                </div>
                <h3 class="font-semibold text-xl mb-2">Logistics Support</h3>
                <p class="text-gray-600">Integrated shipping solutions. We handle customs, documentation, and delivery tracking.</p>
            </div>
            <div class="p-6 border border-gray-200 rounded-2xl hover:shadow-lg transition-all">
                <div class="w-14 h-14 bg-pink-100 rounded-xl flex items-center justify-center mb-4">
                    <i class="fas fa-headset text-pink-600 text-2xl"></i>
                </div>
                <h3 class="font-semibold text-xl mb-2">24/7 Support</h3>
                <p class="text-gray-600">Dedicated account managers and multilingual support team to help you succeed.</p>
            </div>
        </div>
    </div>
</section>

<!-- How It Works -->
<section class="section-padding bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900">How to Start Selling</h2>
            <p class="text-gray-600 mt-2">Four simple steps to becoming a supplier</p>
        </div>
        
        <div class="grid md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="w-20 h-20 bg-indigo-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-2xl font-bold shadow-lg">1</div>
                <h3 class="font-semibold text-lg mb-2">Register</h3>
                <p class="text-gray-600 text-sm">Create your supplier account and verify your business</p>
            </div>
            <div class="text-center">
                <div class="w-20 h-20 bg-indigo-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-2xl font-bold shadow-lg">2</div>
                <h3 class="font-semibold text-lg mb-2">List Products</h3>
                <p class="text-gray-600 text-sm">Upload your product catalog with details and pricing</p>
            </div>
            <div class="text-center">
                <div class="w-20 h-20 bg-indigo-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-2xl font-bold shadow-lg">3</div>
                <h3 class="font-semibold text-lg mb-2">Get Orders</h3>
                <p class="text-gray-600 text-sm">Receive orders from verified buyers worldwide</p>
            </div>
            <div class="text-center">
                <div class="w-20 h-20 bg-indigo-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-2xl font-bold shadow-lg">4</div>
                <h3 class="font-semibold text-lg mb-2">Ship & Get Paid</h3>
                <p class="text-gray-600 text-sm">Fulfill orders and receive secure payments</p>
            </div>
        </div>
    </div>
</section>

<!-- Requirements -->
<section class="section-padding bg-indigo-600 text-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold">Supplier Requirements</h2>
            <p class="text-indigo-100 mt-2">What you need to get started</p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white/10 rounded-xl p-6 backdrop-blur">
                <i class="fas fa-building text-3xl mb-4"></i>
                <h3 class="font-semibold text-lg mb-2">Registered Business</h3>
                <p class="text-indigo-100 text-sm">Valid business registration and tax ID</p>
            </div>
            <div class="bg-white/10 rounded-xl p-6 backdrop-blur">
                <i class="fas fa-boxes text-3xl mb-4"></i>
                <h3 class="font-semibold text-lg mb-2">Quality Products</h3>
                <p class="text-indigo-100 text-sm">Meet international quality standards</p>
            </div>
            <div class="bg-white/10 rounded-xl p-6 backdrop-blur">
                <i class="fas fa-truck text-3xl mb-4"></i>
                <h3 class="font-semibold text-lg mb-2">Shipping Capability</h3>
                <p class="text-indigo-100 text-sm">Ability to ship internationally</p>
            </div>
            <div class="bg-white/10 rounded-xl p-6 backdrop-blur">
                <i class="fas fa-headset text-3xl mb-4"></i>
                <h3 class="font-semibold text-lg mb-2">Customer Service</h3>
                <p class="text-indigo-100 text-sm">Responsive communication with buyers</p>
            </div>
        </div>
    </div>
</section>

<!-- Application Form -->
<section id="apply" class="section-padding bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900">Apply to Become a Supplier</h2>
                <p class="text-gray-600 mt-2">Fill in your company details. We'll review and respond within 3-5 business days.</p>
            </div>
            
            <form action="{{ route('become-supplier.submit') }}" method="POST" class="bg-gray-50 rounded-2xl p-8">
                @csrf
                
                <!-- Company Information -->
                <div class="mb-8">
                    <h3 class="font-semibold text-lg mb-4 pb-2 border-b border-gray-200">Company Information</h3>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="sm:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Company Name *</label>
                            <input type="text" name="company_name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" placeholder="e.g., ABC Manufacturing Ltd">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Business Type *</label>
                            <select name="business_type" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
                                <option value="">Select Type</option>
                                <option value="manufacturer">Manufacturer</option>
                                <option value="trading_company">Trading Company</option>
                                <option value="wholesaler">Wholesaler</option>
                                <option value="distributor">Distributor</option>
                                <option value="brand">Brand Owner</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Country *</label>
                            <input type="text" name="country" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" placeholder="e.g., China">
                        </div>
                        <div class="sm:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Main Products *</label>
                            <input type="text" name="main_products" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" placeholder="e.g., Electronics, Mobile Accessories, Bluetooth Speakers">
                        </div>
                    </div>
                </div>
                
                <!-- Contact Information -->
                <div class="mb-8">
                    <h3 class="font-semibold text-lg mb-4 pb-2 border-b border-gray-200">Contact Information</h3>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Contact Name *</label>
                            <input type="text" name="contact_name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Position *</label>
                            <input type="text" name="position" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" placeholder="e.g., Sales Manager">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                            <input type="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Phone *</label>
                            <input type="tel" name="phone" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" placeholder="+86 xxx xxxx xxxx">
                        </div>
                    </div>
                </div>
                
                <!-- Additional Information -->
                <div class="mb-8">
                    <h3 class="font-semibold text-lg mb-4 pb-2 border-b border-gray-200">Additional Information</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Year Established</label>
                            <input type="number" name="year_established" min="1900" max="2024" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" placeholder="e.g., 2010">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Company Website</label>
                            <input type="url" name="website" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" placeholder="https://www.example.com">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Why do you want to join Smart Q Store?</label>
                            <textarea name="reason" rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" placeholder="Tell us about your business goals..."></textarea>
                        </div>
                    </div>
                </div>
                
                <div class="flex items-start gap-3 mb-6">
                    <input type="checkbox" id="terms" name="terms" required class="w-5 h-5 text-indigo-600 mt-0.5">
                    <label for="terms" class="text-sm text-gray-600">
                        I agree to the <a href="#" class="text-indigo-600 hover:underline">Supplier Terms of Service</a> and confirm that all information provided is accurate. I understand that Smart Q Store reserves the right to verify my business information.
                    </label>
                </div>
                
                <button type="submit" class="w-full py-4 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition-colors">
                    <i class="fas fa-paper-plane mr-2"></i>Submit Application
                </button>
                
                <p class="text-xs text-gray-500 text-center mt-4">
                    Free registration. No credit card required. Join our verified supplier network today.
                </p>
            </form>
        </div>
    </div>
</section>
@endsection
