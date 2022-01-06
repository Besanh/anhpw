<?php

use App\Http\Controllers\Frontend\BrandController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CateController;
use App\Http\Controllers\Frontend\ClearController;
use App\Http\Controllers\Frontend\CommingSoonController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\GiftCardController;
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
use App\Http\Controllers\Frontend\PromotionController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', [HomeController::class, 'index'])->name('frontend.default');
Route::get('home', [HomeController::class, 'index'])->name('frontend.home');
Route::get('new-arrival', [PromotionController::class, 'newArrival'])->name('new-arrival');

// Top bar
Route::get('store', [StoreController::class, 'index'])->name('store');
Route::get('help/{alias}', [HelpController::class, 'index'])->name('help');
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::get('signup', [SignupController::class, 'index'])->name('signup');
Route::get('wish-list', [WishListController::class, 'index'])->name('wish-list');
Route::get('order', [OrderController::class, 'index'])->name('order');

// Cate
Route::post('post-filter', [CateController::class, 'postFilter'])->name('post-filter-cate');
Route::get('cate/{alias}/{limit?}', [CateController::class, 'getCate'])->where(['limit' => '[0-9]+'])->name('cate');
Route::get('get-filter/{alias}', [CateController::class, 'getFilter'])->where(['limit' => '[0-9]+'])->name('get-filter-cate');

// Product
Route::get('{brand_alias}/{id}-{product_alias}.html', [ProductController::class, 'index'])
    ->whereNumber('id')
    ->name('product-detail');
Route::get('click-capa-bind-info/{id}', [ProductController::class, 'clickCapaBindInfo'])->name('click-capa-bind-info');

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
Route::get('brand/{alias}', [BrandController::class, 'brandIndex'])->name('brand');

// Clear cache
Route::get('clear-cache', [ClearController::class, 'clearCache'])->name('clear-cache');

// Cart
Route::post('cart/save-cart', [CartController::class, 'saveCart'])->name('cart.save-cart');
Route::post('cart/post-cart', [CartController::class, 'postCart'])->name('cart.post-cart');
Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::get('cart/add/{id}/{qty?}/{selling_id?}', [CartController::class, 'addItem'])->name('cart.add')
    ->whereNumber(['id', 'qty', 'selling_id']);
Route::get('cart/delete/{rowId}', [CartController::class, 'deleteItem'])->name('cart.delete');
Route::get('cart/update/{rowId}', [CartController::class, 'updateItem'])->name('cart.update');
Route::get('cart/destroy', [CartController::class, 'destroyCart'])->name('cart.destroy');
Route::get('cart/get-district/{pr_id?}', [CartController::class, 'getDistrict'])->name('cart.get-district')
    ->whereNumber(['pr_id']);
Route::get('cart/get-province/{id?}', [CartController::class, 'getProvinceName'])->name('cart.get-province')
    ->whereNumber(['id']);
Route::get('cart/get-district-name/{id?}', [CartController::class, 'getDistrictName'])->name('cart.get-district-name')
    ->whereNumber(['id']);
Route::get('cart/complete/{bill_no}', [CartController::class, 'completeNotify'])->name('cart.complete');

// Contact
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact/post-contact', [ContactController::class, 'postContact'])->name('contact.post-contact');

// Gift Card
Route::get('gift-card', [GiftCardController::class, 'index'])->name('gift-card');
