<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    protected $fillable = ['user_id', 'produk_id', 'quantity'];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id', 'id');
        return $this->hasMany(Cart::class, 'user_id');
    }
}
