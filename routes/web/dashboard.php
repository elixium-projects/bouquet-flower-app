<?php

use App\Http\Controllers\Dashboard\ProductCategoryController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    $pageLabel = "Beranda";

    return view("dashboard.main", compact('pageLabel'));
})->name("dashboard.main");

Route::prefix("products")->controller(ProductController::class)->group(function () {
    Route::get("/", 'IndexPage')->name('dashboard.product.index');
    Route::get("/create", 'CreatePage')->name('dashboard.product.create');
    Route::post("/create", "CreateProduct")->name('dashboard.product.create-post');
    Route::delete("/delete/{product}", "DeleteProduct")->name("dashboard.product.delete");
});

Route::prefix("product-category")->controller(ProductCategoryController::class)->group(function () {
    Route::post("/create", "CreateCategory")->name("dashboard.product-category.create");
    Route::delete("/delete/{category}", "DeleteCategory")->name("dashboard.product-category.delete");
});

Route::get("/user-management", fn() => "hello world")->name("dashboard.user-management");
Route::get("/transaction-management", fn() => "hello world")->name("dashboard.transaction-management");
