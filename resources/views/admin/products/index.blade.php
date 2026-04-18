@extends('layouts.admin')

@section('title', 'Products - Smart Q Store')

@section('styles')
<style>
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
    }
    
    .page-header h1 {
        font-size: 24px;
        font-weight: 700;
        color: #1e293b;
        margin: 0;
    }
    
    .btn-add {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        padding: 12px 24px;
        border-radius: 12px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }
    
    .btn-add:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
    }
    
    .filters-bar {
        background: white;
        border-radius: 16px;
        padding: 20px;
        margin-bottom: 24px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        display: flex;
        gap: 16px;
        flex-wrap: wrap;
        align-items: center;
    }
    
    .search-box {
        flex: 1;
        min-width: 280px;
        position: relative;
    }
    
    .search-box input {
        width: 100%;
        padding: 12px 16px 12px 44px;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: 14px;
        font-family: 'Poppins', sans-serif;
        transition: all 0.3s ease;
    }
    
    .search-box input:focus {
        border-color: #667eea;
        outline: none;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
    }
    
    .search-box i {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        font-size: 16px;
    }
    
    .filter-select {
        padding: 12px 16px;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: 14px;
        font-family: 'Poppins', sans-serif;
        background: white;
        cursor: pointer;
        min-width: 150px;
    }
    
    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
    }
    
    .product-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
    }
    
    .product-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 40px rgba(0,0,0,0.1);
    }
    
    .product-image {
        height: 180px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 48px;
    }
    
    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .product-content {
        padding: 20px;
    }
    
    .product-title {
        font-size: 16px;
        font-weight: 600;
        color: #1e293b;
        margin: 0 0 8px 0;
        line-height: 1.4;
    }
    
    .product-category {
        font-size: 12px;
        color: #64748b;
        margin-bottom: 12px;
    }
    
    .product-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 16px;
        border-top: 1px solid #f1f5f9;
    }
    
    .product-price {
        font-size: 18px;
        font-weight: 700;
        color: #667eea;
    }
    
    .product-actions {
        display: flex;
        gap: 8px;
    }
    
    .btn-action {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
    }
    
    .btn-edit {
        background: #dbeafe;
        color: #3b82f6;
    }
    
    .btn-edit:hover {
        background: #3b82f6;
        color: white;
    }
    
    .btn-delete {
        background: #fee2e2;
        color: #ef4444;
    }
    
    .btn-delete:hover {
        background: #ef4444;
        color: white;
    }
    
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }
    
    .status-active {
        background: #d1fae5;
        color: #065f46;
    }
    
    .status-inactive {
        background: #fee2e2;
        color: #991b1b;
    }
    
    .pagination-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 24px;
        padding: 20px;
        background: white;
        border-radius: 16px;
    }
    
    .pagination {
        display: flex;
        gap: 8px;
    }
    
    .page-link {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 600;
        color: #64748b;
        background: #f8fafc;
        border: none;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    
    .page-link:hover, .page-link.active {
        background: #667eea;
        color: white;
    }
</style>
@endsection

@section('content')
<div class="page-header">
    <h1>Products</h1>
    <button class="btn-add">
        <i class="fa-solid fa-plus"></i>
        Add Product
    </button>
</div>

<div class="filters-bar">
    <div class="search-box">
        <i class="fa-solid fa-search"></i>
        <input type="text" placeholder="Search products...">
    </div>
    <select class="filter-select">
        <option>All Categories</option>
        @foreach($categories as $category)
            <option>{{ $category->name }}</option>
        @endforeach
    </select>
    <select class="filter-select">
        <option>All Status</option>
        <option>Active</option>
        <option>Inactive</option>
    </select>
</div>

<div class="products-grid">
    @forelse($products as $index => $product)
    <div class="product-card animate__animated animate__fadeInUp" style="animation-delay: {{ $index * 50 }}ms;">
        <div class="product-image">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
            @else
                <i class="fa-solid fa-box"></i>
            @endif
        </div>
        <div class="product-content">
            <h3 class="product-title">{{ $product->name }}</h3>
            <p class="product-category">{{ $product->category->name ?? 'Uncategorized' }} • SKU: {{ $product->sku ?? 'N/A' }}</p>
            <div style="display: flex; gap: 8px; margin-bottom: 16px;">
                @if($product->is_active)
                    <span class="status-badge status-active">
                        <i class="fa-solid fa-circle" style="font-size: 6px;"></i>
                        Active
                    </span>
                @else
                    <span class="status-badge" style="background: #fee2e2; color: #991b1b;">
                        <i class="fa-solid fa-circle" style="font-size: 6px;"></i>
                        Inactive
                    </span>
                @endif
                @if($product->is_featured)
                    <span class="status-badge" style="background: #fef3c7; color: #92400e;">
                        <i class="fa-solid fa-star" style="font-size: 10px;"></i>
                        Featured
                    </span>
                @endif
            </div>
            <div class="product-footer">
                <span class="product-price">TZS {{ number_format($product->final_price, 0) }}</span>
                <div class="product-actions">
                    <button class="btn-action btn-edit">
                        <i class="fa-solid fa-pen"></i>
                    </button>
                    <button class="btn-action btn-delete">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    @empty
        <div style="grid-column: 1/-1; text-align: center; padding: 60px; color: #64748b;">
            <i class="fa-solid fa-box-open" style="font-size: 48px; margin-bottom: 16px; opacity: 0.5;"></i>
            <h3>No products found</h3>
            <p>Add your first product to get started</p>
        </div>
    @endforelse
</div>

<div class="pagination-bar">
    <div class="pagination">
        {{ $products->links() }}
    </div>
</div>
@endsection
