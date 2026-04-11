<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\TaxExemption;
use Illuminate\Support\Facades\Auth;

class BuyerCentralController extends Controller
{
    // Buyer Central Main Page
    public function index()
    {
        $categories = Category::where('is_active', true)->orderBy('sort_order')->get();
        $featuredProducts = Product::where('is_active', true)->where('is_featured', true)->limit(6)->get();
        
        return view('shop.buyer-central', compact('categories', 'featuredProducts'));
    }
    
    // Order Protection Page
    public function orderProtection()
    {
        $categories = Category::where('is_active', true)->orderBy('sort_order')->get();
        return view('shop.order-protection', compact('categories'));
    }
    
    // Tax Exemption Page
    public function taxExemption()
    {
        $categories = Category::where('is_active', true)->orderBy('sort_order')->get();
        $application = null;
        
        if (Auth::check()) {
            $application = TaxExemption::where('user_id', Auth::id())->first();
        }
        
        return view('shop.tax-exemption', compact('categories', 'application'));
    }
    
    // Submit Tax Exemption Application
    public function submitTaxExemption(Request $request)
    {
        $request->validate([
            'business_name' => 'required|string|max:255',
            'tax_id_number' => 'required|string|max:255',
            'business_type' => 'required|string',
            'business_address' => 'required|string',
            'city' => 'required|string',
            'country' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'certificate_number' => 'required|string',
        ]);
        
        TaxExemption::create([
            'user_id' => Auth::id(),
            'business_name' => $request->business_name,
            'tax_id_number' => $request->tax_id_number,
            'business_type' => $request->business_type,
            'business_address' => $request->business_address,
            'city' => $request->city,
            'country' => $request->country,
            'zip_code' => $request->zip_code,
            'phone' => $request->phone,
            'email' => $request->email,
            'tax_exemption_certificate' => $request->file('certificate') ? $request->file('certificate')->store('certificates') : null,
            'certificate_number' => $request->certificate_number,
            'certificate_expiry' => $request->certificate_expiry,
            'status' => 'pending',
        ]);
        
        return redirect()->back()->with('success', 'Your tax exemption application has been submitted and is under review.');
    }
    
    // Accio Work - Custom Manufacturing
    public function accioWork()
    {
        $categories = Category::where('is_active', true)->orderBy('sort_order')->get();
        return view('shop.accio-work', compact('categories'));
    }
    
    // Submit custom manufacturing request
    public function submitAccioWork(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'requirements' => 'required|string',
            'contact_name' => 'required|string',
            'contact_email' => 'required|email',
            'contact_phone' => 'required|string',
        ]);
        
        return redirect()->back()->with('success', 'Your custom manufacturing request has been submitted. Our team will contact you within 24 hours.');
    }
    
    // Become a Supplier Page
    public function becomeSupplier()
    {
        $categories = Category::where('is_active', true)->orderBy('sort_order')->get();
        return view('shop.become-supplier', compact('categories'));
    }
    
    // Submit supplier application
    public function submitSupplierApplication(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'country' => 'required|string',
            'business_type' => 'required|string',
            'main_products' => 'required|string',
        ]);
        
        return redirect()->back()->with('success', 'Thank you for your interest! Your supplier application has been received. We will review and contact you within 3-5 business days.');
    }
}
