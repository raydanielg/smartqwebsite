@extends('layouts.shop')

@section('title', 'Tax Exemption Program - Smart Q Store')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-br from-teal-600 to-teal-800 text-white py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/20 rounded-full mb-6">
                    <i class="fas fa-percentage"></i>
                    <span class="font-medium">Tax Exemption Program</span>
                </div>
                <h1 class="text-4xl font-bold mb-4">Save More with Tax Exemption</h1>
                <p class="text-teal-100 text-lg mb-6">
                    Apply once to unlock tax-exempt purchasing and eligible tax refunds. 
                    Available for registered businesses and organizations.
                </p>
                <a href="#apply" class="inline-flex items-center gap-2 px-6 py-3 bg-white text-teal-700 font-semibold rounded-lg hover:bg-teal-50 transition-colors">
                    <i class="fas fa-file-signature"></i>
                    Apply Now
                </a>
            </div>
            <div class="hidden lg:block">
                <div class="bg-white/10 rounded-2xl p-8 backdrop-blur">
                    <div class="grid grid-cols-3 gap-4">
                        <div class="text-center">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-user-plus text-xl"></i>
                            </div>
                            <div class="text-sm font-medium">Easy Enrollment</div>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-shopping-cart text-xl"></i>
                            </div>
                            <div class="text-sm font-medium">Tax-free Purchases</div>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-undo text-xl"></i>
                            </div>
                            <div class="text-sm font-medium">Easy Refunds</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How It Works -->
<section class="section-padding bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900">How Tax Exemption Works</h2>
            <p class="text-gray-600 mt-2">Three simple steps to start saving</p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <div class="text-center p-6 rounded-2xl bg-teal-50">
                <div class="w-16 h-16 bg-teal-600 text-white rounded-2xl flex items-center justify-center mx-auto mb-4 text-2xl font-bold">1</div>
                <h3 class="font-semibold text-lg mb-2">Easy Enrollment</h3>
                <p class="text-gray-600 text-sm">Upload your tax exemption certificate and business documents. Approval within 2-3 business days.</p>
            </div>
            <div class="text-center p-6 rounded-2xl bg-teal-50">
                <div class="w-16 h-16 bg-teal-600 text-white rounded-2xl flex items-center justify-center mx-auto mb-4 text-2xl font-bold">2</div>
                <h3 class="font-semibold text-lg mb-2">Tax-exempt Purchases</h3>
                <p class="text-gray-600 text-sm">Once approved, taxes are automatically removed at checkout. No extra steps needed.</p>
            </div>
            <div class="text-center p-6 rounded-2xl bg-teal-50">
                <div class="w-16 h-16 bg-teal-600 text-white rounded-2xl flex items-center justify-center mx-auto mb-4 text-2xl font-bold">3</div>
                <h3 class="font-semibold text-lg mb-2">Streamlined Refund</h3>
                <p class="text-gray-600 text-sm">Get eligible taxes refunded easily once your exemption is verified.</p>
            </div>
        </div>
    </div>
</section>

