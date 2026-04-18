@extends('layouts.admin')

@section('title', 'Manufacturers - Smart Q Store')

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
    }
    
    .data-table-container {
        background: white;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        overflow: hidden;
    }
    
    .data-table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .data-table th {
        background: #f8fafc;
        padding: 16px 20px;
        text-align: left;
        font-size: 12px;
        font-weight: 600;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .data-table td {
        padding: 20px;
        border-bottom: 1px solid #f1f5f9;
    }
    
    .data-table tr:hover {
        background: #f8fafc;
    }
    
    .manufacturer-info {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .manufacturer-avatar {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 16px;
    }
    
    .manufacturer-details h4 {
        font-size: 15px;
        font-weight: 600;
        color: #1e293b;
        margin: 0 0 4px 0;
    }
    
    .manufacturer-details p {
        font-size: 13px;
        color: #64748b;
        margin: 0;
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
    
    .status-verified {
        background: #d1fae5;
        color: #065f46;
    }
    
    .status-pending {
        background: #fef3c7;
        color: #92400e;
    }
    
    .btn-verify {
        background: #dbeafe;
        color: #3b82f6;
        border: none;
        padding: 8px 16px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
    }
    
    .btn-verify.verified {
        background: #d1fae5;
        color: #065f46;
    }
    
    .product-count {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 14px;
        background: #f1f5f9;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        color: #475569;
    }
    
    .action-btns {
        display: flex;
        gap: 8px;
    }
    
    .btn-icon {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
    }
</style>
@endsection

@section('content')
<div class="page-header">
    <h1>Manufacturers</h1>
    <button class="btn-add">
        <i class="fa-solid fa-plus"></i>
        Add Manufacturer
    </button>
</div>

<div class="data-table-container animate__animated animate__fadeInUp">
    <table class="data-table">
        <thead>
            <tr>
                <th>Manufacturer</th>
                <th>Contact</th>
                <th>Products</th>
                <th>Status</th>
                <th>Joined</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
                $manufacturers = [
                    ['name' => 'ABC Industries', 'email' => 'contact@abc.co.tz', 'products' => 24, 'verified' => true],
                    ['name' => 'Tanzania Electronics', 'email' => 'info@tzelec.co.tz', 'products' => 18, 'verified' => true],
                    ['name' => 'Dar es Salaam Traders', 'email' => 'sales@dstraders.com', 'products' => 12, 'verified' => false],
                    ['name' => 'Mwanza Manufacturing', 'email' => 'hello@mwanzamfg.co.tz', 'products' => 8, 'verified' => true],
                    ['name' => 'Arusha Goods Ltd', 'email' => 'info@arushagoods.co.tz', 'products' => 15, 'verified' => false],
                ];
            @endphp
            @foreach($manufacturers as $mfg)
            <tr>
                <td>
                    <div class="manufacturer-info">
                        <div class="manufacturer-avatar">{{ substr($mfg['name'], 0, 1) }}</div>
                        <div class="manufacturer-details">
                            <h4>{{ $mfg['name'] }}</h4>
                            <p>{{ $mfg['email'] }}</p>
                        </div>
                    </div>
                </td>
                <td>
                    <span style="color: #475569; font-size: 14px;">{{ $mfg['email'] }}</span>
                </td>
                <td>
                    <span class="product-count">
                        <i class="fa-solid fa-box"></i>
                        {{ $mfg['products'] }} products
                    </span>
                </td>
                <td>
                    @if($mfg['verified'])
                        <span class="status-badge status-verified">
                            <i class="fa-solid fa-check-circle"></i>
                            Verified
                        </span>
                    @else
                        <span class="status-badge status-pending">
                            <i class="fa-solid fa-clock"></i>
                            Pending
                        </span>
                    @endif
                </td>
                <td>
                    <span style="color: #64748b; font-size: 14px;">{{ now()->subDays(rand(1, 365))->format('M d, Y') }}</span>
                </td>
                <td>
                    <div class="action-btns">
                        @if(!$mfg['verified'])
                            <button class="btn-verify">Verify</button>
                        @else
                            <button class="btn-verify verified">
                                <i class="fa-solid fa-check"></i>
                            </button>
                        @endif
                        <button class="btn-icon" style="background: #dbeafe; color: #3b82f6;">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                        <button class="btn-icon" style="background: #fee2e2; color: #ef4444;">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
