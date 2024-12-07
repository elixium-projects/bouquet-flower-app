<?php

use Illuminate\Support\Facades\Route;

Route::get("/", fn() => view("dashboard.main"))->name("dashboard");
