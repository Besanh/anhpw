<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\MenuTypeController;
use App\Http\Controllers\Backend\SideBarController;
use App\Http\Controllers\Backend\UserController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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

    // Sidebar backend
    Route::get('setting-menu', [SideBarController::class, 'settingMenu'])->name('setting.menu');

    // User
    Route::resource('user', UserController::class)->only($only_action_resource);
    Route::get('user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    // Province
    Route::resource('province', ProvinceController::class)->only($only_action_resource);
    Route::get('province/update-status/{id}', [ProvinceController::class, 'updateStatus'])->name('province.status');
    Route::get('province/destroy/{id}', [ProvinceController::class, 'destroy'])->name('province.destroy');
});
