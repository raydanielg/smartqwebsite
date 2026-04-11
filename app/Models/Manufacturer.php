<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'logo',
        'description',
        'country',
        'city',
        'business_type',
        'main_products',
        'year_established',
        'total_employees',
        'certifications',
        'is_verified',
        'verification_level',
        'contact_person',
        'phone',
        'email',
        'website',
        'response_rate',
        'transactions_count',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_verified' => 'boolean',
        'is_active' => 'boolean',
        'response_rate' => 'decimal:2',
        'year_established' => 'integer',
        'total_employees' => 'integer',
        'transactions_count' => 'integer',
    ];
}
