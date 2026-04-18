@extends('layouts.admin')

@section('title', 'Categories - Smart Q Store')

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
    
    .categories-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 20px;
    }
    
    .category-card {
        background: white;
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .category-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 40px rgba(0,0,0,0.1);
    }
    
    .category-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: linear-gradient(180deg, #667eea 0%, #764ba2 100%);
    }
    
    .category-icon {
        width: 56px;
        height: 56px;
        border-radius: 16px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 24px;
        margin-bottom: 16px;
    }
    
    .category-name {
        font-size: 18px;
        font-weight: 700;
        color: #1e293b;
        margin: 0 0 8px 0;
    }
    
    .category-desc {
        font-size: 13px;
        color: #64748b;
        margin: 0 0 16px 0;
        line-height: 1.5;
    }
    
    .category-stats {
        display: flex;
        gap: 16px;
        padding-top: 16px;
        border-top: 1px solid #f1f5f9;
    }
    
    .stat {
        display: flex;
        flex-direction: column;
    }
    
    .stat-value {
        font-size: 20px;
        font-weight: 700;
        color: #1e293b;
    }
    
    .stat-label {
        font-size: 12px;
        color: #64748b;
    }
    
    .category-actions {
        position: absolute;
        top: 20px;
        right: 20px;
        display: flex;
        gap: 8px;
    }
    
    .btn-action-sm {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        opacity: 0;
        transition: all 0.2s ease;
    }
    
    .category-card:hover .btn-action-sm {
        opacity: 1;
    }
    
    .btn-edit-cat {
        background: #dbeafe;
        color: #3b82f6;
    }
    
    .btn-delete-cat {
        background: #fee2e2;
        color: #ef4444;
    }
    
    .add-category-card {
        background: #f8fafc;
        border: 2px dashed #cbd5e1;
        border-radius: 16px;
        padding: 40px 24px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        min-height: 200px;
    }
    
    .add-category-card:hover {
        border-color: #667eea;
        background: #f1f5f9;
    }
    
    .add-icon {
        width: 64px;
        height: 64px;
        border-radius: 50%;
        background: white;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #667eea;
        font-size: 24px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        margin-bottom: 16px;
    }
    
    .add-category-card p {
        font-size: 14px;
        font-weight: 600;
        color: #64748b;
        margin: 0;
    }
</style>
@endsection

@section('content')
<div class="page-header">
    <h1>Categories</h1>
</div>

<div class="categories-grid">
    @php
        $categories = [
            ['name' => 'Electronics', 'icon' => 'fa-plug', 'desc' => 'Phones, laptops, accessories', 'products' => 124, 'subcategories' => 8],
            ['name' => 'Fashion', 'icon' => 'fa-tshirt', 'desc' => 'Clothing, shoes, accessories', 'products' => 89, 'subcategories' => 12],
            ['name' => 'Home & Living', 'icon' => 'fa-home', 'desc' => 'Furniture, decor, kitchen', 'products' => 67, 'subcategories' => 6],
            ['name' => 'Beauty', 'icon' => 'fa-spa', 'desc' => 'Skincare, makeup, fragrances', 'products' => 45, 'subcategories' => 5],
            ['name' => 'Sports', 'icon' => 'fa-running', 'desc' => 'Equipment, apparel, fitness', 'products' => 38, 'subcategories' => 7],
            ['name' => 'Toys', 'icon' => 'fa-gamepad', 'desc' => 'Games, puzzles, outdoor', 'products' => 52, 'subcategories' => 4],
            ['name' => 'Books', 'icon' => 'fa-book', 'desc' => 'Fiction, education, comics', 'products' => 31, 'subcategories' => 6],
        ];
    @endphp
    
    @foreach($categories as $cat)
    <div class="category-card animate__animated animate__fadeInUp" style="animation-delay: {{ $loop->index * 50 }}ms;">
        <div class="category-actions">
            <button class="btn-action-sm btn-edit-cat">
                <i class="fa-solid fa-pen"></i>
            </button>
            <button class="btn-action-sm btn-delete-cat">
                <i class="fa-solid fa-trash"></i>
            </button>
        </div>
        <div class="category-icon">
            <i class="fa-solid {{ $cat['icon'] }}"></i>
        </div>
        <h3 class="category-name">{{ $cat['name'] }}</h3>
        <p class="category-desc">{{ $cat['desc'] }}</p>
        <div class="category-stats">
            <div class="stat">
                <span class="stat-value">{{ $cat['products'] }}</span>
                <span class="stat-label">Products</span>
            </div>
            <div class="stat">
                <span class="stat-value">{{ $cat['subcategories'] }}</span>
                <span class="stat-label">Subcategories</span>
            </div>
        </div>
    </div>
    @endforeach
    
    <div class="add-category-card animate__animated animate__fadeInUp" style="animation-delay: 350ms;">
        <div class="add-icon">
            <i class="fa-solid fa-plus"></i>
        </div>
        <p>Add New Category</p>
    </div>
</div>
@endsection
