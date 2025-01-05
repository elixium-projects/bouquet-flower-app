<?php

namespace App\Models;

use App\Observers\ProductObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

#[ObservedBy([ProductObserver::class])]
class Product extends Model
{
    protected $table = "products";
    public $timestamps = false;
    protected $fillable = [
        "category_id",
        "name",
        "slug",
        "description",
        "price",
        "stock",
        "thumbnail",
        "status",
        "created_at",
        "updated_at"
    ];

    public static function booted()
    {
        static::creating(function (self $product) {
            $product->slug = str($product->name)->slug();
        });
    }

    public function thumbnailURL(): Attribute
    {
        return Attribute::make(
            get: fn() => Storage::disk("public")->url("images/thumbnail/" . $this->thumbnail),
        );
    }

    public function Category()
    {
        return $this->belongsTo(ProductCategory::class, "category_id", "id");
    }
}
