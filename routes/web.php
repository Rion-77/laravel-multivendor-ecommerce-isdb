<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// Products
Route::get('/admin/products' , function () {
    return view('admin.products.index');
})->name('admin.products.index');

Route::get('/admin/products/create' , function () {
    return view('admin.products.create');
})->name('admin.products.create');

// Categories
Route::get('/admin/categories' , function () {
    return view('admin.categories.index');
})->name('admin.categories.index');

// Vendors
Route::get('/admin/vendors' , function () {
    return view('admin.vendors.index');
})->name('admin.vendors.index');

Route::get('/admin/vendors/single' , function () {
    return view('admin.vendors.show');
})->name('admin.vendors.show');

Route::get('/admin/vendors/create' , function () {
    return view('admin.vendors.create');
})->name('admin.vendors.create');

// Oders
Route::get('/admin/orders' , function () {
    return view('admin.orders.index');
})->name('admin.orders.index');

Route::get('/admin/orders/single' , function () {
    return view('admin.orders.show');
})->name('admin.orders.show');