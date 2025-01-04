<?php

use App\Http\Controllers\Dashboard\ProductController;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    $pageLabel = "Beranda";

    return view("dashboard.main", compact('pageLabel'));
})->name("dashboard.main");

Route::prefix("products")->controller(ProductController::class)->group(function () {
    Route::get("/", 'indexPage')->name('dashboard.product.index');
    Route::get("/create", 'createPage')->name('dashboard.product.create');
});

Route::get("/user-management", fn() => "hello world")->name("dashboard.user-management");
Route::get("/transaction-management", fn() => "hello world")->name("dashboard.transaction-management");
