<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BrandCategory extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['id_categories','id_brands'];
}