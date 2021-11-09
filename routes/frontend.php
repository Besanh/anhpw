<?php

use App\Http\Controllers\Frontend\BrandController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CateController;
use App\Http\Controllers\Frontend\ClearController;
use App\Http\Controllers\Frontend\CommingSoonController;
use App\Http\Controllers\Frontend\HelpController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\LoginController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\SearchController;
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

// Product
Route::get('{brand_alias}/{id}-{product_alias}.html', [ProductController::class, 'index'])
    ->whereAlphaNumeric('brand_alias')
    ->whereNumber('id')
    // ->whereAlphaNumeric('product_alias')
    ->name('product-detail');

// Comming soon
Route::get('comming-soon', [CommingSoonController::class, 'index'])->name('comming-soon');

// Test
Route::get('test/index', [TestController::class, 'index'])->name('text-index');

// Typeahead js Search
Route::get('/autocomplete-search', [SearchController::class, 'autocompleteSearch'])->name('autocomplete-search');
Route::get('/search-product/product', [SearchController::class, 'searchByProduct'])->name('search-product');
Route::get('search-price/price', [SearchController::class, 'searchByPrice'])->name('search-price');
Route::get('search-cate/cate', [SearchController::class, 'searchByCate'])->name('search-cate');
Route::get('search-brand/brand', [SearchController::class, 'searchByBrand'])->name('search-brand');
Route::get('search-blog/blog', [SearchController::class, 'searchByBlog'])->name('search-blog');

// Brand
Route::get('list-brand', [BrandController::class, 'listBrand'])->name('list-brand');
Route::get('brand/{alias}', [BrandController::class, 'brandIndex'])->name('brand')->whereAlpha('alias');

// Clear cache
Route::get('clear-cache', [ClearController::class, 'clearCache'])->name('clear-cache');

// Cart
Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::get('cart/add/{id}/{selling_id?}', [CartController::class, 'addItem'])->name('cart.add')
    ->whereNumber(['id', 'selling_id']);
Route::get('cart/delete/{rowId}', [CartController::class, 'deleteItem'])->name('cart.delete');
Route::post('cart/post-cart', [CartController::class, 'postCart'])->name('cart.post-cart');
Route::get('cart/update/{rowId}', [CartController::class, 'updateItem'])->name('cart.update');
Route::get('cart/destroy', [CartController::class, 'destroyCart'])->name('cart.destroy');
