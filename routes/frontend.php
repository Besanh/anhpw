<?php

use App\Http\Controllers\Frontend\CateController;
use App\Http\Controllers\Frontend\CommingSoonController;
use App\Http\Controllers\Frontend\HelpController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\LoginController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\SignupController;
use App\Http\Controllers\Frontend\StoreController;
use App\Http\Controllers\Frontend\TestController;
use App\Http\Controllers\Frontend\WishListController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', [HomeController::class, 'index'])->name('frontend.default');
Route::get('home', [HomeController::class, 'index'])->name('frontend.home');

// Top bar
Route::get('stores', [StoreController::class, 'index'])->name('stores');
Route::get('help', [HelpController::class, 'index'])->name('help');
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::get('signup', [SignupController::class, 'index'])->name('signup');
Route::get('wish-list', [WishListController::class, 'index'])->name('wish-list');
Route::get('order', [OrderController::class, 'index'])->name('order');

// Cate
Route::get('cate/{alias}/{limit?}', [CateController::class, 'getCate'])->where(['limit' => '[0-9]+'])->name('cate');
Route::post('post-filter', [CateController::class, 'postFilter'])->name('post-filter-cate');
Route::get('get-filter/{alias}', [CateController::class, 'getFilter'])->where(['limit' => '[0-9]+'])->name('get-filter-cate');

// Comming soon
Route::get('comming-soon', [CommingSoonController::class, 'index'])->name('comming-soon');

// Test
Route::get('test/index', [TestController::class, 'index'])->name('text-index');
