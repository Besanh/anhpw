<?php

use App\Http\Controllers\Backend\Auth\RegisterController;
use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\Auth\ResetPasswordController;
use App\Http\Controllers\Backend\BillConsigneeController;
use App\Http\Controllers\Backend\BillController;
use App\Http\Controllers\Backend\BillCustomerController;
use App\Http\Controllers\Backend\BillDetailController;
use App\Http\Controllers\Backend\BillInvoiceController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CapaController;
use App\Http\Controllers\Backend\CateController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\HelpContentController;
use App\Http\Controllers\Backend\HelpController;
use App\Http\Controllers\Backend\HelpTypeController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\MenuTypeController;
use App\Http\Controllers\Backend\PriceController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\StoreController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\RevolutionSliderController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\SeoPageController;
use App\Http\Controllers\Backend\ShippingController;
use App\Http\Controllers\Frontend\ClearController;
use App\Http\Controllers\ProvinceController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

// Login & Register
Route::group(['prefix' => 'admin'], function () {
    // Login
    Route::get('login', [LoginController::class, 'showAdminLoginForm'])->name('admin-login');
    Route::post('post-admin-login', [LoginController::class, 'postAdminLogin'])->name('post-admin-login');
    Route::post('logout', [LoginController::class, 'adminLogout'])->name('admin-logout');

    // Register
    Route::get('register', [RegisterController::class, 'showAdminRegisterForm'])->name('admin-register');
    Route::post('create-admin', [RegisterController::class, 'createAdmin'])->name('create-admin')->middleware('admin.verified');

    // Reset password
    Route::get('password/reset', [ResetPasswordController::class, 'reset'])->name('admin.password.reset');

    // Verify
    Route::get('email/verify', function () {
        return view('admin.auth.verify');
    })->middleware('admin')->name('admin.verification.notice');
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect()->route('admin.default');
    })->middleware(['admin', 'signed'])->name('admin.verification.verify');
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    })->middleware(['admin', 'throttle:6,1'])->name('admin.verification.send');

    // Forgot password
    Route::get('/forgot-password', function () {
        return view('admin.forgot-password');
    })->middleware('guest')->name('admin.password.request');
});

// Backend
Route::group(['middleware' => ['admin'], 'prefix' => 'admin'], function () {
    $only_action_resource = ['index', 'create', 'update', 'store', 'show', 'edit'];

    // Home
    Route::get('dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('', [HomeController::class, 'index'])->name('admin.default');
    Route::get('chart-bill', [HomeController::class, 'getChartBill'])->name('chart-bill');
    Route::get('chart-top-view-product', [HomeController::class, 'getChartTopViewProduct'])->name('chart-top-view-product');

    // User
    Route::get('user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::resource('user', UserController::class)->only($only_action_resource);

    // Profile
    Route::get('profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');

    // Role
    Route::get('role/destroy/{id}', [RoleController::class, 'destroy'])->name('role.destroy');
    Route::resource('role', RoleController::class)->only($only_action_resource);

    // Permission
    Route::get('permission/destroy/{id}', [PermissionController::class, 'destroy'])->name('permission.destroy');
    Route::resource('permission', PermissionController::class)->only($only_action_resource);

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
    Route::get('price/update-status/{id}', [PriceController::class, 'updateStatus'])->name('price.status');
    Route::get('price/destroy/{id}', [PriceController::class, 'destroy'])->name('price.destroy');
    Route::get('price/select-product', [PriceController::class, 'selectProduct'])->name('price.select-product');
    Route::get('price/select-capa', [PriceController::class, 'selectCapa'])->name('price.select-capa');
    Route::resource('price', PriceController::class)->only($only_action_resource);

    // Store
    Route::get('store/update-status/{id}', [StoreController::class, 'updateStatus'])->name('store.status');
    Route::get('store/destroy/{id}', [StoreController::class, 'destroy'])->name('store.destroy');
    Route::resource('store', StoreController::class)->only($only_action_resource);

    // Blog
    Route::get('blog/update-status/{id}', [BlogController::class, 'updateStatus'])->name('blog.status');
    Route::get('blog/destroy/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');
    Route::resource('blog', BlogController::class)->only($only_action_resource);

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

    // Bill Consignee
    Route::get('bill-consignee', [BillConsigneeController::class, 'index'])->name('bill-consignee.index');

    // Bill Customer
    Route::get('bill-customer', [BillCustomerController::class, 'index'])->name('bill-customer.index');

    // Bill Invoice
    Route::get('bill-invoice', [BillInvoiceController::class, 'index'])->name('bill-invoice.index');

    // Help
    Route::get('help/update-status/{id}', [HelpController::class, 'updateStatus'])->name('help.status');
    Route::get('help/destroy/{id}', [HelpController::class, 'destroy'])->name('help.destroy');
    Route::resource('help', HelpController::class)->only($only_action_resource);

    // Help type
    Route::get('help-type/update-status/{id}', [HelpTypeController::class, 'updateStatus'])->name('help-type.status');
    Route::get('help-type/destroy/{id}', [HelpTypeController::class, 'destroy'])->name('help-type.destroy');
    Route::resource('help-type', HelpTypeController::class)->only($only_action_resource);

    // Help content
    Route::get('help-content/view-topic/{help_id}', [HelpContentController::class, 'viewTopic'])->name('help-content.view-topic')->whereNumber(['help_id']);
    Route::get('help-content/update-status/{id}', [HelpContentController::class, 'updateStatus'])->name('help-content.status');
    Route::get('help-content/destroy/{id}', [HelpContentController::class, 'destroy'])->name('help-content.destroy');
    Route::get('help-content/create/{help_id?}', [HelpContentController::class, 'create'])->name('help-content.create')->whereNumber(['help_id']);
    Route::get('help-content/{help_content}/edit/{help_id?}', [HelpContentController::class, 'edit'])->name('help-content.edit')->whereNumber(['help_id']);
    Route::get('help-content/{help_content}/show/{help_id?}', [HelpContentController::class, 'show'])->name('help-content.show')->whereNumber(['help_id']);
    Route::resource('help-content', HelpContentController::class)->only('index', 'update', 'store');

    // Contact
    Route::get('contact/{contact}/chat', [ContactController::class, 'chat'])->name('contact.chat');
    Route::post('contact/{contact}/post-chat', [ContactController::class, 'postChat'])->name('contact.post-chat');
    Route::get('contact/update-status/{id}', [ContactController::class, 'updateStatus'])->name('contact.status');
    Route::get('contact/destroy/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');
    Route::resource('contact', ContactController::class)->only($only_action_resource);
});
