<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeroSlide;
use App\Models\Category;
use App\Models\Service;
use App\Models\Feature;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\SiteSetting;

class LandingController extends Controller
{
    public function index()
    {
        $heroSlides = HeroSlide::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $categories = Category::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $services = Service::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $features = Feature::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $testimonials = Testimonial::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $faqs = Faq::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $siteSettings = SiteSetting::all()->keyBy('key');

        return view('landing', compact(
            'heroSlides',
            'categories',
            'services',
            'features',
            'testimonials',
            'faqs',
            'siteSettings'
        ));
    }
}
