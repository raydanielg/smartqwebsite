<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ShopController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
