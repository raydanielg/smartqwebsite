<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'image',
        'menu_image',
        'parent_id',
        'sort_order',
        'is_active',
        'show_in_menu',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'show_in_menu' => 'boolean',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Parent category
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Child categories
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id')->orderBy('sort_order');
    }

    // Get all parent categories (for menu)
    public static function getParentCategories()
    {
        return self::whereNull('parent_id')
            ->where('show_in_menu', true)
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();
    }

    // Scope for parent categories
    public function scopeParents($query)
    {
        return $query->whereNull('parent_id');
    }

    // Scope for child categories
    public function scopeChildren($query)
    {
        return $query->whereNotNull('parent_id');
    }
}
