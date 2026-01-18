<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class BrandCategory extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['id_categories','id_brands'];
    
    /**
     * RELASI: brand_categories ke categories
     * 
     * Setiap brand_categories dimiliki oleh satu categories
     * Contoh: "Apple - Smartphone" dimiliki oleh categories "Smartphone"
     *
     */
    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'id_categories');
        // foreign key di brand_categories: id_categories
        // owner key di categories: id
    }

    /**
         * RELASI: brand_categories ke brands
         * 
         * Setiap brand_categories dimiliki oleh satu brands
         * Contoh: "Apple - Smartphone" dimiliki oleh brands "Apple"
         * 
         */
    public function brands(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'id_brands');
        // foreign key di brand_categories: id_brands
        // owner key di brands: id
    }
}