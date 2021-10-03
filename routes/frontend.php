<?php

use App\Http\Controllers\Frontend\HelpController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\LoginController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\SignupController;
use App\Http\Controllers\Frontend\StoreController;
use App\Http\Controllers\Frontend\WishListController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', [HomeController::class, 'index'])->name('frontend.home');

Route::get('home', [HomeController::class, 'index'])->name('frontend.home');

// Top bar
Route::get('stores', [StoreController::class, 'index'])->name('stores');
Route::get('help', [HelpController::class, 'index'])->name('help');
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::get('signup', [SignupController::class, 'index'])->name('signup');
Route::get('wish-list', [WishListController::class, 'index'])->name('wish-list');
Route::get('order', [OrderController::class, 'index'])->name('order');
