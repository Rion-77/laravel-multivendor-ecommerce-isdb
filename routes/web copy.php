<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');


// Users
Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
Route::get('admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
Route::get('admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
Route::put('admin/users/{user}/', [UserController::class, 'update'])->name('admin.users.update');
Route::put('admin/users/{user}/', [UserController::class, 'update'])->name('admin.users.update');
Route::delete('admin/users/{user}/', [UserController::class, 'destroy'])->name('admin.users.destroy');
Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
// custom
Route::post('/admin/users/role/{role}', [UserController::class, 'roleIndex'])->name('admin.users.roleIndex');

// Products
// Route::get('/admin/products' , function () {
//     return view('admin.products.index');
// })->name('admin.products.index');

// Route::get('/admin/products/create' , function () {
//     return view('admin.products.create');
// })->name('admin.products.create');
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('vendors', VendorController::class);
});

// Categories
Route::get('/admin/categories', function () {
    return view('admin.categories.index');
})->name('admin.categories.index');

// Vendors
// Route::get('/admin/vendors', function () {
//     return view('admin.vendors.index');
// })->name('admin.vendors.index');

// Route::get('/admin/vendors/single', function () {
//     return view('admin.vendors.show');
// })->name('admin.vendors.show');

// Route::get('/admin/vendors/create', function () {
//     return view('admin.vendors.create');
// })->name('admin.vendors.create');

// Oders
Route::get('/admin/orders', function () {
    return view('admin.orders.index');
})->name('admin.orders.index');

Route::get('/admin/orders/single', function () {
    return view('admin.orders.show');
})->name('admin.orders.show');
