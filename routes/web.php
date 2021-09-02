<?php

use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\MenuTypeController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Livewire\Select2Dropdown;
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
    Route::resource('menu', MenuController::class);
    Route::resource('menu-type', MenuTypeController::class);
});
// Route::get('/', Select2Dropdown::class);