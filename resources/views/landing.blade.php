@extends('layouts.main')

@section('title', 'Smart Q Store')
@section('meta_description', 'Smart Q Store - Import goods from China to Tanzania. Fast cargo, dropshipping, and product sourcing services. Your trusted import partner.')

@section('content')
    <!-- Hero Section -->
    @include('sections.hero')
    
    <!-- Services Section -->
    @include('sections.services')
    
    <!-- Categories Section -->
    @include('sections.categories')
    
    <!-- Features Section -->
    @include('sections.features')
    
    <!-- Testimonials Section -->
    @include('sections.testimonials')
    
    <!-- FAQ Section -->
    @include('sections.faq')
    
    <!-- Contact Section -->
    @include('sections.contact')
@endsection

@section('scripts')
<script>
    // FAQ Toggle Enhancement
    document.addEventListener('DOMContentLoaded', function() {
        // Add smooth reveal animation on scroll
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.1
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, observerOptions);
        
        document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
    });
</script>
@endsection