<!-- Application Status or Form -->
<section id="apply" class="section-padding bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto">
            @if($application)
                <!-- Show Application Status -->
                <div class="bg-white rounded-xl shadow-sm p-8">
                    <div class="text-center mb-6">
                        <div class="w-16 h-16 bg-{{ $application->status == 'approved' ? 'green' : ($application->status == 'rejected' ? 'red' : 'yellow') }}-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-{{ $application->status == 'approved' ? 'check' : ($application->status == 'rejected' ? 'times' : 'clock') }} text-{{ $application->status == 'approved' ? 'green' : ($application->status == 'rejected' ? 'red' : 'yellow') }}-600 text-2xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900">Application {{ ucfirst($application->status) }}</h2>
                        <p class="text-gray-600 mt-2">
                            @if($application->status == 'pending')
                                Your application is under review. We'll notify you once it's processed.
                            @elseif($application->status == 'approved')
                                Congratulations! Your tax exemption is now active.
                            @else
                                Unfortunately, your application was not approved. Contact support for details.
                            @endif
                        </p>
                    </div>
                    
                    @if($application->status == 'approved')
                        <div class="bg-green-50 rounded-lg p-4 mb-6">
                            <div class="flex items-center gap-2 text-green-700 mb-2">
                                <i class="fas fa-check-circle"></i>
                                <span class="font-semibold">Tax Exemption Active</span>
                            </div>
                            <p class="text-green-600 text-sm">Certificate #: {{ $application->certificate_number }}</p>
                            <p class="text-green-600 text-sm">Valid until: {{ $application->certificate_expiry ? $application->certificate_expiry->format('M d, Y') : 'N/A' }}</p>
                        </div>
                    @endif
                    
                    <div class="border-t pt-6">
                        <h3 class="font-semibold mb-4">Application Details</h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between"><span class="text-gray-500">Business:</span> <span>{{ $application->business_name }}</span></div>
                            <div class="flex justify-between"><span class="text-gray-500">Tax ID:</span> <span>{{ $application->tax_id_number }}</span></div>
                            <div class="flex justify-between"><span class="text-gray-500">Submitted:</span> <span>{{ $application->created_at->format('M d, Y') }}</span></div>
                        </div>
                    </div>
                </div>
            @else
                <!-- Application Form -->
                <div class="bg-white rounded-xl shadow-sm p-8">
                    <div class="text-center mb-8">
                        <h2 class="text-2xl font-bold text-gray-900">Apply for Tax Exemption</h2>
                        <p class="text-gray-600 mt-2">Fill in your business details below</p>
                    </div>
                    
                    @guest
                        <div class="text-center p-6 bg-yellow-50 rounded-lg">
                            <i class="fas fa-lock text-yellow-600 text-3xl mb-3"></i>
                            <p class="text-gray-700 mb-4">Please sign in to apply for tax exemption</p>
                            <a href="{{ route('login') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-teal-600 text-white rounded-lg hover:bg-teal-700 transition-colors">
                                <i class="fas fa-sign-in-alt"></i> Sign In
                            </a>
                        </div>
                    @else
                        <form action="{{ route('tax-exemption.submit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="space-y-6">
                                <!-- Business Information -->
                                <div>
                                    <h3 class="font-semibold text-lg mb-4 pb-2 border-b">Business Information</h3>
                                    <div class="grid sm:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Business Name *</label>
                                            <input type="text" name="business_name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Tax ID Number *</label>
                                            <input type="text" name="tax_id_number" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Business Type *</label>
                                            <select name="business_type" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500">
                                                <option value="">Select Type</option>
                                                <option value="corporation">Corporation</option>
                                                <option value="llc">LLC</option>
                                                <option value="partnership">Partnership</option>
                                                <option value="sole_proprietorship">Sole Proprietorship</option>
                                                <option value="nonprofit">Non-Profit</option>
                                                <option value="government">Government</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Certificate Number *</label>
                                            <input type="text" name="certificate_number" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500">
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Address -->
                                <div>
                                    <h3 class="font-semibold text-lg mb-4 pb-2 border-b">Business Address</h3>
                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Street Address *</label>
                                            <input type="text" name="business_address" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500">
                                        </div>
                                        <div class="grid sm:grid-cols-3 gap-4">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">City *</label>
                                                <input type="text" name="city" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Country *</label>
                                                <input type="text" name="country" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Zip Code</label>
                                                <input type="text" name="zip_code" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Contact -->
                                <div>
                                    <h3 class="font-semibold text-lg mb-4 pb-2 border-b">Contact Information</h3>
                                    <div class="grid sm:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Phone *</label>
                                            <input type="tel" name="phone" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                                            <input type="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500">
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Certificate Upload -->
                                <div>
                                    <h3 class="font-semibold text-lg mb-4 pb-2 border-b">Tax Exemption Certificate</h3>
                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Upload Certificate (PDF, JPG, PNG)</label>
                                            <input type="file" name="certificate" accept=".pdf,.jpg,.jpeg,.png" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Certificate Expiry Date</label>
                                            <input type="date" name="certificate_expiry" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="pt-4">
                                    <button type="submit" class="w-full py-3 bg-teal-600 text-white font-semibold rounded-lg hover:bg-teal-700 transition-colors">
                                        <i class="fas fa-paper-plane mr-2"></i>Submit Application
                                    </button>
                                    <p class="text-xs text-gray-500 text-center mt-3">
                                        By submitting, you agree that all information provided is accurate and complete.
                                    </p>
                                </div>
                            </div>
                        </form>
                    @endguest
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
