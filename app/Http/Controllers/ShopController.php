<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    // Main shop page
    public function index(Request $request)
    {
        $query = Product::where('is_active', true)->with('category');
        
        // Filter by category
        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }
        
        // Search
        if ($request->has('search') && $request->search) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }
        
        // Sort
        $sort = $request->get('sort', 'newest');
        switch ($sort) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'name':
                $query->orderBy('name', 'asc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
        }
        
        $products = $query->paginate(12);
        $categories = Category::where('is_active', true)->orderBy('sort_order')->get();
        $featuredProducts = Product::where('is_active', true)->where('is_featured', true)->limit(4)->get();
        
        return view('shop.index', compact('products', 'categories', 'featuredProducts'));
    }
    
    // Product detail page
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->where('is_active', true)->with('category')->firstOrFail();
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('is_active', true)
            ->limit(4)
            ->get();
        $categories = Category::where('is_active', true)->orderBy('sort_order')->get();
        
        return view('shop.product', compact('product', 'relatedProducts', 'categories'));
    }
    
    // Category page
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $products = Product::where('category_id', $category->id)
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->paginate(12);
        $categories = Category::where('is_active', true)->orderBy('sort_order')->get();
        
        return view('shop.category', compact('category', 'products', 'categories'));
    }
    
    // Cart page
    public function cart()
    {
        $cart = Session::get('cart', []);
        $cartItems = [];
        $total = 0;
        
        foreach ($cart as $productId => $item) {
            $product = Product::find($productId);
            if ($product) {
                $cartItems[] = [
                    'product' => $product,
                    'quantity' => $item['quantity'],
                    'subtotal' => $product->final_price * $item['quantity']
                ];
                $total += $product->final_price * $item['quantity'];
            }
        }
        
        $categories = Category::where('is_active', true)->orderBy('sort_order')->get();
        return view('shop.cart', compact('cartItems', 'total', 'categories'));
    }
    
    // Add to cart
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);
        
        $cart = Session::get('cart', []);
        $productId = $request->product_id;
        $quantity = $request->quantity;
        
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = ['quantity' => $quantity];
        }
        
        Session::put('cart', $cart);
        
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Product added to cart',
                'cartCount' => $this->getCartCount()
            ]);
        }
        
        return redirect()->route('cart')->with('success', 'Product added to cart');
    }
    
    // Update cart quantity
    public function updateCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:0'
        ]);
        
        $cart = Session::get('cart', []);
        $productId = $request->product_id;
        $quantity = $request->quantity;
        
        if ($quantity <= 0) {
            unset($cart[$productId]);
        } else {
            $cart[$productId]['quantity'] = $quantity;
        }
        
        Session::put('cart', $cart);
        
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'cartCount' => $this->getCartCount()
            ]);
        }
        
        return redirect()->route('cart')->with('success', 'Cart updated');
    }
    
    // Remove from cart
    public function removeFromCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);
        
        $cart = Session::get('cart', []);
        unset($cart[$request->product_id]);
        Session::put('cart', $cart);
        
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'cartCount' => $this->getCartCount()
            ]);
        }
        
        return redirect()->route('cart')->with('success', 'Product removed from cart');
    }
    
    // Clear cart
    public function clearCart()
    {
        Session::forget('cart');
        return redirect()->route('cart')->with('success', 'Cart cleared');
    }
    
    // Get cart count for header (public API)
    public function cartCount()
    {
        $count = $this->getCartCount();
        return response()->json(['count' => $count]);
    }
    
    // Get cart count for header (private)
    private function getCartCount()
    {
        $cart = Session::get('cart', []);
        $count = 0;
        foreach ($cart as $item) {
            $count += $item['quantity'];
        }
        return $count;
    }
    
    // Checkout page
    public function checkout()
    {
        $cart = Session::get('cart', []);
        if (empty($cart)) {
            return redirect()->route('shop')->with('error', 'Your cart is empty');
        }
        
        $cartItems = [];
        $total = 0;
        
        foreach ($cart as $productId => $item) {
            $product = Product::find($productId);
            if ($product) {
                $cartItems[] = [
                    'product' => $product,
                    'quantity' => $item['quantity'],
                    'subtotal' => $product->final_price * $item['quantity']
                ];
                $total += $product->final_price * $item['quantity'];
            }
        }
        
        $categories = Category::where('is_active', true)->orderBy('sort_order')->get();
        return view('shop.checkout', compact('cartItems', 'total', 'categories'));
    }
    
    // Process checkout
    public function processCheckout(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'payment_method' => 'required|in:bank_transfer,mobile_money,cash_on_delivery'
        ]);
        
        // Here you would process the order, save to database, send emails, etc.
        // For now, just clear the cart and show success
        
        Session::forget('cart');
        
        return redirect()->route('shop')->with('success', 'Order placed successfully! We will contact you shortly.');
    }
}
