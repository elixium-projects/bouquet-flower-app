<?php

use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    $pageLabel = "Beranda";

    return view("dashboard.main", compact('pageLabel'));
})->name("dashboard.main");

Route::get("/user-management", fn() => "hello world")->name("dashboard.user-management");
Route::get("/product-management", fn() => "hello world")->name("dashboard.product-management");
Route::get("/transaction-management", fn() => "hello world")->name("dashboard.transaction-management");
