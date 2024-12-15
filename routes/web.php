<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RedirectController;
use Illuminate\Support\Facades\Route;


require_once __DIR__ . "/web/landing.php";

Route::prefix("dashboard")->middleware('auth')->group(function () {
    require_once __DIR__ . "/web/dashboard.php";
});

Route::middleware('auth')->group(function () {
    Route::get("/redirect", RedirectController::class)->name("redirect-auth");
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
