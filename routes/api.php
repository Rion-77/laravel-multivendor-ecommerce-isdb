<?php

use App\Http\Controllers\Api\Backend\ProductController as BackendProductController;
use App\Http\Controllers\Api\Backend\BrandController as BackendBrandController;
use App\Http\Controllers\Api\Backend\AuthController as BackendAuthController;
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
    Route::post('auth/login', [BackendAuthController::class, 'login'])->middleware('throttle:10,1');

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('auth/me', [BackendAuthController::class, 'me']);
        Route::post('auth/logout', [BackendAuthController::class, 'logout']);
        Route::get('profile', [BackendAuthController::class, 'profile'])->middleware('role_id:1,3');

        Route::middleware('role_id:1,3')->group(function () {
            Route::get('products/options', [BackendAuthController::class, 'productFormOptions']);
            Route::apiResource('products', BackendProductController::class);
        });

        Route::middleware('role_id:1')->group(function () {
            Route::get('vendors/options', [BackendVendorController::class, 'options']);
            Route::apiResource('categories', BackendCategoryController::class)
                ->only(['index', 'store', 'update', 'destroy']);
            Route::apiResource('vendors', BackendVendorController::class)
                ->only(['index', 'show', 'store', 'update', 'destroy']);
            Route::apiResource('brands', BackendBrandController::class)
                ->only(['index', 'store', 'update', 'destroy']);
            Route::apiResource('orders', BackendOrderController::class)->only(['index', 'show', 'update', 'destroy']);
            Route::apiResource('order-statuses', BackendOrderStatusController::class)->only(['index', 'destroy']);
            Route::apiResource('roles', BackendRoleController::class)
                ->only(['index', 'store', 'update', 'destroy']);
            Route::apiResource('users', BackendUserController::class)
                ->only(['index', 'store', 'update', 'destroy']);
            Route::get('customers', [BackendUserController::class, 'customers']);
            Route::delete('customers/{customer}', [BackendUserController::class, 'destroyCustomer']);
        });
    });
});
