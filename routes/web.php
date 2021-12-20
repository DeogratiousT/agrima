<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeOtherController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CommodityController;
use App\Http\Controllers\Dashboard\HomeController as DashboardController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/insights', [HomeController::class, 'insights'])->name('insights');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');

Route::get('/terms-and-conditions', [HomeOtherController::class, 'tcs'])->name('terms.conds');
Route::get('/faqs', [HomeOtherController::class, 'faqs'])->name('faqs');
Route::get('/privacy-policy', [HomeOtherController::class, 'ppolicy'])->name('privacy.policy');
Route::get('/help', [HomeOtherController::class, 'help'])->name('help');

Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

Route::prefix('dashboard')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
        Route::resource('users', UserController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('commodities', CommodityController::class);

        Route::get('/contact/index', [ContactController::class, 'index'])->name('contact.index');
    });
});