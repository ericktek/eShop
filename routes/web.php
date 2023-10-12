<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [CheckoutController::class, 'index']);

Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'sendEmail']);
Route::get('/place-order/{id}', [OrderController::class, 'place'])->middleware('auth')->name('place');
Route::get('/order-user', [OrderController::class, 'orderUser'])->middleware('auth')->name('orderUser');
Route::post('/order-user/{id}', [OrderController::class, 'submitOrder'])->middleware('auth')->name('submitOrder');
Route::delete('/cart-items/{cart_item}', [OrderController::class, 'destroy'])->middleware('auth')->name('removeCartItem');


Route::get('/search', [CheckoutController::class, 'search'])->name('welcome.search');
Route::resource('checkout', CheckoutController::class);


Route::get('/get-in-touch', function () {
    return view('get-in-touch');
});

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('/check', [OrderController::class, 'check'])->middleware('auth')->name('orders.store');

Route::middleware(['auth', 'admin'])->group(function () {
    // Define routes that require 'auth' and 'admin' middleware here
    Route::get('/customers', [CustomerController::class, 'customer'])->name('customer');
    Route::get('/orders', [OrderController::class, 'order'])->name('order');
    Route::get('/orders/search', [OrderController::class, 'OrderSearch'])->name('order.search');
    Route::delete('/cart-items/{cart_item}', [OrderController::class, 'destroy'])->name('removeCartItem');
    Route::delete('/cart-items/{result}', [OrderController::class, 'destroy'])->name('removeCartItemR');
    Route::get('/posts/search', [PostController::class, 'search'])->name('posts.search');
    Route::get('/customers/search', [CustomerController::class, 'search'])->name('users.search');
    Route::resource('posts', PostController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
