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

        // Sample images array for categories
        $sampleImages = [
            '/images/samples/H02168b1b1daa4968baaecd90884071e74.jpg',
            '/images/samples/H052cccea2c29460ebabfd23bc16bf3abd.jpg',
            '/images/samples/H3f05ccb909ee4648b9e8389e3bfba1c6S.jpg',
            '/images/samples/H40bdc1f090f24847be56d531f686836cL.jpg',
            '/images/samples/H460b614033394b0e86b48ad3e250c974S.jpg',
            '/images/samples/Ha2f8d1f629634d43b3477b35ff9daca1U.jpg',
            '/images/samples/H4df39b980b484bdbb6573a3de3dfed08r.jpg',
            '/images/samples/H5d078e8ae06b457f9c41e73ec0eb69ba0.jpg',
            '/images/samples/H61878cba3a314d5d8f1b5b5f33de4697b.jpg',
            '/images/samples/H6fbde8318bab4462aa44e3220a920c292.jpg',
            '/images/samples/H86f28195a2254257b9d5a17067130646Z.jpg',
            '/images/samples/H9b3243b35aae468eb6d8c7923bea31e5Q.jpg',
            '/images/samples/H608dcb62f3474e3a911a6db4710ca7f9G.jpg',
            '/images/samples/Hb988d4c8cee547f2bc614ebdea8ebc16k.jpg',
            '/images/samples/Hc8d21612ea5f442a8207a772f358be71o.jpg',
            '/images/samples/Ha37bb822a2cd41d69d759aa842531070w.jpg',
        ];

        // Child Categories for Apparel & Accessories
        $apparelChildren = [
            ['name' => 'Wedding Dresses', 'slug' => 'wedding-dresses', 'menu_image' => '/images/samples/H3f05ccb909ee4648b9e8389e3bfba1c6S.jpg', 'sort_order' => 1],
            ['name' => 'Evening Dresses', 'slug' => 'evening-dresses', 'menu_image' => '/images/samples/H40bdc1f090f24847be56d531f686836cL.jpg', 'sort_order' => 2],
            ['name' => 'Bridesmaid Dresses', 'slug' => 'bridesmaid-dresses', 'menu_image' => '/images/samples/H460b614033394b0e86b48ad3e250c974S.jpg', 'sort_order' => 3],
            ['name' => 'Casual Dresses', 'slug' => 'casual-dresses', 'menu_image' => '/images/samples/Ha2f8d1f629634d43b3477b35ff9daca1U.jpg', 'sort_order' => 4],
            ['name' => 'Men\'s Shirts', 'slug' => 'mens-shirts', 'menu_image' => '/images/samples/H4df39b980b484bdbb6573a3de3dfed08r.jpg', 'sort_order' => 5],
            ['name' => 'Sportswear', 'slug' => 'sportswear', 'menu_image' => '/images/samples/H9b3243b35aae468eb6d8c7923bea31e5Q.jpg', 'sort_order' => 6],
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
            ['name' => 'Smartphones', 'slug' => 'smartphones', 'menu_image' => '/images/samples/H02168b1b1daa4968baaecd90884071e74.jpg', 'sort_order' => 1],
            ['name' => 'Laptops', 'slug' => 'laptops', 'menu_image' => '/images/samples/H052cccea2c29460ebabfd23bc16bf3abd.jpg', 'sort_order' => 2],
            ['name' => 'Smart Watches', 'slug' => 'smart-watches', 'menu_image' => '/images/samples/H61878cba3a314d5d8f1b5b5f33de4697b.jpg', 'sort_order' => 3],
            ['name' => 'Cameras', 'slug' => 'cameras', 'menu_image' => '/images/samples/H608dcb62f3474e3a911a6db4710ca7f9G.jpg', 'sort_order' => 4],
            ['name' => 'Headphones', 'slug' => 'headphones', 'menu_image' => '/images/samples/H275df7ef27b64f48be20a18069d15d74o.jpg', 'sort_order' => 5],
            ['name' => 'Drones', 'slug' => 'drones', 'menu_image' => '/images/samples/Ha37bb822a2cd41d69d759aa842531070w.jpg', 'sort_order' => 6],
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
            ['name' => 'Electric Cars', 'slug' => 'electric-cars', 'menu_image' => '/images/samples/H161f43fc1e47447f93b08c1f0463a1476.jpg', 'sort_order' => 1],
            ['name' => 'Electric Vans', 'slug' => 'electric-vans', 'menu_image' => '/images/samples/H21cb8b0f4de44774918fb90ab81dbd040.jpg', 'sort_order' => 2],
            ['name' => 'Electric Trucks', 'slug' => 'electric-trucks', 'menu_image' => '/images/samples/H86f28195a2254257b9d5a17067130646Z.jpg', 'sort_order' => 3],
            ['name' => 'Electric Scooters', 'slug' => 'electric-scooters', 'menu_image' => '/images/samples/H0a6003891a1646458251eb8c4dfbfdcd5.jpg', 'sort_order' => 4],
            ['name' => 'Electric Motorcycles', 'slug' => 'electric-motorcycles', 'menu_image' => '/images/samples/H37349e7735694dc3b8c0bec68ebe5fd3I.jpg', 'sort_order' => 5],
            ['name' => 'Car Accessories', 'slug' => 'car-accessories', 'menu_image' => '/images/samples/Hb54c59a50b8b4e5d8c10336d2a04faccw.jpg', 'sort_order' => 6],
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
            ['name' => 'Furniture', 'slug' => 'furniture', 'menu_image' => '/images/samples/H6fbde8318bab4462aa44e3220a920c292.jpg', 'sort_order' => 1],
            ['name' => 'Kitchen', 'slug' => 'kitchen', 'menu_image' => '/images/samples/H86f28195a2254257b9d5a17067130646Z.jpg', 'sort_order' => 2],
            ['name' => 'Home Decor', 'slug' => 'home-decor', 'menu_image' => '/images/samples/Hb988d4c8cee547f2bc614ebdea8ebc16k.jpg', 'sort_order' => 3],
            ['name' => 'Lighting', 'slug' => 'lighting', 'menu_image' => '/images/samples/Hc8d21612ea5f442a8207a772f358be71o.jpg', 'sort_order' => 4],
            ['name' => 'Garden Supplies', 'slug' => 'garden-supplies', 'menu_image' => '/images/samples/H8e3a2028d0284d519b815caa66ee8813r.jpg', 'sort_order' => 5],
            ['name' => 'Solar Panels', 'slug' => 'solar-panels', 'menu_image' => '/images/samples/Hd237bc4dc96e4d2fa1a47dcd0a61b4d1T.jpg', 'sort_order' => 6],
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
            ['name' => 'Handbags', 'slug' => 'handbags', 'menu_image' => '/images/samples/H5d078e8ae06b457f9c41e73ec0eb69ba0.jpg', 'sort_order' => 1],
            ['name' => 'Backpacks', 'slug' => 'backpacks', 'menu_image' => '/images/samples/He57a6e155d0b49868aacfc05c52a7d29U.jpg', 'sort_order' => 2],
            ['name' => 'Travel Bags', 'slug' => 'travel-bags', 'menu_image' => '/images/samples/Hf49b5d5456714977b8df92ffaa2e379fW.jpg', 'sort_order' => 3],
            ['name' => 'Wallets', 'slug' => 'wallets', 'menu_image' => '/images/samples/Hf4de7f4419a34fc38321bf38bc126cd6R.jpg', 'sort_order' => 4],
            ['name' => 'Cosmetic Bags', 'slug' => 'cosmetic-bags', 'menu_image' => '/images/samples/Hb54c59a50b8b4e5d8c10336d2a04faccw.jpg', 'sort_order' => 5],
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
            ['name' => 'Skincare', 'slug' => 'skincare', 'menu_image' => '/images/samples/H8b6e067bb8574726b4bd6806385e35f9k.png', 'sort_order' => 1],
            ['name' => 'Makeup', 'slug' => 'makeup', 'menu_image' => '/images/samples/H8baa69a03d9c46e68b01c8d481044eb6f.png', 'sort_order' => 2],
            ['name' => 'Hair Care', 'slug' => 'hair-care', 'menu_image' => '/images/samples/H8e3a2028d0284d519b815caa66ee8813r.jpg', 'sort_order' => 3],
            ['name' => 'Fragrances', 'slug' => 'fragrances', 'menu_image' => '/images/samples/Hc8d21612ea5f442a8207a772f358be71o.jpg', 'sort_order' => 4],
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
            ['name' => 'Fitness', 'slug' => 'fitness', 'menu_image' => '/images/samples/H9b3243b35aae468eb6d8c7923bea31e5Q.jpg', 'sort_order' => 1],
            ['name' => 'Cycling', 'slug' => 'cycling', 'menu_image' => '/images/samples/Hd4ce009d6da04e8db5d0e123ada1d149f.jpg', 'sort_order' => 2],
            ['name' => 'Camping', 'slug' => 'camping', 'menu_image' => '/images/samples/H8e3a2028d0284d519b815caa66ee8813r.jpg', 'sort_order' => 3],
            ['name' => 'Toys & Games', 'slug' => 'toys-games', 'menu_image' => '/images/samples/Ha37bb822a2cd41d69d759aa842531070w.jpg', 'sort_order' => 4],
            ['name' => 'Hoodies', 'slug' => 'hoodies', 'menu_image' => '/images/samples/H4b9a913540e847a3b4ae512489c54950e.jpg', 'sort_order' => 5],
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
            ['name' => 'Rings', 'slug' => 'rings', 'menu_image' => '/images/samples/H608dcb62f3474e3a911a6db4710ca7f9G.jpg', 'sort_order' => 1],
            ['name' => 'Necklaces', 'slug' => 'necklaces', 'menu_image' => '/images/samples/Hc8d21612ea5f442a8207a772f358be71o.jpg', 'sort_order' => 2],
            ['name' => 'Earrings', 'slug' => 'earrings', 'menu_image' => '/images/samples/Hb988d4c8cee547f2bc614ebdea8ebc16k.jpg', 'sort_order' => 3],
            ['name' => 'Watches', 'slug' => 'watches', 'menu_image' => '/images/samples/H61878cba3a314d5d8f1b5b5f33de4697b.jpg', 'sort_order' => 4],
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
