<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryMegaMenuSeeder extends Seeder
{
    public function run()
    {
        // Clear existing categories
        Category::whereNotNull('id')->delete();

        // Parent Categories with icons
        $parentCategories = [
            [
                'name' => 'Apparel & Accessories',
                'slug' => 'apparel-accessories',
                'icon' => 'fas fa-tshirt',
                'description' => 'Clothing, shoes, bags, and fashion accessories',
                'sort_order' => 1,
            ],
            [
                'name' => 'Consumer Electronics',
                'slug' => 'consumer-electronics',
                'icon' => 'fas fa-mobile-alt',
                'description' => 'Phones, computers, audio, and electronic devices',
                'sort_order' => 2,
            ],
            [
                'name' => 'Sports & Entertainment',
                'slug' => 'sports-entertainment',
                'icon' => 'fas fa-futbol',
                'description' => 'Sports equipment, toys, and entertainment products',
                'sort_order' => 3,
            ],
            [
                'name' => 'Beauty & Personal Care',
                'slug' => 'beauty-personal-care',
                'icon' => 'fas fa-spa',
                'description' => 'Cosmetics, skincare, and personal care products',
                'sort_order' => 4,
            ],
            [
                'name' => 'Luggage, Bags & Cases',
                'slug' => 'luggage-bags-cases',
                'icon' => 'fas fa-suitcase',
                'description' => 'Travel bags, handbags, and storage cases',
                'sort_order' => 5,
            ],
            [
                'name' => 'Home & Garden',
                'slug' => 'home-garden',
                'icon' => 'fas fa-home',
                'description' => 'Furniture, decor, kitchen, and garden supplies',
                'sort_order' => 6,
            ],
            [
                'name' => 'Automobiles & Motorcycles',
                'slug' => 'automobiles-motorcycles',
                'icon' => 'fas fa-car',
                'description' => 'Cars, motorcycles, parts, and accessories',
                'sort_order' => 7,
            ],
            [
                'name' => 'Machinery & Industrial',
                'slug' => 'machinery-industrial',
                'icon' => 'fas fa-industry',
                'description' => 'Industrial equipment, tools, and machinery',
                'sort_order' => 8,
            ],
            [
                'name' => 'Packaging & Printing',
                'slug' => 'packaging-printing',
                'icon' => 'fas fa-box-open',
                'description' => 'Packaging materials, labels, and printing services',
                'sort_order' => 9,
            ],
            [
                'name' => 'Jewelry & Watches',
                'slug' => 'jewelry-watches',
                'icon' => 'fas fa-gem',
                'description' => 'Fine jewelry, watches, and accessories',
                'sort_order' => 10,
            ],
        ];

        $createdParents = [];
        foreach ($parentCategories as $cat) {
            $createdParents[$cat['slug']] = Category::create($cat + [
                'image' => null,
                'menu_image' => null,
                'is_active' => true,
                'show_in_menu' => true,
            ]);
        }

        // Child Categories for Apparel & Accessories
        $apparelChildren = [
            ['name' => 'Wedding Dresses', 'slug' => 'wedding-dresses', 'menu_image' => 'https://via.placeholder.com/150x150/FFB6C1/FFFFFF?text=Wedding', 'sort_order' => 1],
            ['name' => 'Evening Dresses', 'slug' => 'evening-dresses', 'menu_image' => 'https://via.placeholder.com/150x150/DDA0DD/FFFFFF?text=Evening', 'sort_order' => 2],
            ['name' => 'Bridesmaid Dresses', 'slug' => 'bridesmaid-dresses', 'menu_image' => 'https://via.placeholder.com/150x150/FFC0CB/FFFFFF?text=Bridesmaid', 'sort_order' => 3],
            ['name' => 'Casual Dresses', 'slug' => 'casual-dresses', 'menu_image' => 'https://via.placeholder.com/150x150/87CEEB/FFFFFF?text=Casual', 'sort_order' => 4],
            ['name' => 'Men\'s Shirts', 'slug' => 'mens-shirts', 'menu_image' => 'https://via.placeholder.com/150x150/B0C4DE/FFFFFF?text=Shirts', 'sort_order' => 5],
            ['name' => 'Sportswear', 'slug' => 'sportswear', 'menu_image' => 'https://via.placeholder.com/150x150/98FB98/FFFFFF?text=Sportswear', 'sort_order' => 6],
        ];

        foreach ($apparelChildren as $child) {
            Category::create($child + [
                'parent_id' => $createdParents['apparel-accessories']->id,
                'icon' => 'fas fa-circle',
                'description' => $child['name'],
                'image' => null,
                'is_active' => true,
                'show_in_menu' => true,
            ]);
        }

        // Child Categories for Consumer Electronics
        $electronicsChildren = [
            ['name' => 'Smartphones', 'slug' => 'smartphones', 'menu_image' => 'https://via.placeholder.com/150x150/000000/FFFFFF?text=Phones', 'sort_order' => 1],
            ['name' => 'Laptops', 'slug' => 'laptops', 'menu_image' => 'https://via.placeholder.com/150x150/4169E1/FFFFFF?text=Laptops', 'sort_order' => 2],
            ['name' => 'Smart Watches', 'slug' => 'smart-watches', 'menu_image' => 'https://via.placeholder.com/150x150/2F4F4F/FFFFFF?text=Watches', 'sort_order' => 3],
            ['name' => 'Cameras', 'slug' => 'cameras', 'menu_image' => 'https://via.placeholder.com/150x150/696969/FFFFFF?text=Cameras', 'sort_order' => 4],
            ['name' => 'Headphones', 'slug' => 'headphones', 'menu_image' => 'https://via.placeholder.com/150x150/9370DB/FFFFFF?text=Audio', 'sort_order' => 5],
            ['name' => 'Drones', 'slug' => 'drones', 'menu_image' => 'https://via.placeholder.com/150x150/1E90FF/FFFFFF?text=Drones', 'sort_order' => 6],
        ];

        foreach ($electronicsChildren as $child) {
            Category::create($child + [
                'parent_id' => $createdParents['consumer-electronics']->id,
                'icon' => 'fas fa-circle',
                'description' => $child['name'],
                'image' => null,
                'is_active' => true,
                'show_in_menu' => true,
            ]);
        }

        // Child Categories for Automobiles
        $autoChildren = [
            ['name' => 'Electric Cars', 'slug' => 'electric-cars', 'menu_image' => 'https://via.placeholder.com/150x150/00CED1/FFFFFF?text=E-Cars', 'sort_order' => 1],
            ['name' => 'Electric Vans', 'slug' => 'electric-vans', 'menu_image' => 'https://via.placeholder.com/150x150/5F9EA0/FFFFFF?text=E-Vans', 'sort_order' => 2],
            ['name' => 'Electric Trucks', 'slug' => 'electric-trucks', 'menu_image' => 'https://via.placeholder.com/150x150/4682B4/FFFFFF?text=E-Trucks', 'sort_order' => 3],
            ['name' => 'Electric Scooters', 'slug' => 'electric-scooters', 'menu_image' => 'https://via.placeholder.com/150x150/6495ED/FFFFFF?text=Scooters', 'sort_order' => 4],
            ['name' => 'Electric Motorcycles', 'slug' => 'electric-motorcycles', 'menu_image' => 'https://via.placeholder.com/150x150/00BFFF/FFFFFF?text=E-Bikes', 'sort_order' => 5],
            ['name' => 'Car Accessories', 'slug' => 'car-accessories', 'menu_image' => 'https://via.placeholder.com/150x150/87CEFA/FFFFFF?text=Accessories', 'sort_order' => 6],
        ];

        foreach ($autoChildren as $child) {
            Category::create($child + [
                'parent_id' => $createdParents['automobiles-motorcycles']->id,
                'icon' => 'fas fa-circle',
                'description' => $child['name'],
                'image' => null,
                'is_active' => true,
                'show_in_menu' => true,
            ]);
        }

        // Child Categories for Home & Garden
        $homeChildren = [
            ['name' => 'Furniture', 'slug' => 'furniture', 'menu_image' => 'https://via.placeholder.com/150x150/D2691E/FFFFFF?text=Furniture', 'sort_order' => 1],
            ['name' => 'Kitchen', 'slug' => 'kitchen', 'menu_image' => 'https://via.placeholder.com/150x150/CD853F/FFFFFF?text=Kitchen', 'sort_order' => 2],
            ['name' => 'Home Decor', 'slug' => 'home-decor', 'menu_image' => 'https://via.placeholder.com/150x150/BC8F8F/FFFFFF?text=Decor', 'sort_order' => 3],
            ['name' => 'Lighting', 'slug' => 'lighting', 'menu_image' => 'https://via.placeholder.com/150x150/F4A460/FFFFFF?text=Lighting', 'sort_order' => 4],
            ['name' => 'Garden Supplies', 'slug' => 'garden-supplies', 'menu_image' => 'https://via.placeholder.com/150x150/228B22/FFFFFF?text=Garden', 'sort_order' => 5],
            ['name' => 'Solar Panels', 'slug' => 'solar-panels', 'menu_image' => 'https://via.placeholder.com/150x150/32CD32/FFFFFF?text=Solar', 'sort_order' => 6],
        ];

        foreach ($homeChildren as $child) {
            Category::create($child + [
                'parent_id' => $createdParents['home-garden']->id,
                'icon' => 'fas fa-circle',
                'description' => $child['name'],
                'image' => null,
                'is_active' => true,
                'show_in_menu' => true,
            ]);
        }

        // Child Categories for Luggage & Bags
        $bagChildren = [
            ['name' => 'Handbags', 'slug' => 'handbags', 'menu_image' => 'https://via.placeholder.com/150x150/8B4513/FFFFFF?text=Handbags', 'sort_order' => 1],
            ['name' => 'Backpacks', 'slug' => 'backpacks', 'menu_image' => 'https://via.placeholder.com/150x150/A0522D/FFFFFF?text=Backpacks', 'sort_order' => 2],
            ['name' => 'Travel Bags', 'slug' => 'travel-bags', 'menu_image' => 'https://via.placeholder.com/150x150/8B4513/FFFFFF?text=Travel', 'sort_order' => 3],
            ['name' => 'Wallets', 'slug' => 'wallets', 'menu_image' => 'https://via.placeholder.com/150x150/D2691E/FFFFFF?text=Wallets', 'sort_order' => 4],
            ['name' => 'Cosmetic Bags', 'slug' => 'cosmetic-bags', 'menu_image' => 'https://via.placeholder.com/150x150/FF69B4/FFFFFF?text=Cosmetic', 'sort_order' => 5],
        ];

        foreach ($bagChildren as $child) {
            Category::create($child + [
                'parent_id' => $createdParents['luggage-bags-cases']->id,
                'icon' => 'fas fa-circle',
                'description' => $child['name'],
                'image' => null,
                'is_active' => true,
                'show_in_menu' => true,
            ]);
        }

        // Child Categories for Beauty
        $beautyChildren = [
            ['name' => 'Skincare', 'slug' => 'skincare', 'menu_image' => 'https://via.placeholder.com/150x150/FFB6C1/FFFFFF?text=Skincare', 'sort_order' => 1],
            ['name' => 'Makeup', 'slug' => 'makeup', 'menu_image' => 'https://via.placeholder.com/150x150/FF1493/FFFFFF?text=Makeup', 'sort_order' => 2],
            ['name' => 'Hair Care', 'slug' => 'hair-care', 'menu_image' => 'https://via.placeholder.com/150x150/DB7093/FFFFFF?text=Hair', 'sort_order' => 3],
            ['name' => 'Fragrances', 'slug' => 'fragrances', 'menu_image' => 'https://via.placeholder.com/150x150/C71585/FFFFFF?text=Perfume', 'sort_order' => 4],
        ];

        foreach ($beautyChildren as $child) {
            Category::create($child + [
                'parent_id' => $createdParents['beauty-personal-care']->id,
                'icon' => 'fas fa-circle',
                'description' => $child['name'],
                'image' => null,
                'is_active' => true,
                'show_in_menu' => true,
            ]);
        }

        // Child Categories for Sports
        $sportsChildren = [
            ['name' => 'Fitness', 'slug' => 'fitness', 'menu_image' => 'https://via.placeholder.com/150x150/32CD32/FFFFFF?text=Fitness', 'sort_order' => 1],
            ['name' => 'Cycling', 'slug' => 'cycling', 'menu_image' => 'https://via.placeholder.com/150x150/228B22/FFFFFF?text=Cycling', 'sort_order' => 2],
            ['name' => 'Camping', 'slug' => 'camping', 'menu_image' => 'https://via.placeholder.com/150x150/006400/FFFFFF?text=Camping', 'sort_order' => 3],
            ['name' => 'Toys & Games', 'slug' => 'toys-games', 'menu_image' => 'https://via.placeholder.com/150x150/FFD700/FFFFFF?text=Toys', 'sort_order' => 4],
            ['name' => 'Hoodies', 'slug' => 'hoodies', 'menu_image' => 'https://via.placeholder.com/150x150/708090/FFFFFF?text=Hoodies', 'sort_order' => 5],
        ];

        foreach ($sportsChildren as $child) {
            Category::create($child + [
                'parent_id' => $createdParents['sports-entertainment']->id,
                'icon' => 'fas fa-circle',
                'description' => $child['name'],
                'image' => null,
                'is_active' => true,
                'show_in_menu' => true,
            ]);
        }

        // Child Categories for Jewelry
        $jewelryChildren = [
            ['name' => 'Rings', 'slug' => 'rings', 'menu_image' => 'https://via.placeholder.com/150x150/FFD700/FFFFFF?text=Rings', 'sort_order' => 1],
            ['name' => 'Necklaces', 'slug' => 'necklaces', 'menu_image' => 'https://via.placeholder.com/150x150/FFA500/FFFFFF?text=Necklaces', 'sort_order' => 2],
            ['name' => 'Earrings', 'slug' => 'earrings', 'menu_image' => 'https://via.placeholder.com/150x150/FF8C00/FFFFFF?text=Earrings', 'sort_order' => 3],
            ['name' => 'Watches', 'slug' => 'watches', 'menu_image' => 'https://via.placeholder.com/150x150/808080/FFFFFF?text=Watches', 'sort_order' => 4],
        ];

        foreach ($jewelryChildren as $child) {
            Category::create($child + [
                'parent_id' => $createdParents['jewelry-watches']->id,
                'icon' => 'fas fa-circle',
                'description' => $child['name'],
                'image' => null,
                'is_active' => true,
                'show_in_menu' => true,
            ]);
        }

        // Child Categories for Packaging
        $packagingChildren = [
            ['name' => 'Gift Boxes', 'slug' => 'gift-boxes', 'menu_image' => 'https://via.placeholder.com/150x150/8B4513/FFFFFF?text=Boxes', 'sort_order' => 1],
            ['name' => 'Bags', 'slug' => 'packaging-bags', 'menu_image' => 'https://via.placeholder.com/150x150/D2691E/FFFFFF?text=Bags', 'sort_order' => 2],
            ['name' => 'Labels', 'slug' => 'labels', 'menu_image' => 'https://via.placeholder.com/150x150/F0E68C/FFFFFF?text=Labels', 'sort_order' => 3],
            ['name' => 'Printing', 'slug' => 'printing', 'menu_image' => 'https://via.placeholder.com/150x150/FFFACD/FFFFFF?text=Printing', 'sort_order' => 4],
        ];

        foreach ($packagingChildren as $child) {
            Category::create($child + [
                'parent_id' => $createdParents['packaging-printing']->id,
                'icon' => 'fas fa-circle',
                'description' => $child['name'],
                'image' => null,
                'is_active' => true,
                'show_in_menu' => true,
            ]);
        }
    }
}
