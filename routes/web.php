<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', function () {
    $vendors = App\Models\Vendor::limit(4)->get();
    $products = App\Models\Product::with('category', 'brand', 'vendor')->orderBy('id', 'desc')->paginate(12);
    return view('frontend.home', compact('products', 'vendors'));
})->name('homepage');

Route::get('/products', [FrontendProductController::class, 'index'])->name('products.index');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Admin Routes
Route::middleware('auth', 'role_id:1')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::resource('users', UserController::class);
        Route::resource('products', ProductController::class);
        Route::resource('vendors', VendorController::class);
    });

    // Categories
    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/admin/brands', [BrandController::class, 'index'])->name('admin.brands.index');

    // Oders
    Route::get('/admin/orders', function () {
        return view('admin.orders.index');
    })->name('admin.orders.index');

    Route::get('/admin/orders/single', function () {
        return view('admin.orders.show');
    })->name('admin.orders.show');

    // Custom
    Route::post('/admin/users/role/{role}', [UserController::class, 'roleIndex'])->name('admin.users.roleIndex');
});

// Vendor Routes
Route::middleware('auth', 'role_id:1,3')->group(function () {

    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::resource('products', ProductController::class);
        // Route::resource('vendors', VendorController::class);
    });
    
    Route::get("admin/vendors/{vendor}", [VendorController::class, 'show'])->name('admin.vendors.show');
});

require __DIR__.'/auth.php';
