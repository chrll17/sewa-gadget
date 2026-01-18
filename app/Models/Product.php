<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','slug','thumbnail','about','id_categories','id_brands','price'];

    /**
     * RELASI: products ke categories
     * 
     * Setiap products dimiliki oleh satu categories
     * Contoh: products "iPhone 13" termasuk dalam categories "Smartphone"
     * 
     */
    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class);
        // foreign key di products: id_categories
        // owner key di categories: id
    }

    /**
     * RELASI: products ke brands
     * 
     * Setiap products dimiliki oleh satu brands
     * Contoh: products "iPhone 13" dibuat oleh brands "Apple"
     * 
     */
    public function brands(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
        // foreign key di products: id_brands
        // owner key di brands: id
    }

    public function product_photos(): HasMany
    {
        return $this->hasMany(ProductPhoto::class);
    }
}
