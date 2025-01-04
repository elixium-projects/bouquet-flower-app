<?php

namespace App\Observers;

use App\Models\Product;

class ProductObserver
{
    public function created(Product $product): void
    {
        $product->status = "active";
        $product->created_at = now();
    }
}
