<?php

use App\Http\Controllers\Backend\Auth\RegisterController;
use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\Auth\ResetPasswordController;
use App\Http\Controllers\Backend\BillController;
use App\Http\Controllers\Backend\BillDetailController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CapaController;
use App\Http\Controllers\Backend\CateController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\MenuTypeController;
use App\Http\Controllers\Backend\PriceController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\StoreController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\RevolutionSliderController;
use App\Http\Controllers\Backend\SeoPageController;
use App\Http\Controllers\Backend\ShippingController;
use App\Http\Controllers\Frontend\ClearController;
use App\Http\Controllers\ProvinceController;
use Illuminate\Support\Facades\Route;

// Login & Register
Route::group(['prefix' => 'admin'], function () {
    // Login
    Route::get('login', [LoginController::class, 'showAdminLoginForm'])->name('admin-login');
    Route::post('post-admin-login', [LoginController::class, 'postAdminLogin'])->name('post-admin-login');
    Route::post('logout', [LoginController::class, 'adminLogout'])->name('admin-logout');

    // Register
    Route::get('register', [RegisterController::class, 'showAdminRegisterForm'])->name('admin-register');
    Route::post('create-admin', [RegisterController::class, 'createAdmin'])->name('create-admin');

    // Reset password
    Route::get('password/reset', [ResetPasswordController::class, 'reset'])->name('password.reset');
});
// Backend
Route::group(['middleware' => ['admin'], 'prefix' => 'admin'], function () {
    $only_action_resource = ['index', 'create', 'update', 'store', 'show', 'edit'];

    // Home
    Route::get('dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

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
    Route::get('menu-type/update-status/{id}', [MenuTypeController::class, 'updateStatus'])->name('menu-type.status');
    Route::get('menu-type/destroy/{id}', [MenuTypeController::class, 'destroy'])->name('menu-type.destroy');
    Route::resource('menu-type', MenuTypeController::class)->only($only_action_resource);

    // User
    Route::get('user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::resource('user', UserController::class)->only($only_action_resource);

    // Province
    Route::get('province/update-status/{id}', [ProvinceController::class, 'updateStatus'])->name('province.status');
    Route::get('province/destroy/{id}', [ProvinceController::class, 'destroy'])->name('province.destroy');
    Route::resource('province', ProvinceController::class)->only($only_action_resource);

    // District
    Route::get('district/update-status/{id}', [DistrictController::class, 'updateStatus'])->name('district.status');
    Route::get('district/destroy/{id}', [DistrictController::class, 'destroy'])->name('district.destroy');
    Route::resource('district', DistrictController::class)->only($only_action_resource);

    // Brand
    Route::get('brand/update-status/{id}', [BrandController::class, 'updateStatus'])->name('brand.status');
    Route::get('brand/destroy/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');
    Route::resource('brand', BrandController::class)->only($only_action_resource);

    // Product
    Route::get('capa/update-status/{id}', [CapaController::class, 'updateStatus'])->name('capa.status');
    Route::get('capa/destroy/{id}', [CapaController::class, 'destroy'])->name('capa.destroy');
    Route::resource('capa', CapaController::class)->only($only_action_resource);

    // Category
    Route::get('category/update-status/{id}', [CateController::class, 'updateStatus'])->name('category.status');
    Route::get('category/destroy/{id}', [CateController::class, 'destroy'])->name('category.destroy');
    Route::resource('category', CateController::class)->only($only_action_resource);

    // Product
    Route::get('product/update-status/{id}', [ProductController::class, 'updateStatus'])->name('product.status');
    Route::get('product/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::resource('product', ProductController::class)->only($only_action_resource);

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
    Route::get('setting/update-status/{id}', [SettingController::class, 'updateStatus'])->name('setting.status');
    Route::get('setting/destroy/{id}', [SettingController::class, 'destroy'])->name('setting.destroy');
    Route::get('setting/field-text', [SettingController::class, 'fieldText'])->name('setting.field-text');
    Route::get('setting/field-json', [SettingController::class, 'fieldJson'])->name('setting.field-json');
    Route::get('setting/field-image', [SettingController::class, 'fieldImage'])->name('setting.field-image');
    Route::resource('setting', SettingController::class)->only($only_action_resource);

    // Revolution Slider
    Route::get('revolution-slider/update-status/{id}', [RevolutionSliderController::class, 'updateStatus'])->name('revolution-slider.status');
    Route::get('revolution-slider/destroy/{id}', [RevolutionSliderController::class, 'destroy'])->name('revolution-slider.destroy');
    Route::get('revolution-slider/field-{txtField}', [RevolutionSliderController::class, 'fieldChange'])->name('revolution-slider.field-change')
        ->whereAlpha('txtField');
    Route::post('revolution-slider/sort-slide', [RevolutionSliderController::class, 'sortSlide'])->name('revolution-slider.sort-slide');
    Route::resource('revolution-slider', RevolutionSliderController::class)->only($only_action_resource);

    // Seo page
    Route::get('seo-page/destroy/{id}', [SeoPageController::class, 'destroy'])->name('seo-page.destroy');
    Route::resource('seo-page', SeoPageController::class)->only($only_action_resource);

    // Shipping
    Route::get('shipping-fee/update-status/{id}', [ShippingController::class, 'updateStatus'])->name('shipping-fee.status');
    Route::get('shipping-fee/destroy/{id}', [ShippingController::class, 'destroy'])->name('shipping-fee.destroy');
    Route::resource('shipping-fee', ShippingController::class)->only($only_action_resource);

    // Cache
    Route::get('clear-admin', [ClearController::class, 'clearCacheAdmin'])->name('clear-admin');

    // Bill
    Route::get('bill/destroy/{id}', [BillController::class, 'destroy'])->name('bill.destroy');
    Route::resource('bill', BillController::class)->only($only_action_resource);

    // Bill detail
    Route::post('bill-detail/editable-customer', [BillDetailController::class, 'editableCustomer'])->name('bill-detail.editable-customer');
    Route::post('bill-detail/editable-detail', [BillDetailController::class, 'editableDetail'])->name('bill-detail.editable-detail');
    Route::post('bill-detail/editable-consignee', [BillDetailController::class, 'editableConsignee'])->name('bill-detail.editable-consignee');
    Route::post('bill-detail/editable-invoice', [BillDetailController::class, 'editableInvoice'])->name('bill-detail.editable-invoice');
    Route::get('bill-detail/destroy/{id}', [BillDetailController::class, 'destroy'])->name('bill-detail.destroy');
    Route::resource('bill-detail', BillDetailController::class)->only($only_action_resource);
});
