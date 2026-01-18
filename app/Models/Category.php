<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','slug','icon'];

    /**
     * RELASI: categories ke products
     * 
     * Satu categories bisa memiliki banyak products
     * Contoh: categories "Smartphone" punya banyak products (iPhone, Samsung, dll)
     * Ini adalah relasi One-to-Many langsung
     * 
     */
    public function products(): HasMany //one to many,relasi ke tabel products
    {
        return $this->hasMany(Product::class);
        // foreign key di products: id_categories
        // local key di categories: id
    }

    /**
         * RELASI: categories ke brand_categories
         * 
         * Satu categories bisa memiliki banyak brand_categories
         * brand_categories adalah tabel pivot/jembatan antara categories dan brands
         * Relasi ini memungkinkan kategori terhubung ke banyak brands
         * 
         */
    public function brand_categories(): HasMany //one to many,relasi ke tabel brand_categories
    {
        return $this->hasMany(BrandCategory::class, 'id_categories');
        // foreign key di brand_categories: id_categories
        // local key di categories: id
    }
}