<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

/* 
Route::middleware('auth', 'role_id:1,2,3,4')->group(function () {
    Route::resource('products', ProductController::class);
});

Route::get('/dashboard', function () {
    return view('admin.pages.dashboard');
})->middleware(['auth', 'verified', 'role_id:1,2,3,4'])->name('dashboard');

auth()->user()->name

auth()->user()->role_id != 5
*/

Route::get('/', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::resource('users', UserController::class);
        Route::resource('products', ProductController::class);
        Route::resource('vendors', VendorController::class);
    });

    // Categories
    Route::get('/admin/categories', function () {
        return view('admin.categories.index');
    })->name('admin.categories.index');


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

require __DIR__ . '/auth.php';
