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
    
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 24px;
    }
    
    .stat-card {
        background: white;
        border-radius: 16px;
        padding: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    
    .stat-card .fa-solid {
        font-size: 20px;
    }
    
    .stat-card div div {
        font-size: 24px;
        font-weight: 700;
        color: #1e293b;
    }
    
    .stat-card div div + div {
        font-size: 13px;
        color: #64748b;
    }
</style>
@endsection

@section('content')
<!-- Stats Cards -->
<div class="stats-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 24px;">
    <div class="stat-card" style="background: white; border-radius: 16px; padding: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
        <div style="display: flex; align-items: center; gap: 12px;">
            <div style="width: 48px; height: 48px; border-radius: 12px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center; color: white; font-size: 20px;">
                <i class="fa-solid fa-box"></i>
            </div>
            <div>
                <div style="font-size: 24px; font-weight: 700; color: #1e293b;">{{ $totalProducts ?? 0 }}</div>
                <div style="font-size: 13px; color: #64748b;">Total Products</div>
            </div>
        </div>
    </div>
    
    <div class="stat-card" style="background: white; border-radius: 16px; padding: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
        <div style="display: flex; align-items: center; gap: 12px;">
            <div style="width: 48px; height: 48px; border-radius: 12px; background: linear-gradient(135deg, #10b981 0%, #059669 100%); display: flex; align-items: center; justify-content: center; color: white; font-size: 20px;">
                <i class="fa-solid fa-check-circle"></i>
            </div>
            <div>
                <div style="font-size: 24px; font-weight: 700; color: #1e293b;">{{ $activeProducts ?? 0 }}</div>
                <div style="font-size: 13px; color: #64748b;">Active</div>
            </div>
        </div>
    </div>
    
    <div class="stat-card" style="background: white; border-radius: 16px; padding: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
        <div style="display: flex; align-items: center; gap: 12px;">
            <div style="width: 48px; height: 48px; border-radius: 12px; background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); display: flex; align-items: center; justify-content: center; color: white; font-size: 20px;">
                <i class="fa-solid fa-star"></i>
            </div>
            <div>
                <div style="font-size: 24px; font-weight: 700; color: #1e293b;">{{ $featuredProducts ?? 0 }}</div>
                <div style="font-size: 13px; color: #64748b;">Featured</div>
            </div>
        </div>
    </div>
    
    <div class="stat-card" style="background: white; border-radius: 16px; padding: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
        <div style="display: flex; align-items: center; gap: 12px;">
            <div style="width: 48px; height: 48px; border-radius: 12px; background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); display: flex; align-items: center; justify-content: center; color: white; font-size: 20px;">
                <i class="fa-solid fa-triangle-exclamation"></i>
            </div>
            <div>
                <div style="font-size: 24px; font-weight: 700; color: #1e293b;">{{ $lowStockProducts ?? 0 }}</div>
                <div style="font-size: 13px; color: #64748b;">Low Stock</div>
            </div>
        </div>
    </div>
</div>

<div class="page-header">
    <h1>All Products ({{ $totalProducts ?? 0 }})</h1>
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
    <form method="GET" style="display: flex; gap: 12px;">
        <select class="filter-select" name="per_page" onchange="this.form.submit()">
            <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10 per page</option>
            <option value="25" {{ $perPage == 25 ? 'selected' : '' }}>25 per page</option>
            <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50 per page</option>
            <option value="100" {{ $perPage == 100 ? 'selected' : '' }}>100 per page</option>
            <option value="all" {{ $perPage == 'all' ? 'selected' : '' }}>Show All</option>
        </select>
        
        <select class="filter-select" name="category">
            <option value="">All Categories</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </form>
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
            @if($product->image && file_exists(public_path('storage/' . $product->image)))
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" loading="lazy">
            @elseif($product->image && file_exists(public_path($product->image)))
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" loading="lazy">
            @else
                <div style="text-align: center;">
                    <i class="fa-solid fa-box" style="font-size: 48px; margin-bottom: 8px;"></i>
                    <span style="font-size: 12px; display: block;">{{ $product->sku ?? 'No Image' }}</span>
                </div>
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
                    <button class="btn-action btn-edit" onclick="openEditModal({{ $product->id }}, '{{ addslashes($product->name) }}', {{ $product->price }}, {{ $product->stock_quantity ?? 0 }}, {{ $product->is_active ? 1 : 0 }})" title="Edit Product">
                        <i class="fa-solid fa-pen"></i>
                    </button>
                    <button class="btn-action btn-delete" onclick="openDeleteModal({{ $product->id }}, '{{ addslashes($product->name) }}')" title="Delete Product">
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

@if($perPage !== 'all' && $products->hasPages())
<div class="pagination-bar">
    <div class="pagination-info" style="color: #64748b; font-size: 14px; margin-right: 20px;">
        Showing {{ $products->firstItem() ?? 0 }}-{{ $products->lastItem() ?? 0 }} of {{ $totalProducts ?? 0 }} products
    </div>
    <div class="pagination">
        {{ $products->links() }}
    </div>
</div>
@endif

<!-- Edit Product Modal -->
<div id="editModal" class="modal" style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5);">
    <div class="modal-content" style="background-color: white; margin: 5% auto; padding: 0; border-radius: 16px; width: 90%; max-width: 600px; box-shadow: 0 20px 60px rgba(0,0,0,0.3);">
        <div style="padding: 24px; border-bottom: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: center;">
            <h3 style="margin: 0; font-size: 20px; font-weight: 700; color: #1e293b;">
                <i class="fa-solid fa-pen" style="margin-right: 8px; color: #667eea;"></i>
                Edit Product
            </h3>
            <button onclick="closeEditModal()" style="background: none; border: none; font-size: 24px; color: #94a3b8; cursor: pointer;">
                <i class="fa-solid fa-times"></i>
            </button>
        </div>
        <form id="editForm" method="POST" style="padding: 24px;">
            @csrf
            @method('PUT')
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 13px; font-weight: 600; color: #64748b; margin-bottom: 8px;">Product Name</label>
                <input type="text" id="editName" name="name" style="width: 100%; padding: 12px 16px; border: 2px solid #e2e8f0; border-radius: 10px; font-size: 15px; font-family: 'Poppins', sans-serif;">
            </div>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 20px;">
                <div>
                    <label style="display: block; font-size: 13px; font-weight: 600; color: #64748b; margin-bottom: 8px;">Price (TZS)</label>
                    <input type="number" id="editPrice" name="price" style="width: 100%; padding: 12px 16px; border: 2px solid #e2e8f0; border-radius: 10px; font-size: 15px;">
                </div>
                <div>
                    <label style="display: block; font-size: 13px; font-weight: 600; color: #64748b; margin-bottom: 8px;">Stock Quantity</label>
                    <input type="number" id="editStock" name="stock_quantity" style="width: 100%; padding: 12px 16px; border: 2px solid #e2e8f0; border-radius: 10px; font-size: 15px;">
                </div>
            </div>
            <div style="margin-bottom: 24px;">
                <label style="display: block; font-size: 13px; font-weight: 600; color: #64748b; margin-bottom: 8px;">Status</label>
                <select id="editStatus" name="is_active" style="width: 100%; padding: 12px 16px; border: 2px solid #e2e8f0; border-radius: 10px; font-size: 15px;">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
            <div style="display: flex; gap: 12px; justify-content: flex-end;">
                <button type="button" onclick="closeEditModal()" style="padding: 12px 24px; border: 2px solid #e2e8f0; background: white; color: #64748b; border-radius: 10px; font-weight: 600; cursor: pointer;">
                    Cancel
                </button>
                <button type="submit" style="padding: 12px 24px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; border-radius: 10px; font-weight: 600; cursor: pointer;">
                    <i class="fa-solid fa-save" style="margin-right: 8px;"></i>Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="modal" style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5);">
    <div class="modal-content" style="background-color: white; margin: 10% auto; padding: 0; border-radius: 16px; width: 90%; max-width: 400px; box-shadow: 0 20px 60px rgba(0,0,0,0.3);">
        <div style="padding: 32px 24px; text-align: center;">
            <div style="width: 64px; height: 64px; background: #fee2e2; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px;">
                <i class="fa-solid fa-trash" style="font-size: 28px; color: #ef4444;"></i>
            </div>
            <h3 style="margin: 0 0 8px 0; font-size: 20px; font-weight: 700; color: #1e293b;">Delete Product?</h3>
            <p style="margin: 0; color: #64748b; font-size: 14px;">Are you sure you want to delete <strong id="deleteProductName" style="color: #1e293b;"></strong>? This action cannot be undone.</p>
        </div>
        <div style="padding: 16px 24px 24px; display: flex; gap: 12px;">
            <button onclick="closeDeleteModal()" style="flex: 1; padding: 12px; border: 2px solid #e2e8f0; background: white; color: #64748b; border-radius: 10px; font-weight: 600; cursor: pointer;">
                Cancel
            </button>
            <form id="deleteForm" method="POST" style="flex: 1;">
                @csrf
                @method('DELETE')
                <button type="submit" style="width: 100%; padding: 12px; background: #ef4444; color: white; border: none; border-radius: 10px; font-weight: 600; cursor: pointer;">
                    <i class="fa-solid fa-trash" style="margin-right: 8px;"></i>Delete
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    function openEditModal(id, name, price, stock, status) {
        document.getElementById('editForm').action = '/admin/products/' + id;
        document.getElementById('editName').value = name;
        document.getElementById('editPrice').value = price;
        document.getElementById('editStock').value = stock;
        document.getElementById('editStatus').value = status ? '1' : '0';
        document.getElementById('editModal').style.display = 'block';
    }
    
    function closeEditModal() {
        document.getElementById('editModal').style.display = 'none';
    }
    
    function openDeleteModal(id, name) {
        document.getElementById('deleteForm').action = '/admin/products/' + id;
        document.getElementById('deleteProductName').textContent = name;
        document.getElementById('deleteModal').style.display = 'block';
    }
    
    function closeDeleteModal() {
        document.getElementById('deleteModal').style.display = 'none';
    }
    
    // Close modals when clicking outside
    window.onclick = function(event) {
        if (event.target.className === 'modal') {
            event.target.style.display = 'none';
        }
    }
</script>
@endsection
