<?php

use App\Http\Controllers\Api\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\Api\Frontend\VendorController as FrontendVendorController;
use App\Http\Controllers\Api\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Api\Frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Api\Frontend\OrderController as FrontendOrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

/////////////////////////////////
//Frontend Api

// Route::apiResource('products', ProductController::class);

//Home
Route::get('frontend/home', [FrontendHomeController::class, 'index']);

//Category
Route::get('frontend/categories', [FrontendCategoryController::class, 'index']);
Route::get('frontend/categories/{category}', [FrontendCategoryController::class, 'show']);

//Products
Route::get('frontend/products', [FrontendProductController::class, 'index']);
Route::get('frontend/products/{product}', [FrontendProductController::class, 'show']);

//Vendors
Route::get('frontend/vendors', [FrontendVendorController::class, 'index']);
Route::get('frontend/vendors/{vendor}', [FrontendVendorController::class, 'show']);

// Orders
Route::post('frontend/orders', [FrontendOrderController::class, 'store']);
Route::get('frontend/orders/{order}', [FrontendOrderController::class, 'show']);