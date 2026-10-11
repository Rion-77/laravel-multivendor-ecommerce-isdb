<?php

use App\Http\Controllers\Api\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\Api\Frontend\HomeController as FrontendHomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

//Frontend Api

// Route::apiResource('products', ProductController::class);

Route::get('frontend/home', [FrontendHomeController::class, 'index']);
Route::get('frontend/products', [FrontendProductController::class, 'index']);
Route::get('frontend/products/{product}', [FrontendProductController::class, 'show']);