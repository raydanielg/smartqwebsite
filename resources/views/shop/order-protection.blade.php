@extends('layouts.shop')

@section('title', 'Order Protection - Smart Q Store')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-br from-green-600 to-green-800 text-white py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/20 rounded-full mb-6">
                <i class="fas fa-shield-alt"></i>
                <span class="font-medium">Trade Assurance</span>
            </div>
            <h1 class="text-4xl font-bold mb-4">Your Orders Are Protected</h1>
            <p class="text-green-100 text-lg">
                Shop with confidence knowing your purchases are fully protected. 
                From payment to delivery, we've got you covered.
            </p>
        </div>
    </div>
</section>

<!-- Protection Features -->
<section class="section-padding bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900">What's Protected?</h2>
            <p class="text-gray-600 mt-2">Comprehensive protection for every order</p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="p-6 bg-green-50 rounded-2xl text-center">
                <div class="w-16 h-16 bg-green-600 text-white rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-box-open text-2xl"></i>
                </div>
                <h3 class="font-semibold text-lg mb-2">Product Quality</h3>
                <p class="text-gray-600 text-sm">Full refund if products don't match the agreed specifications.</p>
            </div>
            <div class="p-6 bg-green-50 rounded-2xl text-center">
                <div class="w-16 h-16 bg-green-600 text-white rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-shipping-fast text-2xl"></i>
                </div>
                <h3 class="font-semibold text-lg mb-2">On-Time Delivery</h3>
                <p class="text-gray-600 text-sm">Compensation for delays beyond the agreed shipping date.</p>
            </div>
            <div class="p-6 bg-green-50 rounded-2xl text-center">
                <div class="w-16 h-16 bg-green-600 text-white rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-credit-card text-2xl"></i>
                </div>
                <h3 class="font-semibold text-lg mb-2">Payment Security</h3>
                <p class="text-gray-600 text-sm">Your payment is held securely until you confirm receipt.</p>
            </div>
            <div class="p-6 bg-green-50 rounded-2xl text-center">
                <div class="w-16 h-16 bg-green-600 text-white rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-undo text-2xl"></i>
                </div>
                <h3 class="font-semibold text-lg mb-2">Easy Returns</h3>
                <p class="text-gray-600 text-sm">Hassle-free return process with prepaid shipping labels.</p>
            </div>
        </div>
    </div>
</section>

<!-- How Protection Works -->
<section class="section-padding bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">How Order Protection Works</h2>
                <div class="space-y-6">
                    <div class="flex gap-4">
                        <div class="w-10 h-10 bg-green-600 text-white rounded-full flex items-center justify-center flex-shrink-0 font-bold">1</div>
                        <div>
                            <h3 class="font-semibold text-lg">Place Your Order</h3>
                            <p class="text-gray-600">Shop from verified suppliers and add items to your cart. Protection is automatically included.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-10 h-10 bg-green-600 text-white rounded-full flex items-center justify-center flex-shrink-0 font-bold">2</div>
                        <div>
                            <h3 class="font-semibold text-lg">Secure Payment</h3>
                            <p class="text-gray-600">Your payment is held in escrow until you confirm satisfactory delivery.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-10 h-10 bg-green-600 text-white rounded-full flex items-center justify-center flex-shrink-0 font-bold">3</div>
                        <div>
                            <h3 class="font-semibold text-lg">Inspection Period</h3>
                            <p class="text-gray-600">7 days to inspect your order. Report any issues for immediate resolution.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-10 h-10 bg-green-600 text-white rounded-full flex items-center justify-center flex-shrink-0 font-bold">4</div>
                        <div>
                            <h3 class="font-semibold text-lg">Release Payment</h3>
                            <p class="text-gray-600">Once satisfied, release payment to supplier. Full refund available if issues arise.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl p-8 shadow-lg">
                <h3 class="font-semibold text-xl mb-6">Protection Coverage</h3>
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-check-circle text-green-500 text-xl"></i>
                        <span>Product not as described</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fas fa-check-circle text-green-500 text-xl"></i>
                        <span>Damaged or defective items</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fas fa-check-circle text-green-500 text-xl"></i>
                        <span>Missing items from order</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fas fa-check-circle text-green-500 text-xl"></i>
                        <span>Late delivery beyond agreement</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fas fa-check-circle text-green-500 text-xl"></i>
                        <span>Supplier fails to ship</span>
                    </div>
                </div>
                <div class="mt-8 pt-6 border-t">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-gray-600">Coverage Limit</span>
                        <span class="font-semibold">Up to $50,000</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Claim Period</span>
                        <span class="font-semibold">Within 30 days</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Claim Process -->
<section class="section-padding bg-green-600 text-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold">File a Claim</h2>
            <p class="text-green-100 mt-2">Simple 3-step process to resolve any issues</p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <div class="text-center p-6 bg-white/10 rounded-2xl">
                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-file-alt text-2xl"></i>
                </div>
                <h3 class="font-semibold text-xl mb-2">1. Submit Claim</h3>
                <p class="text-green-100">Provide order details and describe the issue with supporting photos.</p>
            </div>
            <div class="text-center p-6 bg-white/10 rounded-2xl">
                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-gavel text-2xl"></i>
                </div>
                <h3 class="font-semibold text-xl mb-2">2. Investigation</h3>
                <p class="text-green-100">Our team reviews your claim and coordinates with the supplier.</p>
            </div>
            <div class="text-center p-6 bg-white/10 rounded-2xl">
                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-hand-holding-usd text-2xl"></i>
                </div>
                <h3 class="font-semibold text-xl mb-2">3. Resolution</h3>
                <p class="text-green-100">Receive refund, replacement, or compensation within 5-7 days.</p>
            </div>
        </div>
        
        <div class="text-center mt-12">
            <a href="#" class="inline-flex items-center gap-2 px-8 py-4 bg-white text-green-700 font-semibold rounded-lg hover:bg-green-50 transition-colors">
                <i class="fas fa-shield-alt"></i>
                File a Protection Claim
            </a>
        </div>
    </div>
</section>
@endsection
