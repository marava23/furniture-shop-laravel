<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\Client\HomeController::class, 'index'])->name('home');
Route::resource('/products',\App\Http\Controllers\Client\ProductController::class)->only('index', 'show');
Route::get('/register', [\App\Http\Controllers\Client\AuthController::class, 'index']);
Route::post('/register', [\App\Http\Controllers\Client\AuthController::class, 'store'])->name('register');
Route::get('/login', [\App\Http\Controllers\Client\AuthController::class, 'logForm'])->name('form.login');
Route::post('/login', [\App\Http\Controllers\Client\AuthController::class, 'login'])->name('login');
Route::post('/review',[\App\Http\Controllers\Client\ReviewController::class, 'store'] )->name('review');
Route::get('/contact', [\App\Http\Controllers\Client\EmailController::class, 'create'])->name('contact');
Route::post('/email', [\App\Http\Controllers\Client\EmailController::class, 'sendEmail'])->name('send.email');
Route::get('/dokumentacija', function (){
    return response()->file('dokumentacija.pdf');
});
Route::get('/autor', [\App\Http\Controllers\Client\HomeController::class, 'autor']);
Route::middleware('isLogged')->group(function(){
    Route::resource('/carts', \App\Http\Controllers\Client\CartController::class)->only('store', 'destroy', 'update');
    Route::post('/logout', [\App\Http\Controllers\Client\AuthController::class, 'logout'])->name('logout');
    Route::resource('/orders', \App\Http\Controllers\Client\OrderController::class);
    Route::get('/user/{user}', [\App\Http\Controllers\Client\UserController::class, 'show'])->name('user.show');
});
Route::prefix('/admin')->name('admin.')->middleware(['isLogged', 'isAdmin'])->group(function(){
    Route::get('/home', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
    Route::get('/orders', [\App\Http\Controllers\Admin\HomeController::class, 'orders'])->name('orders');
    Route::resource('/products', \App\Http\Controllers\Admin\ProductController::class);
    Route::put('/orders/{order}', [\App\Http\Controllers\Admin\HomeController::class, 'updateOrders'])->name('orders.update');
    Route::get('/actions', [\App\Http\Controllers\Admin\ActionLogController::class, 'index'])->name('actions');
});
