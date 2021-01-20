<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [ProductController::class, 'guest'])->name('products.guest');
// Route::get('/products', [ProductController::class, 'index']);
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::get('/add-to-cart/{product}', [ProductController::class, 'addToCart'])->name('addToCart.products');
    Route::get('/cart', [ProductController::class, 'cart'])->name('cart.products');
    Route::get('/checkout/{product}', [ProductController::class, 'checkout'])->name('checkout.products');
    Route::get('/add-product', [SellerController::class, 'add'])->name('post.product');
    Route::post('/register-product', [SellerController::class, 'store'])->name('save.product');
    Route::get('/approved/{product}', [AdminController::class, 'approve'])->name('approved.product');
    Route::get('/seller-list', [AdminController::class, 'seller'])->name('seller.list');
    Route::post('/seller-privilege/{user}', [AdminController::class, 'privilege'])->name('seller.privilege');
    Route::get('/buyer-orders', [BuyerController::class, 'orders'])->name('order.list');
    Route::get('/sale-list', [SellerController::class, 'sales'])->name('sale.list');
});
