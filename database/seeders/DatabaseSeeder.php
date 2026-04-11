<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Feature;
use App\Models\Faq;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\HeroSlide;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create admin user
        User::create([
            'name' => 'Smart Q Admin',
            'email' => 'admin@smartqstore.com',
            'password' => Hash::make('password'),
        ]);

        // Hero Slides
        HeroSlide::create([
            'title' => 'Import From China To Tanzania',
            'subtitle' => 'SMART Q STORE',
            'description' => 'Your trusted partner for importing goods from China to Tanzania. We handle everything from sourcing to delivery.',
            'button_text' => 'Get Started',
            'button_link' => '#services',
            'secondary_button_text' => 'Learn More',
            'secondary_button_link' => '#about',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        HeroSlide::create([
            'title' => 'Fast & Reliable Shipping',
            'subtitle' => 'CARGO SERVICES',
            'description' => 'Air and sea cargo services with real-time tracking. Your goods delivered safely and on time.',
            'button_text' => 'Track Shipment',
            'button_link' => '#track',
            'secondary_button_text' => 'Our Services',
            'secondary_button_link' => '#services',
            'sort_order' => 2,
            'is_active' => true,
        ]);

        HeroSlide::create([
            'title' => 'Start Your Dropshipping Business',
            'subtitle' => 'DROPSHIPPING',
            'description' => 'No inventory needed! We handle storage, packaging, and shipping while you focus on sales.',
            'button_text' => 'Start Now',
            'button_link' => '#contact',
            'secondary_button_text' => 'How It Works',
            'secondary_button_link' => '#faq',
            'sort_order' => 3,
            'is_active' => true,
        ]);

        // Categories
        Category::create([
            'name' => 'Electronics',
            'slug' => 'electronics',
            'description' => 'Smartphones, laptops, accessories, and electronic components',
            'icon' => 'fas fa-laptop',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Fashion & Clothing',
            'slug' => 'fashion',
            'description' => 'Trendy apparel, shoes, bags, and fashion accessories',
            'icon' => 'fas fa-tshirt',
            'sort_order' => 2,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Home & Garden',
            'slug' => 'home-garden',
            'description' => 'Furniture, decor, kitchenware, and gardening supplies',
            'icon' => 'fas fa-home',
            'sort_order' => 3,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Machinery',
            'slug' => 'machinery',
            'description' => 'Industrial equipment, tools, and manufacturing machinery',
            'icon' => 'fas fa-cogs',
            'sort_order' => 4,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Beauty & Health',
            'slug' => 'beauty-health',
            'description' => 'Cosmetics, skincare, health supplements, and wellness products',
            'icon' => 'fas fa-heart',
            'sort_order' => 5,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Auto Parts',
            'slug' => 'auto-parts',
            'description' => 'Vehicle parts, accessories, and automotive tools',
            'icon' => 'fas fa-car',
            'sort_order' => 6,
            'is_active' => true,
        ]);

        // Services
        Service::create([
            'title' => 'Air Cargo',
            'slug' => 'air-cargo',
            'short_description' => 'Fast delivery within 3-7 days',
            'description' => 'Our air cargo service ensures your goods arrive in Tanzania within 3-7 days. Perfect for urgent shipments and high-value items. We handle customs clearance and door-to-door delivery.',
            'icon' => 'fas fa-plane',
            'price_text' => 'From $15/kg',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        Service::create([
            'title' => 'Sea Freight',
            'slug' => 'sea-freight',
            'short_description' => 'Economical shipping for bulk goods',
            'description' => 'Cost-effective sea freight for large and heavy shipments. Delivery time is 30-45 days. Ideal for bulk orders, machinery, and furniture. Full container (FCL) and less container (LCL) options available.',
            'icon' => 'fas fa-ship',
            'price_text' => 'From $350/CBM',
            'sort_order' => 2,
            'is_active' => true,
        ]);

        Service::create([
            'title' => 'Dropshipping',
            'slug' => 'dropshipping',
            'short_description' => 'Start selling without inventory',
            'description' => 'Our dropshipping service allows you to start an e-commerce business without holding inventory. We store, pack, and ship products directly to your customers. You focus on marketing and sales.',
            'icon' => 'fas fa-box-open',
            'price_text' => 'Per Order Basis',
            'sort_order' => 3,
            'is_active' => true,
        ]);

        Service::create([
            'title' => 'Product Sourcing',
            'slug' => 'product-sourcing',
            'short_description' => 'Find any product from China',
            'description' => 'We help you find reliable suppliers and manufacturers in China. Our team verifies product quality, negotiates prices, and ensures you get the best deals for your business needs.',
            'icon' => 'fas fa-search',
            'price_text' => '5% Commission',
            'sort_order' => 4,
            'is_active' => true,
        ]);

        Service::create([
            'title' => 'Warehousing',
            'slug' => 'warehousing',
            'short_description' => 'Safe storage in China & Tanzania',
            'description' => 'Secure warehousing facilities in both China and Tanzania. Store your goods safely before shipping or after arrival. Flexible storage terms and inventory management available.',
            'icon' => 'fas fa-warehouse',
            'price_text' => 'Daily/Monthly Rates',
            'sort_order' => 5,
            'is_active' => true,
        ]);

        Service::create([
            'title' => 'Customs Clearance',
            'slug' => 'customs-clearance',
            'short_description' => 'Hassle-free import documentation',
            'description' => 'We handle all customs documentation and clearance procedures. Our experienced team ensures smooth import processes, tax compliance, and quick release of your goods.',
            'icon' => 'fas fa-file-alt',
            'price_text' => 'Package Deal',
            'sort_order' => 6,
            'is_active' => true,
        ]);

        // Features
        Feature::create([
            'title' => 'Fast Shipping',
            'description' => 'Air cargo in 3-7 days, sea freight in 30-45 days',
            'icon' => 'fas fa-shipping-fast',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        Feature::create([
            'title' => 'Real-time Tracking',
            'description' => 'Track your shipment status 24/7 from China to Tanzania',
            'icon' => 'fas fa-map-marker-alt',
            'sort_order' => 2,
            'is_active' => true,
        ]);

        Feature::create([
            'title' => 'Secure Packaging',
            'description' => 'Professional packaging to ensure safe delivery',
            'icon' => 'fas fa-box',
            'sort_order' => 3,
            'is_active' => true,
        ]);

        Feature::create([
            'title' => 'Best Prices',
            'description' => 'Competitive rates with no hidden charges',
            'icon' => 'fas fa-tags',
            'sort_order' => 4,
            'is_active' => true,
        ]);

        Feature::create([
            'title' => '24/7 Support',
            'description' => 'Round-the-clock customer service in Swahili & English',
            'icon' => 'fas fa-headset',
            'sort_order' => 5,
            'is_active' => true,
        ]);

        Feature::create([
            'title' => 'Trusted Partners',
            'description' => 'Verified suppliers and reliable logistics partners',
            'icon' => 'fas fa-handshake',
            'sort_order' => 6,
            'is_active' => true,
        ]);

        // Testimonials
        Testimonial::create([
            'name' => 'John Mwakalinga',
            'position' => 'Business Owner',
            'company' => 'Mwaka Electronics',
            'content' => 'Smart Q Store has transformed my business. I can now import electronics from China with confidence. Their air cargo service is incredibly fast and reliable.',
            'rating' => 5,
            'sort_order' => 1,
            'is_active' => true,
        ]);

        Testimonial::create([
            'name' => 'Grace Mwakasege',
            'position' => 'Entrepreneur',
            'company' => 'Grace Fashion House',
            'content' => 'The dropshipping service is a game-changer! I started my online clothing store with zero inventory. Smart Q handles everything from storage to delivery.',
            'rating' => 5,
            'sort_order' => 2,
            'is_active' => true,
        ]);

        Testimonial::create([
            'name' => 'Michael Mponda',
            'position' => 'Import Manager',
            'company' => 'Mponda Hardware',
            'content' => 'We have been using their sea freight service for 2 years now. The customs clearance support is exceptional. They handle all the paperwork professionally.',
            'rating' => 5,
            'sort_order' => 3,
            'is_active' => true,
        ]);

        Testimonial::create([
            'name' => 'Sarah Kimaro',
            'position' => 'CEO',
            'company' => 'Beauty Zone Tanzania',
            'content' => 'Finding reliable beauty product suppliers was challenging until I found Smart Q. Their sourcing service connected me with amazing manufacturers in China.',
            'rating' => 5,
            'sort_order' => 4,
            'is_active' => true,
        ]);

        // FAQs
        Faq::create([
            'question' => 'How long does shipping take from China to Tanzania?',
            'answer' => 'Air cargo takes 3-7 business days, while sea freight takes 30-45 days depending on the port of departure and customs clearance. We provide tracking numbers so you can monitor your shipment in real-time.',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        Faq::create([
            'question' => 'What products can I import through Smart Q Store?',
            'answer' => 'We handle almost all product categories including electronics, fashion, home goods, machinery, auto parts, beauty products, and more. However, we do not ship prohibited items such as weapons, illegal substances, or hazardous materials without proper documentation.',
            'sort_order' => 2,
            'is_active' => true,
        ]);

        Faq::create([
            'question' => 'How does the dropshipping service work?',
            'answer' => 'With our dropshipping service, you can sell products without holding inventory. Simply list products on your store, and when a customer places an order, we handle packaging and shipping directly to your customer. You keep the profit margin between your selling price and our cost.',
            'sort_order' => 3,
            'is_active' => true,
        ]);

        Faq::create([
            'question' => 'Do you help with customs clearance?',
            'answer' => 'Yes! We provide full customs clearance support including documentation preparation, duty calculations, and communication with customs authorities. This ensures your goods are cleared quickly without delays.',
            'sort_order' => 4,
            'is_active' => true,
        ]);

        Faq::create([
            'question' => 'What are your payment terms?',
            'answer' => 'We accept payment via bank transfer, mobile money (M-Pesa, Tigo Pesa, Airtel Money), and major credit cards. For regular customers, we offer credit terms after establishing a business relationship.',
            'sort_order' => 5,
            'is_active' => true,
        ]);

        Faq::create([
            'question' => 'How do I track my shipment?',
            'answer' => 'Once your shipment is dispatched, we provide a unique tracking number. You can track your cargo through our website or mobile app. We also send email and SMS updates at every major milestone of the delivery journey.',
            'sort_order' => 6,
            'is_active' => true,
        ]);

        Faq::create([
            'question' => 'Can I visit your office in Tanzania?',
            'answer' => 'Absolutely! Our main office is located in Dar es Salaam, and we have representatives in Arusha and Mwanza. You are welcome to visit us to discuss your import needs in person.',
            'sort_order' => 7,
            'is_active' => true,
        ]);

        Faq::create([
            'question' => 'Do you offer warehousing services?',
            'answer' => 'Yes, we offer secure warehousing in both China and Tanzania. You can store your goods before shipping or after arrival. This is particularly useful for dropshipping businesses and bulk importers.',
            'sort_order' => 8,
            'is_active' => true,
        ]);

        // Site Settings
        SiteSetting::create(['key' => 'site_name', 'value' => 'Smart Q Store', 'type' => 'string', 'group' => 'general']);
        SiteSetting::create(['key' => 'site_tagline', 'value' => 'Your Trusted Import Partner', 'type' => 'string', 'group' => 'general']);
        SiteSetting::create(['key' => 'contact_email', 'value' => 'info@smartqstore.com', 'type' => 'string', 'group' => 'contact']);
        SiteSetting::create(['key' => 'contact_phone', 'value' => '+255 XXX XXX XXX', 'type' => 'string', 'group' => 'contact']);
        SiteSetting::create(['key' => 'office_address', 'value' => 'Dar es Salaam, Tanzania', 'type' => 'string', 'group' => 'contact']);
        SiteSetting::create(['key' => 'facebook_url', 'value' => 'https://facebook.com/smartqstore', 'type' => 'string', 'group' => 'social']);
        SiteSetting::create(['key' => 'instagram_url', 'value' => 'https://instagram.com/smartqstore', 'type' => 'string', 'group' => 'social']);
        SiteSetting::create(['key' => 'whatsapp_number', 'value' => '+255XXXXXXXXX', 'type' => 'string', 'group' => 'social']);
    }
}
