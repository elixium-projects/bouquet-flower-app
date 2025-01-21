<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
        return $this->hasOne(Cart::class, 'id', "cart_id");
    }

    public function createdAtDateFormat(): Attribute
    {
        return Attribute::make(
            fn() => Carbon::parse($this->created_at)->format("Y-m-d"),
        );
    }
}
