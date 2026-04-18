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

    // Users Management
    public function users()
    {
        $users = User::with('roles')->paginate(20);
        $roles = Role::all();
        return view('admin.users', compact('users', 'roles'));
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

    // Products Management
    public function products()
    {
        $products = Product::with('category')->paginate(20);
        $categories = Category::all();
        return view('admin.products', compact('products', 'categories'));
    }

    // Manufacturers Management
    public function manufacturers()
    {
        $manufacturers = Manufacturer::paginate(20);
        return view('admin.manufacturers', compact('manufacturers'));
    }

    // Verify Manufacturer
    public function verifyManufacturer($id)
    {
        $manufacturer = Manufacturer::findOrFail($id);
        $manufacturer->update([
            'is_verified' => true,
            'verification_level' => 'gold',
        ]);

        return redirect()->back()->with('success', 'Manufacturer verified successfully!');
    }

    // Settings
    public function settings()
    {
        return view('admin.settings');
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
        
        // Update settings in database or config
        // Logic to save settings here
        
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

