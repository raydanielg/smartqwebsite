@extends('layouts.admin')

@section('title', 'Deals & Offers - Smart Q Store')

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
    
    .deals-tabs {
        display: flex;
        gap: 8px;
        margin-bottom: 24px;
        background: white;
        padding: 6px;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        width: fit-content;
    }
    
    .tab-btn {
        padding: 10px 20px;
        border-radius: 10px;
        border: none;
        background: transparent;
        font-size: 14px;
        font-weight: 600;
        color: #64748b;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    
    .tab-btn.active {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }
    
    .deals-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 20px;
    }
    
    .deal-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
    }
    
    .deal-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 40px rgba(0,0,0,0.1);
    }
    
    .deal-banner {
        height: 120px;
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }
    
    .deal-banner.flash {
        background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
    }
    
    .deal-banner.seasonal {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .discount-badge {
        width: 80px;
        height: 80px;
        background: white;
        border-radius: 50%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }
    
    .discount-badge .percent {
        font-size: 24px;
        font-weight: 800;
        color: #f5576c;
        line-height: 1;
    }
    
    .discount-badge .off {
        font-size: 11px;
        font-weight: 600;
        color: #64748b;
        text-transform: uppercase;
    }
    
    .deal-content {
        padding: 24px;
    }
    
    .deal-title {
        font-size: 18px;
        font-weight: 700;
        color: #1e293b;
        margin: 0 0 8px 0;
    }
    
    .deal-desc {
        font-size: 13px;
        color: #64748b;
        margin: 0 0 16px 0;
    }
    
    .deal-progress {
        margin-bottom: 16px;
    }
    
    .progress-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 8px;
    }
    
    .progress-label {
        font-size: 12px;
        font-weight: 600;
        color: #64748b;
    }
    
    .progress-value {
        font-size: 12px;
        font-weight: 700;
        color: #1e293b;
    }
    
    .progress-bar {
        height: 8px;
        background: #e2e8f0;
        border-radius: 4px;
        overflow: hidden;
    }
    
    .progress-fill {
        height: 100%;
        border-radius: 4px;
        background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
        transition: width 0.3s ease;
    }
    
    .deal-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 16px;
        border-top: 1px solid #f1f5f9;
    }
    
    .deal-timer {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        color: #ef4444;
        font-weight: 600;
    }
    
    .deal-stats {
        font-size: 12px;
        color: #64748b;
    }
    
    .deal-actions {
        display: flex;
        gap: 8px;
    }
    
    .btn-deal {
        padding: 8px 16px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    
    .btn-edit-deal {
        background: #dbeafe;
        color: #3b82f6;
    }
    
    .btn-end-deal {
        background: #fee2e2;
        color: #ef4444;
    }
</style>
@endsection

@section('content')
<div class="page-header">
    <h1>Deals & Offers ({{ $activeDeals ?? 0 }})</h1>
    <button class="btn-add" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; padding: 12px 24px; border-radius: 12px; font-size: 14px; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; gap: 8px;">
        <i class="fa-solid fa-plus"></i>
        Create Deal
    </button>
</div>

<div class="deals-tabs">
    <button class="tab-btn active">Active Deals</button>
    <button class="tab-btn">Scheduled</button>
    <button class="tab-btn">Expired</button>
</div>

<div class="deals-grid">
    @forelse($deals as $deal)
    @php
        $discountPercent = $deal->price > 0 ? round((($deal->price - $deal->sale_price) / $deal->price) * 100) : 0;
        $dealType = $discountPercent >= 50 ? 'flash' : ($discountPercent >= 30 ? 'seasonal' : 'normal');
    @endphp
    <div class="deal-card animate__animated animate__fadeInUp" style="animation-delay: {{ $loop->index * 100 }}ms;">
        <div class="deal-banner {{ $dealType }}">
            <div class="discount-badge">
                <span class="percent">{{ $discountPercent }}%</span>
                <span class="off">OFF</span>
            </div>
        </div>
        <div class="deal-content">
            <h3 class="deal-title">{{ $deal->name }}</h3>
            <p class="deal-desc">{{ $deal->category->name ?? 'General' }} • {{ $deal->sku ?? 'N/A' }}</p>
            
            <div style="margin-bottom: 16px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                    <span style="font-size: 12px; color: #64748b;">Price:</span>
                    <div>
                        <span style="text-decoration: line-through; color: #94a3b8; font-size: 13px; margin-right: 8px;">TZS {{ number_format($deal->price, 0) }}</span>
                        <span style="font-weight: 700; color: #667eea; font-size: 16px;">TZS {{ number_format($deal->sale_price, 0) }}</span>
                    </div>
                </div>
            </div>
            
            <div class="deal-footer">
                <div class="deal-stats">
                    <i class="fa-solid fa-box" style="margin-right: 4px;"></i>
                    {{ $deal->stock_quantity ?? 0 }} in stock
                </div>
                <div class="deal-actions">
                    <button class="btn-deal btn-edit-deal">Edit</button>
                    <button class="btn-deal btn-end-deal">End</button>
                </div>
            </div>
        </div>
    </div>
    @empty
        <div style="grid-column: 1/-1; text-align: center; padding: 60px; color: #64748b;">
            <i class="fa-solid fa-percent" style="font-size: 48px; margin-bottom: 16px; opacity: 0.5;"></i>
            <h3>No active deals</h3>
            <p>Create your first deal to get started</p>
        </div>
    @endforelse
</div>

<div style="margin-top: 24px;">
    {{ $deals->links() }}
</div>
@endsection
