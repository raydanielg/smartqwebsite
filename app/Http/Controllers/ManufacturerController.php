<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufacturer;
use App\Models\Category;

class ManufacturerController extends Controller
{
    // List all verified manufacturers
    public function index()
    {
        $query = Manufacturer::where('is_active', true)
            ->where('is_verified', true)
            ->orderBy('verification_level')
            ->orderBy('sort_order');
        
        // Filter by country
        if (request()->has('country')) {
            $query->where('country', request('country'));
        }
        
        // Filter by business type
        if (request()->has('type')) {
            $query->where('business_type', request('type'));
        }
        
        // Filter by verification level
        if (request()->has('level')) {
            $query->where('verification_level', request('level'));
        }
        
        $manufacturers = $query->paginate(12);
        $countries = Manufacturer::where('is_active', true)->distinct()->pluck('country');
        $categories = Category::where('is_active', true)->orderBy('sort_order')->get();
        
        return view('shop.manufacturers', compact('manufacturers', 'countries', 'categories'));
    }
    
    // Show single manufacturer details
    public function show($slug)
    {
        $manufacturer = Manufacturer::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();
        $categories = Category::where('is_active', true)->orderBy('sort_order')->get();
        
        return view('shop.manufacturer-detail', compact('manufacturer', 'categories'));
    }
}
