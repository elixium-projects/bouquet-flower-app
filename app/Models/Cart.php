<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class cart extends Model

{
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];

    // Relasi ke tabel User
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke tabel Product
    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id', "product_id");
    }

    public function User()
    {
        return $this->hasOne(User::class, 'id', "user_id");
    }


    public function transactions()
    {
        return $this->belongsTo(transaction::class, 'cart_id');
    }
}
