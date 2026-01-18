<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['name','id_trx','proof','phone_number','address','total_amount','id_products','id_stores','duration','is_paid','delivery_type','started_at','ended_at'];

    protected $casts = [
        'started_at' => 'date', // Mengubah string/datetime dari database menjadi Carbon instance
        'ended_at' => 'date', // Mengubah string/datetime dari database menjadi Carbon instance
    ];
}