<?php

use App\Http\Controllers\Dashboard\ProductCategoryController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\TransactionController;
use App\Http\Controllers\Dashboard\UserController;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    $pageLabel = "Beranda";

    $totalUser = User::withWhereHas("role", fn($query) => $query->where("name", "user"))->count();
    $totalProduct = Product::count();

    return view("dashboard.main", compact('pageLabel', 'totalProduct', 'totalUser'));
})->name("dashboard.main");

Route::prefix("products")->controller(ProductController::class)->group(function () {
    Route::get("/", 'IndexPage')->name('dashboard.product.index');
    Route::get("/create", 'CreatePage')->name('dashboard.product.create');
    Route::post("/create", "CreateProduct")->name('dashboard.product.create-post');
    Route::delete("/delete/{product}", "DeleteProduct")->name("dashboard.product.delete");
    Route::get("/edit/{product}", "EditPage")->name("dashboard.product.edit");
    Route::put("/update/{product}", "UpdateProduct")->name("dashboard.product.update");
});

Route::prefix("users")->controller(UserController::class)->group(function () {
    Route::get("/", "IndexPage")->name("dashboard.users.index");
    Route::get("/create", "CreatePage")->name("dashboard.users.create-page");
    Route::get("/edit/{user}", "EditPage")->name("dashboard.users.edit-page");
    Route::post("/create", "UserCreate")->name("dashboard.users.create");
    Route::put("/update/{user}", "UpdateUser")->name("dashboard.users.update");
    Route::delete("/delete/{user}", "DeleteUser")->name("dashboard.users.delete");
});

Route::prefix("transactions")->controller(TransactionController::class)->group(function () {
    Route::get("/", "IndexPage")->name("dashboard.transactions.index");
});

Route::prefix("product-category")->controller(ProductCategoryController::class)->group(function () {
    Route::post("/create", "CreateCategory")->name("dashboard.product-category.create");
    Route::delete("/delete/{category}", "DeleteCategory")->name("dashboard.product-category.delete");
});

Route::get("/user-management", fn() => "hello world")->name("dashboard.user-management");
Route::get("/transaction-management", fn() => "hello world")->name("dashboard.transaction-management");
