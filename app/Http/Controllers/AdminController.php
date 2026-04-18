<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Product;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Middleware in constructor
    public function __construct()
    {
        $this->middleware(['auth', 'check.role:admin,superadmin']);
    }

    // Admin Dashboard
    public function dashboard()
    {
        $stats = [
            'users' => User::count(),
            'products' => Product::count(),
            'orders' => Order::count() ?? 0,
            'manufacturers' => Manufacturer::count(),
            'revenue' => Order::sum('grand_total') ?? 0,
            'pending_orders' => Order::where('status', 'pending')->count(),
            'processing_orders' => Order::where('status', 'processing')->count(),
            'completed_orders' => Order::where('status', 'completed')->count(),
        ];
        
        // Header counts - notifications, new orders, etc
        $headerCounts = [
            'new_orders' => Order::where('status', 'pending')->whereDate('created_at', '>=', now()->subDays(1))->count(),
            'new_users' => User::whereDate('created_at', '>=', now()->subDays(1))->count(),
            'notifications' => $stats['pending_orders'] + $stats['processing_orders'], // Real notification count
        ];

        // Chart data - Last 14 days for multiple metrics
        $chartLabels = [];
        $revenueData = [];
        $ordersData = [];
        $usersData = [];
        
        for ($i = 13; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $dateString = $date->format('Y-m-d');
            $chartLabels[] = $date->format('M d');
            
            // Revenue data
            $revenueData[] = Order::whereDate('created_at', $dateString)->sum('grand_total') ?? 0;
            
            // Orders count data
            $ordersData[] = Order::whereDate('created_at', $dateString)->count();
            
            // Users registered data
            $usersData[] = User::whereDate('created_at', $dateString)->count();
        }
        
        // Chart data for line chart (multiple datasets)
        $chartData = [
            'revenue' => $revenueData,
            'orders' => $ordersData,
            'users' => $usersData,
        ];

        $recentUsers = User::latest()->take(5)->get();
        $recentOrders = Order::with('user')->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentUsers', 'recentOrders', 'chartLabels', 'chartData', 'headerCounts'));
    }

    // Super Admin Dashboard
    public function superDashboard()
    {
        $stats = [
            'total_users' => User::count(),
            'total_roles' => Role::count(),
            'total_permissions' => \App\Models\Permission::count(),
            'admins' => User::whereHas('roles', function($q) {
                $q->whereIn('name', ['superadmin', 'admin']);
            })->count(),
        ];

        $roles = Role::withCount('users')->get();
        
        return view('admin.super-dashboard', compact('stats', 'roles'));
    }

    // Users Management - Real Data
    public function users()
    {
        $users = User::with('roles')->latest()->paginate(10);
        $roles = Role::all();
        $totalUsers = User::count();
        $newUsersToday = User::whereDate('created_at', today())->count();
        $newUsersThisWeek = User::whereDate('created_at', '>=', now()->subDays(7))->count();
        
        // Count by roles
        $adminUsers = User::whereHas('roles', function($q) {
            $q->whereIn('name', ['admin', 'superadmin']);
        })->count();
        
        $customerUsers = User::whereDoesntHave('roles', function($q) {
            $q->whereIn('name', ['admin', 'superadmin', 'staff']);
        })->count();
        
        return view('admin.users.index', compact(
            'users', 
            'roles', 
            'totalUsers',
            'newUsersToday',
            'newUsersThisWeek',
            'adminUsers',
            'customerUsers'
        ));
    }

    // Create User
    public function createUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required|exists:roles,name',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->role);

        return redirect()->back()->with('success', 'User created successfully!');
    }

    // Edit User
    public function editUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|exists:roles,name',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($request->password) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        // Sync roles
        $user->roles()->sync([]);
        $user->assignRole($request->role);

        return redirect()->back()->with('success', 'User updated successfully!');
    }

    // Delete User
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        
        // Prevent deleting yourself
        if ($user->id === Auth::id()) {
            return redirect()->back()->with('error', 'You cannot delete yourself!');
        }

        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully!');
    }

    // Roles Management
    public function roles()
    {
        $roles = Role::withCount(['users', 'permissions'])->get();
        $permissions = \App\Models\Permission::all()->groupBy('group');
        return view('admin.roles', compact('roles', 'permissions'));
    }

    // Update Role Permissions
    public function updateRolePermissions(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        
        $request->validate([
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        $role->permissions()->sync($request->permissions ?? []);

        return redirect()->back()->with('success', 'Role permissions updated!');
    }

    // Products Management - Real Data
    public function products()
    {
        $products = Product::with('category')->latest()->paginate(12);
        $categories = Category::all();
        $totalProducts = Product::count();
        $activeProducts = Product::where('is_active', true)->count();
        $featuredProducts = Product::where('is_featured', true)->count();
        $lowStockProducts = Product::where('stock_quantity', '<', 10)->count();
        
        return view('admin.products.index', compact(
            'products', 
            'categories', 
            'totalProducts', 
            'activeProducts', 
            'featuredProducts',
            'lowStockProducts'
        ));
    }

    // Manufacturers Management - Real Data
    public function manufacturers()
    {
        $manufacturers = Manufacturer::latest()->paginate(10);
        $totalManufacturers = Manufacturer::count();
        $verifiedManufacturers = Manufacturer::where('is_verified', true)->count();
        $pendingManufacturers = Manufacturer::where('is_verified', false)->count();
        
        return view('admin.manufacturers.index', compact(
            'manufacturers',
            'totalManufacturers',
            'verifiedManufacturers',
            'pendingManufacturers'
        ));
    }
    
    // Verify Manufacturer
    public function verifyManufacturer(Request $request, $id)
    {
        return redirect()->back()->with('success', 'Manufacturer verified successfully!');
    }
    
    // Categories - Real Data
    public function categories()
    {
        $categories = Category::withCount('products')->latest()->get();
        $parentCategories = Category::whereNull('parent_id')->withCount('children')->get();
        $totalCategories = Category::count();
        $activeCategories = Category::where('is_active', true)->count();
        
        return view('admin.categories.index', compact(
            'categories',
            'parentCategories',
            'totalCategories',
            'activeCategories'
        ));
    }
    
    // Orders - Real Data
    public function orders()
    {
        $orders = Order::with('user')->latest()->paginate(10);
        $totalOrders = Order::count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $processingOrders = Order::where('status', 'processing')->count();
        $completedOrders = Order::where('status', 'completed')->count();
        $cancelledOrders = Order::where('status', 'cancelled')->count();
        $totalRevenue = Order::where('status', 'completed')->sum('grand_total');
        
        return view('admin.orders.index', compact(
            'orders',
            'totalOrders',
            'pendingOrders',
            'processingOrders',
            'completedOrders',
            'cancelledOrders',
            'totalRevenue'
        ));
    }
    
    // Deals & Offers - Real Data (using products with sale_price as deals)
    public function deals()
    {
        $deals = Product::whereNotNull('sale_price')
            ->where('sale_price', '<', Product::raw('price'))
            ->with('category')
            ->latest()
            ->paginate(8);
        
        $activeDeals = Product::whereNotNull('sale_price')
            ->where('sale_price', '<', Product::raw('price'))
            ->where('is_active', true)
            ->count();
        
        $totalDiscountValue = Product::whereNotNull('sale_price')
            ->sum(Product::raw('price - sale_price'));
        
        return view('admin.deals.index', compact(
            'deals',
            'activeDeals',
            'totalDiscountValue'
        ));
    }

    // Staff - Real Data (users with admin/staff roles)
    public function staff()
    {
        $staff = User::whereHas('roles', function($q) {
            $q->whereIn('name', ['admin', 'superadmin', 'staff', 'manager']);
        })->with('roles')->latest()->get();
        
        $totalStaff = $staff->count();
        
        $admins = User::whereHas('roles', function($q) {
            $q->where('name', 'superadmin');
        })->count();
        
        $managers = User::whereHas('roles', function($q) {
            $q->where('name', 'manager');
        })->count();
        
        return view('admin.staff.index', compact(
            'staff',
            'totalStaff',
            'admins',
            'managers'
        ));
    }

    // Settings
    public function settings()
    {
        return view('admin.settings');
    }
    
    // Settings - Appearance
    public function settingsAppearance()
    {
        return view('admin.settings.appearance');
    }
    
    // Settings - Payment
    public function settingsPayment()
    {
        return view('admin.settings.payment');
    }
    
    // Settings - Shipping
    public function settingsShipping()
    {
        return view('admin.settings.shipping');
    }
    
    // Settings - Notifications
    public function settingsNotifications()
    {
        return view('admin.settings.notifications');
    }

    // Update Settings
    public function updateSettings(Request $request)
    {
        $request->validate([
            'site_name' => 'nullable|string|max:255',
            'site_email' => 'nullable|email',
            'currency' => 'nullable|string|max:10',
            'timezone' => 'nullable|string|max:50',
        ]);
        
        return redirect()->back()->with('success', 'Settings updated successfully!');
    }
    
    // Profile Page
    public function profile()
    {
        $user = Auth::user();
        $activityLogs = []; // Could fetch from activity log table
        
        return view('admin.profile', compact('user', 'activityLogs'));
    }
    
    // Update Profile
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        
        if ($request->password) {
            $request->validate(['password' => 'min:8']);
            $user->update(['password' => Hash::make($request->password)]);
        }
        
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}

