<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\landingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Landing\ProductController;



// Route::get("/", function () {
//     return view("landing.home");
// });

Route::get('/', [ProductController::class, 'productHome'])->name('landing.home');


Route::get('home', [landingController::class, 'home'])->name('home');
Route::get('/produk', [landingController::class, 'Produk'])->name('Produk');
Route::get('/AboutUs', [landingController::class, 'AboutUs'])->name('AboutUs');
Route::get('/Gallery', [landingController::class, 'Gallery'])->name('Gallery');
Route::get('/ContactUs', [landingController::class, 'ContactUs'])->name('ContactUs');
Route::get('/detailProduk', [landingController::class, 'detailProduk'])->name('detailProduk');
Route::get('/keranjangBelanja', [landingController::class, 'keranjangBelanja'])->name('keranjangBelanja');
Route::get('/produkDisukai', [landingController::class, 'produkDisukai'])->name('produkDisukai');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::get('/produk', [ProductController::class, 'index'])->name('Produk');
Route::get('/home', [ProductController::class, 'productHome'])->name('home');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('detailProduk');

Route::get('/search', [ProductController::class, 'search'])->name('search');
