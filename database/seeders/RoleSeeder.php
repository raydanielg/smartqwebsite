<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Create Roles with icons and colors
        $roles = [
            [
                'name' => 'superadmin',
                'display_name' => 'Super Administrator',
                'description' => 'Full system access. Can manage everything including other admins.',
                'color' => '#DC2626', // Red
                'icon' => 'fas fa-crown',
                'level' => 100,
            ],
            [
                'name' => 'admin',
                'display_name' => 'Administrator',
                'description' => 'Manage users, products, orders, and site content.',
                'color' => '#7C3AED', // Purple
                'icon' => 'fas fa-user-shield',
                'level' => 80,
            ],
            [
                'name' => 'seller',
                'display_name' => 'Seller',
                'description' => 'Can list and sell products on the marketplace.',
                'color' => '#059669', // Green
                'icon' => 'fas fa-store',
                'level' => 60,
            ],
            [
                'name' => 'manufacturer',
                'display_name' => 'Manufacturer',
                'description' => 'Verified manufacturer with special features and bulk pricing.',
                'color' => '#2563EB', // Blue
                'icon' => 'fas fa-industry',
                'level' => 70,
            ],
            [
                'name' => 'buyer',
                'display_name' => 'Buyer',
                'description' => 'Standard user who can purchase products.',
                'color' => '#6B7280', // Gray
                'icon' => 'fas fa-shopping-bag',
                'level' => 10,
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }

        // Create Common Permissions
        $permissions = [
            // User Management
            ['name' => 'users.view', 'display_name' => 'View Users', 'group' => 'users'],
            ['name' => 'users.create', 'display_name' => 'Create Users', 'group' => 'users'],
            ['name' => 'users.edit', 'display_name' => 'Edit Users', 'group' => 'users'],
            ['name' => 'users.delete', 'display_name' => 'Delete Users', 'group' => 'users'],
            
            // Product Management
            ['name' => 'products.view', 'display_name' => 'View Products', 'group' => 'products'],
            ['name' => 'products.create', 'display_name' => 'Create Products', 'group' => 'products'],
            ['name' => 'products.edit', 'display_name' => 'Edit Products', 'group' => 'products'],
            ['name' => 'products.delete', 'display_name' => 'Delete Products', 'group' => 'products'],
            
            // Order Management
            ['name' => 'orders.view', 'display_name' => 'View Orders', 'group' => 'orders'],
            ['name' => 'orders.manage', 'display_name' => 'Manage Orders', 'group' => 'orders'],
            
            // Categories
            ['name' => 'categories.manage', 'display_name' => 'Manage Categories', 'group' => 'categories'],
            
            // Manufacturers
            ['name' => 'manufacturers.manage', 'display_name' => 'Manage Manufacturers', 'group' => 'manufacturers'],
            ['name' => 'manufacturers.verify', 'display_name' => 'Verify Manufacturers', 'group' => 'manufacturers'],
            
            // Reports
            ['name' => 'reports.view', 'display_name' => 'View Reports', 'group' => 'reports'],
            
            // Settings
            ['name' => 'settings.manage', 'display_name' => 'Manage Settings', 'group' => 'settings'],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

        // Assign permissions to roles
        $superadmin = Role::where('name', 'superadmin')->first();
        $admin = Role::where('name', 'admin')->first();
        $seller = Role::where('name', 'seller')->first();
        $manufacturer = Role::where('name', 'manufacturer')->first();

        // Superadmin gets all permissions
        $superadmin->permissions()->sync(Permission::all()->pluck('id'));

        // Admin gets most permissions (except some critical ones)
        $admin->permissions()->sync(Permission::whereNotIn('name', [
            'settings.manage',
            'manufacturers.verify',
        ])->pluck('id'));

        // Seller permissions
        $seller->permissions()->sync(Permission::whereIn('name', [
            'products.view',
            'products.create',
            'products.edit',
            'products.delete',
            'orders.view',
            'orders.manage',
        ])->pluck('id'));

        // Manufacturer permissions
        $manufacturer->permissions()->sync(Permission::whereIn('name', [
            'products.view',
            'products.create',
            'products.edit',
            'orders.view',
        ])->pluck('id'));

        // Create sample admin user
        $adminUser = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@smartqstore.com',
            'password' => Hash::make('admin123'),
        ]);
        $adminUser->assignRole('superadmin');

        // Create sample seller
        $sellerUser = User::create([
            'name' => 'Demo Seller',
            'email' => 'seller@smartqstore.com',
            'password' => Hash::make('seller123'),
        ]);
        $sellerUser->assignRole('seller');

        // Create sample manufacturer
        $manufacturerUser = User::create([
            'name' => 'Demo Manufacturer',
            'email' => 'manufacturer@smartqstore.com',
            'password' => Hash::make('factory123'),
        ]);
        $manufacturerUser->assignRole('manufacturer');

        // Assign buyer role to existing admin user
        $existingAdmin = User::where('email', 'admin@smartqstore.com')->first();
        if ($existingAdmin) {
            $existingAdmin->assignRole('admin');
        }
    }
}
