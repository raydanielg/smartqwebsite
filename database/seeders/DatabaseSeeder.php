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
use App\Models\Product;
use App\Models\Manufacturer;
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

        // Products (Sample products for the shop)
        // Electronics Category (ID: 1)
        Product::create([
            'category_id' => 1,
            'name' => 'iPhone 15 Pro Max - 256GB',
            'slug' => 'iphone-15-pro-max-256gb',
            'description' => 'Latest iPhone with A17 Pro chip, titanium design, and advanced camera system. Available in multiple colors.',
            'short_description' => '256GB, A17 Pro chip, Titanium design',
            'sku' => 'IP15PM-256',
            'price' => 1850.00,
            'sale_price' => 1750.00,
            'stock_quantity' => 15,
            'image' => 'https://via.placeholder.com/400x400/8B4513/FFFFFF?text=iPhone+15',
            'is_featured' => true,
            'is_active' => true,
            'sort_order' => 1,
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Samsung Galaxy S24 Ultra - 512GB',
            'slug' => 'samsung-galaxy-s24-ultra-512gb',
            'description' => 'Powerful Android smartphone with AI features, S Pen, and 200MP camera. Perfect for business professionals.',
            'short_description' => '512GB, S Pen included, 200MP camera',
            'sku' => 'SGS24U-512',
            'price' => 1650.00,
            'stock_quantity' => 20,
            'image' => 'https://via.placeholder.com/400x400/654321/FFFFFF?text=Galaxy+S24',
            'is_featured' => true,
            'is_active' => true,
            'sort_order' => 2,
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'MacBook Pro 14" M3 Chip',
            'slug' => 'macbook-pro-14-m3-chip',
            'description' => 'Professional laptop with M3 chip, 18-hour battery life, and stunning Liquid Retina XDR display.',
            'short_description' => 'M3 chip, 18hr battery, XDR display',
            'sku' => 'MBP14-M3',
            'price' => 2400.00,
            'sale_price' => 2299.00,
            'stock_quantity' => 8,
            'image' => 'https://via.placeholder.com/400x400/D2691E/FFFFFF?text=MacBook+Pro',
            'is_featured' => true,
            'is_active' => true,
            'sort_order' => 3,
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Wireless Bluetooth Earbuds Pro',
            'slug' => 'wireless-bluetooth-earbuds-pro',
            'description' => 'Premium wireless earbuds with active noise cancellation, 30-hour battery life, and crystal clear sound.',
            'short_description' => 'ANC, 30hr battery, Premium sound',
            'sku' => 'BT-EARBUDS-PRO',
            'price' => 89.99,
            'sale_price' => 69.99,
            'stock_quantity' => 50,
            'image' => 'https://via.placeholder.com/400x400/8B4513/FFFFFF?text=Earbuds',
            'is_featured' => false,
            'is_active' => true,
            'sort_order' => 4,
        ]);

        // Fashion Category (ID: 2)
        Product::create([
            'category_id' => 2,
            'name' => 'Designer Leather Handbag',
            'slug' => 'designer-leather-handbag',
            'description' => 'Genuine Italian leather handbag with gold-tone hardware. Elegant design perfect for any occasion.',
            'short_description' => 'Genuine leather, Gold hardware',
            'sku' => 'BAG-LEATHER-01',
            'price' => 299.00,
            'stock_quantity' => 25,
            'image' => 'https://via.placeholder.com/400x400/654321/FFFFFF?text=Handbag',
            'is_featured' => true,
            'is_active' => true,
            'sort_order' => 5,
        ]);

        Product::create([
            'category_id' => 2,
            'name' => 'Men\'s Business Suit Set',
            'slug' => 'mens-business-suit-set',
            'description' => 'Premium quality business suit including jacket, trousers, and vest. Tailored fit for professional look.',
            'short_description' => '3-piece suit, Premium quality',
            'sku' => 'SUIT-BUS-001',
            'price' => 189.00,
            'sale_price' => 159.00,
            'stock_quantity' => 30,
            'image' => 'https://via.placeholder.com/400x400/D2691E/FFFFFF?text=Business+Suit',
            'is_featured' => false,
            'is_active' => true,
            'sort_order' => 6,
        ]);

        Product::create([
            'category_id' => 2,
            'name' => 'Running Shoes - Sport Edition',
            'slug' => 'running-shoes-sport-edition',
            'description' => 'Lightweight running shoes with breathable mesh upper and cushioned sole for maximum comfort.',
            'short_description' => 'Lightweight, Breathable, Cushioned',
            'sku' => 'SHOES-RUN-001',
            'price' => 79.99,
            'stock_quantity' => 40,
            'image' => 'https://via.placeholder.com/400x400/8B4513/FFFFFF?text=Running+Shoes',
            'is_featured' => false,
            'is_active' => true,
            'sort_order' => 7,
        ]);

        // Home & Garden Category (ID: 3)
        Product::create([
            'category_id' => 3,
            'name' => 'Smart Home Security Camera',
            'slug' => 'smart-home-security-camera',
            'description' => 'HD wireless security camera with night vision, motion detection, and two-way audio. App controlled.',
            'short_description' => 'HD, Night vision, Motion detection',
            'sku' => 'CAM-SEC-001',
            'price' => 129.99,
            'sale_price' => 99.99,
            'stock_quantity' => 35,
            'image' => 'https://via.placeholder.com/400x400/654321/FFFFFF?text=Security+Cam',
            'is_featured' => true,
            'is_active' => true,
            'sort_order' => 8,
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Modern LED Floor Lamp',
            'slug' => 'modern-led-floor-lamp',
            'description' => 'Adjustable LED floor lamp with multiple color temperatures and brightness levels. Touch control.',
            'short_description' => 'Adjustable, Touch control, Modern',
            'sku' => 'LAMP-LED-001',
            'price' => 149.00,
            'stock_quantity' => 20,
            'image' => 'https://via.placeholder.com/400x400/D2691E/FFFFFF?text=LED+Lamp',
            'is_featured' => false,
            'is_active' => true,
            'sort_order' => 9,
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Kitchen Appliance Set',
            'slug' => 'kitchen-appliance-set',
            'description' => 'Complete kitchen set including blender, food processor, and electric kettle. High quality stainless steel.',
            'short_description' => 'Blender, Processor, Kettle set',
            'sku' => 'KIT-SET-001',
            'price' => 249.00,
            'sale_price' => 199.00,
            'stock_quantity' => 15,
            'image' => 'https://via.placeholder.com/400x400/8B4513/FFFFFF?text=Kitchen+Set',
            'is_featured' => true,
            'is_active' => true,
            'sort_order' => 10,
        ]);

        // Machinery Category (ID: 4)
        Product::create([
            'category_id' => 4,
            'name' => 'Industrial Air Compressor 50L',
            'slug' => 'industrial-air-compressor-50l',
            'description' => 'Heavy-duty 50L air compressor for industrial use. Powerful motor and durable tank construction.',
            'short_description' => '50L tank, Heavy-duty, Industrial',
            'sku' => 'COMP-50L-001',
            'price' => 599.00,
            'stock_quantity' => 10,
            'image' => 'https://via.placeholder.com/400x400/654321/FFFFFF?text=Compressor',
            'is_featured' => false,
            'is_active' => true,
            'sort_order' => 11,
        ]);

        // Beauty & Health Category (ID: 5)
        Product::create([
            'category_id' => 5,
            'name' => 'Professional Hair Dryer',
            'slug' => 'professional-hair-dryer',
            'description' => 'Salon-quality hair dryer with ionic technology, multiple heat settings, and diffuser attachment.',
            'short_description' => 'Ionic tech, Multiple settings',
            'sku' => 'DRYER-HAIR-001',
            'price' => 89.00,
            'sale_price' => 69.00,
            'stock_quantity' => 25,
            'image' => 'https://via.placeholder.com/400x400/D2691E/FFFFFF?text=Hair+Dryer',
            'is_featured' => false,
            'is_active' => true,
            'sort_order' => 12,
        ]);

        // Auto Parts Category (ID: 6)
        Product::create([
            'category_id' => 6,
            'name' => 'Car Diagnostic Tool OBD2',
            'slug' => 'car-diagnostic-tool-obd2',
            'description' => 'Professional OBD2 scanner for vehicle diagnostics. Compatible with most cars after 1996.',
            'short_description' => 'OBD2 scanner, Universal compatibility',
            'sku' => 'OBD2-SCAN-001',
            'price' => 79.99,
            'stock_quantity' => 30,
            'image' => 'https://via.placeholder.com/400x400/8B4513/FFFFFF?text=OBD2+Scanner',
            'is_featured' => false,
            'is_active' => true,
            'sort_order' => 13,
        ]);

        // Sample Manufacturers (Verified Suppliers)
        Manufacturer::create([
            'name' => 'Shenzhen TechPro Electronics Co., Ltd.',
            'slug' => 'shenzhen-techpro-electronics',
            'description' => 'Leading manufacturer of consumer electronics and mobile accessories. Specializing in smartphones, tablets, and wireless devices with 15+ years of experience.',
            'country' => 'China',
            'city' => 'Shenzhen',
            'business_type' => 'manufacturer',
            'main_products' => 'Electronics, Mobile Phones, Accessories',
            'year_established' => 2008,
            'total_employees' => 500,
            'certifications' => 'ISO 9001, CE, FCC, RoHS',
            'is_verified' => true,
            'verification_level' => 'gold',
            'contact_person' => 'Mr. David Chen',
            'phone' => '+86 755 1234 5678',
            'email' => 'sales@techpro-e.com',
            'website' => 'https://techpro-e.com',
            'response_rate' => 98.5,
            'transactions_count' => 1250,
            'is_active' => true,
            'sort_order' => 1,
        ]);

        Manufacturer::create([
            'name' => 'Guangzhou FashionHub Textiles',
            'slug' => 'guangzhou-fashionhub-textiles',
            'description' => 'Premium garment manufacturer specializing in fashion apparel, handbags, and accessories. Exporting to 30+ countries worldwide.',
            'country' => 'China',
            'city' => 'Guangzhou',
            'business_type' => 'manufacturer',
            'main_products' => 'Fashion, Apparel, Bags, Accessories',
            'year_established' => 2010,
            'total_employees' => 300,
            'certifications' => 'ISO 9001, BSCI, SEDEX',
            'is_verified' => true,
            'verification_level' => 'gold',
            'contact_person' => 'Ms. Lisa Wang',
            'phone' => '+86 20 8765 4321',
            'email' => 'export@fashionhub.com',
            'website' => 'https://fashionhub-tex.com',
            'response_rate' => 96.2,
            'transactions_count' => 890,
            'is_active' => true,
            'sort_order' => 2,
        ]);

        Manufacturer::create([
            'name' => 'Ningbo HomeStyle Manufacturing',
            'slug' => 'ningbo-homestyle-manufacturing',
            'description' => 'Professional home goods and furniture manufacturer. Producing kitchenware, home decor, and small appliances.',
            'country' => 'China',
            'city' => 'Ningbo',
            'business_type' => 'manufacturer',
            'main_products' => 'Home Goods, Kitchenware, Small Appliances',
            'year_established' => 2005,
            'total_employees' => 200,
            'certifications' => 'ISO 9001, CE, GS',
            'is_verified' => true,
            'verification_level' => 'silver',
            'contact_person' => 'Mr. Zhang Wei',
            'phone' => '+86 574 8888 9999',
            'email' => 'info@homestyle-nb.com',
            'website' => 'https://homestyle-nb.com',
            'response_rate' => 94.8,
            'transactions_count' => 650,
            'is_active' => true,
            'sort_order' => 3,
        ]);

        Manufacturer::create([
            'name' => 'Dongguan AutoParts Industrial Co.',
            'slug' => 'dongguan-autoparts-industrial',
            'description' => 'Specialized in automotive parts and accessories manufacturing. Supplying quality components to global markets.',
            'country' => 'China',
            'city' => 'Dongguan',
            'business_type' => 'manufacturer',
            'main_products' => 'Auto Parts, Accessories, Tools',
            'year_established' => 2012,
            'total_employees' => 150,
            'certifications' => 'ISO 9001, IATF 16949',
            'is_verified' => true,
            'verification_level' => 'silver',
            'contact_person' => 'Mr. Liu Ming',
            'phone' => '+86 769 2222 3333',
            'email' => 'sales@dg-autoparts.com',
            'website' => 'https://dg-autoparts.com',
            'response_rate' => 92.5,
            'transactions_count' => 420,
            'is_active' => true,
            'sort_order' => 4,
        ]);

        Manufacturer::create([
            'name' => 'Shanghai BeautyCare Cosmetics',
            'slug' => 'shanghai-beautycare-cosmetics',
            'description' => 'Beauty and personal care products manufacturer. Producing skincare, haircare, and cosmetics with GMP certification.',
            'country' => 'China',
            'city' => 'Shanghai',
            'business_type' => 'manufacturer',
            'main_products' => 'Beauty Products, Skincare, Cosmetics',
            'year_established' => 2015,
            'total_employees' => 120,
            'certifications' => 'GMP, ISO 22716, FDA',
            'is_verified' => true,
            'verification_level' => 'bronze',
            'contact_person' => 'Ms. Emma Li',
            'phone' => '+86 21 6666 7777',
            'email' => 'export@beautycare-sh.com',
            'website' => 'https://beautycare-sh.com',
            'response_rate' => 89.3,
            'transactions_count' => 280,
            'is_active' => true,
            'sort_order' => 5,
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

        // Call Role Seeder
        $this->call(RoleSeeder::class);

        // Call Category Mega Menu Seeder
        $this->call(CategoryMegaMenuSeeder::class);

        // Call Product Real Images Seeder
        $this->call(ProductRealImagesSeeder::class);
    }
}
