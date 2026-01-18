<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['name','slug','logo'];

    /**
     * RELASI: brands ke products
     * 
     * Satu brands bisa memiliki banyak products
     * Contoh: brands "Apple" punya products: iPhone, iPad, MacBook
     * Ini adalah relasi One-to-Many langsung
     * 
     */
    public function products(): HasMany //one to many,relasi ke tabel products
    {
        return $this->hasMany(Product::class);
        // foreign key di products: id_brands
        // local key di brands: id
    }

    /**
         * RELASI: brands ke brand_categories
         * 
         * Satu brands bisa memiliki banyak brand_cactegories
         * brand_categories adalah tabel pivot yang menghubungkan brands dengan categories
         * 
         */
    public function brand_categories(): HasMany //one to many,relasi ke tabel brand_categories
    {
        return $this->hasMany(BrandCategory::class, 'id_brands');
        // foreign key di brand_categories: id_brands
        // local key di brands: id
    }
}