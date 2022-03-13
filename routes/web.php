<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommodityController;
use App\Http\Controllers\HomeOtherController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\HomeController as DashboardController;
use App\Http\Controllers\Dashboard\CategoryController as DashboardCategoryController;
use App\Http\Controllers\Dashboard\CommodityController as DashboardCommodityController;
use App\Http\Controllers\Dashboard\SubCategoryController as DashboardSubCategoryController;

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
Route::get('about', [HomeController::class, 'about'])->name('about');
Route::get('insights', [HomeController::class, 'insights'])->name('insights');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::get('cart', [HomeController::class, 'cart'])->name('cart');
Route::get('checkout', [HomeController::class, 'checkout'])->name('checkout');

Route::get('shop', [ProductController::class ,'shop'])->name('shop');
Route::get('categories/{category}', [ProductController::class ,'category'])->name('category');
Route::get('sub-categories/{subCategory}', [ProductController::class ,'subCategory'])->name('sub-category');
Route::get('commodities/{commodity}', [ProductController::class ,'commodity'])->name('commodity');

Route::get('terms-and-conditions', [HomeOtherController::class, 'tcs'])->name('terms.conds');
Route::get('faqs', [HomeOtherController::class, 'faqs'])->name('faqs');
Route::get('privacy-policy', [HomeOtherController::class, 'ppolicy'])->name('privacy.policy');
Route::get('help', [HomeOtherController::class, 'help'])->name('help');

Route::post('contact/store', [ContactController::class, 'store'])->name('contact.store');

Route::get('add-to-cart/{commodity}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('update-cart', [CartController::class, 'update'])->name('cart.update');
Route::get('remove/{commodity}', [CartController::class, 'remove'])->name('cart.remove');

Route::prefix('dashboard')->group(function () {
    Route::middleware(['auth','admin'])->group(function () {
        Route::name('dashboard.')->group(function () {
            Route::resource('categories', DashboardCategoryController::class);
            Route::resource('sub-categories', DashboardSubCategoryController::class);
            Route::resource('commodities', DashboardCommodityController::class);
        });
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
        Route::resource('users', UserController::class);

        Route::get('contact/index', [ContactController::class, 'index'])->name('contact.index');
    });
});