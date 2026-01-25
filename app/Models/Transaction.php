<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['name','id_trx','proof','phone_number','address','total_amount','id_products','id_stores','duration','is_paid','delivery_type','started_at','ended_at'];

    protected $casts = [
        'total_amount' => MoneyCast::class,
        'started_at' => 'date', // Mengubah string/datetime dari database menjadi Carbon instance
        'ended_at' => 'date', // Mengubah string/datetime dari database menjadi Carbon instance
    ];

    public static function generateUniqueIdTrx()
    {
        $prefix = 'SEWA';
        do{
            $randomString = $prefix . mt_rand(1000,9999);
        }while(self::where('id_trx', $randomString)->exists());
        return $randomString;
    }
    
    public function stores(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}