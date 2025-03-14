<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = "categories";
    protected $fillable = [
        "name"
    ];
    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
