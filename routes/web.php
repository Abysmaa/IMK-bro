<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;


Route::get('/', [ProductController::class, 'index'])->name('home');
Route::resource('products', ProductController::class);
Route::get('/cart', [OrderController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [OrderController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update/{id}', [OrderController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{id}', [OrderController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/checkout', [OrderController::class, 'checkout'])->name('cart.checkout');
Route::get('/thankyou/{id}', [OrderController::class, 'thankyou'])->name('thankyou');
Route::get('/inbox',function () {
    return view('inbox', ['nama' => 'Dhafin Fadhilah', 'title' => 'Size Chart']);
});
Route::get('/notification', function () {
    return view('notification', ['title' => 'About']);
});