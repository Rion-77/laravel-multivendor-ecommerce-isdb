<?php

use App\Http\Controllers\Api\Backend\ProductController as BackendProductController;
use App\Http\Controllers\Api\Backend\BrandController as BackendBrandController;
use App\Http\Controllers\Api\Backend\CategoryController as BackendCategoryController;
use App\Http\Controllers\Api\Backend\OrderController as BackendOrderController;
use App\Http\Controllers\Api\Backend\OrderStatusController as BackendOrderStatusController;
use App\Http\Controllers\Api\Backend\RoleController as BackendRoleController;
use App\Http\Controllers\Api\Backend\UserController as BackendUserController;
use App\Http\Controllers\Api\Backend\VendorController as BackendVendorController;
use App\Http\Controllers\Api\Frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Api\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Api\Frontend\OrderController as FrontendOrderController;
use App\Http\Controllers\Api\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\Api\Frontend\SearchController as FrontendSearchController;
use App\Http\Controllers\Api\Frontend\VendorController as FrontendVendorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// ///////////////////////////////
// Frontend Api

// Route::apiResource('products', ProductController::class);

// Home
Route::get('frontend/home', [FrontendHomeController::class, 'index']);

// Search
Route::get('frontend/search', [FrontendSearchController::class, 'index']);

// Category
Route::get('frontend/categories', [FrontendCategoryController::class, 'index']);
Route::get('frontend/categories/{category}', [FrontendCategoryController::class, 'show']);

// Products
Route::get('frontend/products', [FrontendProductController::class, 'index']);
Route::get('frontend/products/{product}', [FrontendProductController::class, 'show']);

// Vendors
Route::get('frontend/vendors', [FrontendVendorController::class, 'index']);
Route::get('frontend/vendors/{vendor}', [FrontendVendorController::class, 'show']);

// Orders
Route::post('frontend/orders', [FrontendOrderController::class, 'store']);
Route::get('frontend/orders/{order}', [FrontendOrderController::class, 'show']);

// ///////////////////////////////
// Backend Api

Route::prefix('backend')->group(function () {
    Route::apiResource('products', BackendProductController::class)->except('destroy');
    Route::delete('products/{product}', [BackendProductController::class, 'destroy']);

    Route::apiResource('categories', BackendCategoryController::class)->only('index');
    Route::delete('categories/{category}', [BackendCategoryController::class, 'destroy']);

    Route::apiResource('vendors', BackendVendorController::class)->only('index');
    Route::delete('vendors/{vendor}', [BackendVendorController::class, 'destroy']);

    Route::apiResource('brands', BackendBrandController::class)->only('index');
    Route::delete('brands/{brand}', [BackendBrandController::class, 'destroy']);

    Route::apiResource('orders', BackendOrderController::class)->only(['index', 'show', 'update', 'destroy']);
    Route::apiResource('order-statuses', BackendOrderStatusController::class)->only(['index', 'destroy']);
    Route::apiResource('roles', BackendRoleController::class)->only(['index', 'destroy']);
    Route::apiResource('users', BackendUserController::class)->only(['index', 'destroy']);
    Route::get('customers', [BackendUserController::class, 'customers']);
    Route::delete('customers/{customer}', [BackendUserController::class, 'destroyCustomer']);
});
