<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\Frontend\VendorController as FrontendVendorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Frontend\OrderController as FrontendOrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

///////////////////////////////////
// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('homepage');

// Product Routes
Route::get('/products', [FrontendProductController::class, 'index'])->name('frontend.products.index');
Route::get('/products/{product}', [FrontendProductController::class, 'show'])->name('frontend.products.show');
// Vendor Routes
Route::get('/vendors', [FrontendVendorController::class, 'index'])->name('frontend.vendors.index');
Route::get('/vendors/{vendor}', [FrontendVendorController::class, 'show'])->name('frontend.vendors.show');
Route::get('/become-vendor', function () {
    return view('frontend.become-vendor');
})->name('become-vendor');
Route::get('/contact-us', function () {
    return view('frontend.contact');
})->name('contact-us');
Route::get('/cart', function () {
    return view('frontend.cart');
})->name('cart');
Route::get('/checkout', function () {
    return view('frontend.checkout');
})->name('checkout');

// Order Routes
Route::post('/order', [FrontendOrderController::class, 'store'])->name('frontend.orders.store');

Route::get('/order-confirmed', function () {

    if (!session('success')) {
        return redirect()->route('cart');
    }
    return view('frontend.order-confirmed');
})->name('frontend.order-confirmed');


// Route::group(['prefix' => 'frontend', 'as' => 'frontend.'], function () {
//         Route::resource('orders', FrontendOrderController::class);
// });


///////////////////////////////////
// Admin Routes
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::middleware('auth', 'role_id:1')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::resource('users', UserController::class);
        Route::resource('products', ProductController::class);
        Route::resource('vendors', VendorController::class);
        Route::resource('orders', OrderController::class);
    });

    // Categories
    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/admin/brands', [BrandController::class, 'index'])->name('admin.brands.index');

    // Oders
    /* Route::get('/admin/orders', function () {
        return view('admin.orders.index');
    })->name('admin.orders.index');

    Route::get('/admin/orders/single', function () {
        return view('admin.orders.show');
    })->name('admin.orders.show'); */

    // Custom
    Route::post('/admin/users/role/{role}', [UserController::class, 'roleIndex'])->name('admin.users.roleIndex');
});

///////////////////////////////////
// Vendor Routes
Route::middleware('auth', 'role_id:1,3')->group(function () {

    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::resource('products', ProductController::class);
        // Route::resource('vendors', VendorController::class);
    });

    Route::get("admin/vendors/{vendor}", [VendorController::class, 'show'])->name('admin.vendors.show');
});

require __DIR__ . '/auth.php';
