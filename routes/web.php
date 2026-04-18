<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\BuyerCentralController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SitemapController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Sitemap
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

// Landing Page
Route::get('/', [LandingController::class, 'index'])->name('landing');

// Shop Routes
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/shop/category/{slug}', [ShopController::class, 'category'])->name('shop.category');
Route::get('/shop/product/{slug}', [ShopController::class, 'show'])->name('shop.product');

// Cart Routes
Route::get('/cart', [ShopController::class, 'cart'])->name('cart');
Route::get('/cart/count', [ShopController::class, 'cartCount'])->name('cart.count');
Route::post('/cart/add', [ShopController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update', [ShopController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/remove', [ShopController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/clear', [ShopController::class, 'clearCart'])->name('cart.clear');

// Checkout Routes
Route::get('/checkout', [ShopController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [ShopController::class, 'processCheckout'])->name('checkout.process');

// Manufacturers
Route::get('/manufacturers', [ManufacturerController::class, 'index'])->name('manufacturers');
Route::get('/manufacturers/{slug}', [ManufacturerController::class, 'show'])->name('manufacturers.show');

// Buyer Central Pages
Route::get('/buyer-central', [BuyerCentralController::class, 'index'])->name('buyer-central');
Route::get('/order-protection', [BuyerCentralController::class, 'orderProtection'])->name('order.protection');
Route::get('/tax-exemption', [BuyerCentralController::class, 'taxExemption'])->name('tax-exemption');
Route::post('/tax-exemption', [BuyerCentralController::class, 'submitTaxExemption'])->name('tax-exemption.submit');
Route::get('/accio-work', [BuyerCentralController::class, 'accioWork'])->name('accio-work');
Route::post('/accio-work', [BuyerCentralController::class, 'submitAccioWork'])->name('accio-work.submit');
Route::get('/become-supplier', [BuyerCentralController::class, 'becomeSupplier'])->name('become-supplier');
Route::post('/become-supplier', [BuyerCentralController::class, 'submitSupplierApplication'])->name('become-supplier.submit');

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'check.role:admin,superadmin'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Profile (Accessible to all admin users)
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
    
    // Settings (Accessible to all admin users)
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::post('/settings', [AdminController::class, 'updateSettings'])->name('admin.settings.update');
    Route::get('/settings/appearance', [AdminController::class, 'settingsAppearance'])->name('admin.settings.appearance');
    Route::get('/settings/payment', [AdminController::class, 'settingsPayment'])->name('admin.settings.payment');
    Route::get('/settings/shipping', [AdminController::class, 'settingsShipping'])->name('admin.settings.shipping');
    Route::get('/settings/notifications', [AdminController::class, 'settingsNotifications'])->name('admin.settings.notifications');
    
    // Super Admin Only Routes
    Route::middleware(['check.role:superadmin'])->group(function () {
        Route::get('/super-dashboard', [AdminController::class, 'superDashboard'])->name('admin.super.dashboard');
        Route::get('/roles', [AdminController::class, 'roles'])->name('admin.roles');
        Route::post('/roles/{id}/permissions', [AdminController::class, 'updateRolePermissions'])->name('admin.roles.permissions');
    });
    
    // Users Management
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::post('/users', [AdminController::class, 'createUser'])->name('admin.users.create');
    Route::post('/users/{id}', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
    
    // Shop Control
    Route::get('/products', [AdminController::class, 'products'])->name('admin.products');
    Route::get('/manufacturers', [AdminController::class, 'manufacturers'])->name('admin.manufacturers');
    Route::post('/manufacturers/{id}/verify', [AdminController::class, 'verifyManufacturer'])->name('admin.manufacturers.verify');
    Route::get('/categories', [AdminController::class, 'categories'])->name('admin.categories');
    Route::get('/deals', [AdminController::class, 'deals'])->name('admin.deals');
    Route::get('/orders', [AdminController::class, 'orders'])->name('admin.orders');
    
    // Management
    Route::get('/staff', [AdminController::class, 'staff'])->name('admin.staff');
});

// Role-based Dashboards
Route::middleware(['auth'])->group(function () {
    Route::get('/buyer/dashboard', function() {
        return view('dashboards.buyer');
    })->name('buyer.dashboard');
    
    Route::get('/seller/dashboard', function() {
        return view('dashboards.seller');
    })->middleware('check.role:seller')->name('seller.dashboard');
    
    Route::get('/manufacturer/dashboard', function() {
        return view('dashboards.manufacturer');
    })->middleware('check.role:manufacturer')->name('manufacturer.dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
