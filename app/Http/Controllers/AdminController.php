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

        // Chart data - Last 14 days
        $chartLabels = [];
        $chartData = [];
        for ($i = 13; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $chartLabels[] = now()->subDays($i)->format('M d');
            $chartData[] = Order::whereDate('created_at', $date)->sum('grand_total') ?? 0;
        }

        $recentUsers = User::latest()->take(5)->get();
        $recentOrders = Order::with('user')->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentUsers', 'recentOrders', 'chartLabels', 'chartData'));
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
        // Update site settings logic here
        return redirect()->back()->with('success', 'Settings updated!');
    }
}

