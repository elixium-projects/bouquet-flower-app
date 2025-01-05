<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\landingController;
use App\Http\Controllers\ContactController;


Route::get("/", function () {
    return view("landing.home");
});


Route::get('home', [landingController::class, 'home'])->name('home');
Route::get('/produk', [landingController::class, 'Produk'])->name('Produk');
Route::get('/AboutUs', [landingController::class, 'AboutUs'])->name('AboutUs');
Route::get('/Gallery', [landingController::class, 'Gallery'])->name('Gallery');
Route::get('/ContactUs', [landingController::class, 'ContactUs'])->name('ContactUs');
Route::get('/detailProduk', [landingController::class, 'detailProduk'])->name('detailProduk');
Route::get('/keranjangBelanja', [landingController::class, 'keranjangBelanja'])->name('keranjangBelanja');
Route::get('/produkDisukai', [landingController::class, 'produkDisukai'])->name('produkDisukai');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
