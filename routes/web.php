<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;

Route::get('/category/{id}', [ProductController::class, 'getCategory'])->name('category');

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::resource('products', ProductController::class);

Route::get('/size-chart', function () {
    return view('size-chart', ['nama' => 'Size Chart', 'title' => 'Size Chart']);
})->name('size-chart');

Route::get('/about', function () {
    return view('about', ['title' => 'About Us']);
})->name('about');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/cart', [OrderController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{id}', [OrderController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/update/{id}', [OrderController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove/{id}', [OrderController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/cart/checkout', [OrderController::class, 'checkout'])->name('cart.checkout');

    Route::get('/thankyou/{id}', [OrderController::class, 'thankyou'])->name('thankyou');
});


require __DIR__ . '/auth.php';
