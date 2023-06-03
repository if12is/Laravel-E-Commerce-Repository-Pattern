<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register dashboard routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "dashboard" middleware group. Make something great!
|
*/

Route::group([
    'middleware' => ['auth:admin'],
    'as' => 'admin.',
    'prefix' => 'admin/dashboard',
], function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::get('/settings', function () {
        return view('admin.settings.index');
    })->name('settings');
    Route::put('/settings/{setting}/update', [SettingController::class, 'update'])->name('settings.update');
    Route::resource('categories', CategoryController::class)->except(['show', 'create']);
    Route::delete('/categories/delete', [CategoryController::class, 'destroy'])->name('categories.delete');
    Route::resource('products', ProductController::class)->except(['show']);
    Route::delete('/products/delete', [ProductController::class, 'destroy'])->name('products.delete');
    Route::get('/user/getAllUsers', [UserController::class, 'getAllUsers'])->name('users.getAllUsers');
    Route::get('/category/getallcategories', [CategoryController::class, 'getAllCategories'])->name('cat.getallcategories');
    Route::get('/product/getallproducts', [ProductController::class, 'getAllProducts'])->name('prod.getallproducts');
    Route::resource('users', UserController::class);
});
