<?php

use Illuminate\Support\Facades\Route;

Route::get("/", fn() => view("dashboard.main"))->name("dashboard.main");
Route::get("/user-management", fn() => "hello world")->name("dashboard.user-management");
Route::get("/product-management", fn() => "hello world")->name("dashboard.product-management");
Route::get("/transaction-management", fn() => "hello world")->name("dashboard.transaction-management");
