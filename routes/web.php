<?php

use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CapaController;
use App\Http\Controllers\Backend\CateController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\MenuTypeController;
use App\Http\Controllers\Backend\PriceController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\StoreController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ProvinceController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {
    $only_action_resource = ['index', 'create', 'update', 'store', 'show', 'edit'];

    // Menu
    Route::get('menu/{alias}', [MenuController::class, 'index'])->name('menu.index');
    Route::get('menu/create/{alias}', [MenuController::class, 'create'])->name('menu.create');
    Route::post('menu/store', [MenuController::class, 'store'])->name('menu.store');
    Route::get('menu/edit/{alias}/{id}', [MenuController::class, 'edit'])->name('menu.edit');
    Route::put('menu/update/{id}', [MenuController::class, 'update'])->name('menu.update');
    Route::get('menu/show/{alias}/{id}', [MenuController::class, 'show'])->name('menu.show');
    Route::get('menu/destroy/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
    Route::get('menu/find-menu-type/{alias}', [MenuController::class, 'findMenuType']);
    Route::get('menu-get-type/{type_id}', [MenuController::class, 'getType']);
    Route::get('menu/update-status/{id}', [MenuController::class, 'updateStatus'])->name('menu.status');
    Route::get('menu/destroy/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');

    // Menu type
    Route::resource('menu-type', MenuTypeController::class)->only($only_action_resource);
    Route::get('menu-type/update-status/{id}', [MenuTypeController::class, 'updateStatus'])->name('menu-type.status');
    Route::get('menu-type/destroy/{id}', [MenuTypeController::class, 'destroy'])->name('menu-type.destroy');

    // User
    Route::resource('user', UserController::class)->only($only_action_resource);
    Route::get('user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    // Province
    Route::resource('province', ProvinceController::class)->only($only_action_resource);
    Route::get('province/update-status/{id}', [ProvinceController::class, 'updateStatus'])->name('province.status');
    Route::get('province/destroy/{id}', [ProvinceController::class, 'destroy'])->name('province.destroy');

    // District
    Route::resource('district', DistrictController::class)->only($only_action_resource);
    Route::get('district/update-status/{id}', [DistrictController::class, 'updateStatus'])->name('district.status');
    Route::get('district/destroy/{id}', [DistrictController::class, 'destroy'])->name('district.destroy');

    // Brand
    Route::resource('brand', BrandController::class)->only($only_action_resource);
    Route::get('brand/update-status/{id}', [BrandController::class, 'updateStatus'])->name('brand.status');
    Route::get('brand/destroy/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');

    // Product
    Route::resource('capa', CapaController::class)->only($only_action_resource);
    Route::get('capa/update-status/{id}', [CapaController::class, 'updateStatus'])->name('capa.status');
    Route::get('capa/destroy/{id}', [CapaController::class, 'destroy'])->name('capa.destroy');

    // Category
    Route::resource('category', CateController::class)->only($only_action_resource);
    Route::get('category/update-status/{id}', [CateController::class, 'updateStatus'])->name('category.status');
    Route::get('category/destroy/{id}', [CateController::class, 'destroy'])->name('category.destroy');

    // Product
    Route::resource('product', ProductController::class)->only($only_action_resource);
    Route::get('product/update-status/{id}', [ProductController::class, 'updateStatus'])->name('product.status');
    Route::get('product/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

    // Price
    Route::resource('price', PriceController::class)->only($only_action_resource);
    Route::get('price/update-status/{id}', [PriceController::class, 'updateStatus'])->name('price.status');
    Route::get('price/destroy/{id}', [PriceController::class, 'destroy'])->name('price.destroy');
    Route::get('price/select-product', [PriceController::class, 'selectProduct'])->name('price.select-product');
    Route::get('price/select-capa', [PriceController::class, 'selectCapa'])->name('price.select-capa');

    // Store
    Route::resource('store', StoreController::class)->only($only_action_resource);
    Route::get('store/update-status/{id}', [StoreController::class, 'updateStatus'])->name('store.status');
    Route::get('store/destroy/{id}', [StoreController::class, 'destroy'])->name('store.destroy');

    // Blog
    Route::resource('blog', BlogController::class)->only($only_action_resource);
    Route::get('blog/update-status/{id}', [BlogController::class, 'updateStatus'])->name('blog.status');
    Route::get('blog/destroy/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');

    // Setting
    Route::resource('setting', SettingController::class)->only($only_action_resource);
    Route::get('setting/update-status/{id}', [SettingController::class, 'updateStatus'])->name('setting.status');
    Route::get('setting/destroy/{id}', [SettingController::class, 'destroy'])->name('setting.destroy');
});

// CkFiner
Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
    ->name('ckfinder_connector');
Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
    ->name('ckfinder_browser');

Route::get('home', [HomeController::class, 'index'])->name('frontend.home');