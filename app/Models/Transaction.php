<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $fillable = [
        "cart_id",
        "tax",
        "total",
        "payment_method",
        "status",
        "created_at",
        "updated_at"
    ];

    // Relasi ke tabel Cart
    public function cart()
    {
        return $this->hasOne(Cart::class, 'cart_id');
    }
}
