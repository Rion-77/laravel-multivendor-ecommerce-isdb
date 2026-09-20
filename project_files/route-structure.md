# Multivendor E-Commerce — Route & Link Structure

Conventions used:
- `admin.*` — admin panel routes (prefix `/admin`, middleware `auth:admin` or `role:admin`)
- `vendor.*` — vendor dashboard routes (prefix `/vendor`, middleware `auth:vendor`)
- `frontend.*` (or unprefixed `web`) — customer storefront routes
- Route name mirrors view path: `admin.users.index` → `resources/views/admin/users/index.blade.php`

---

## 1. Frontend (Customer Storefront)

| URL | Route Name | Controller@Method | View |
|---|---|---|---|
| `/` | `home` | `Frontend\HomeController@index` | `frontend.home` |
| `/products` | `products.index` | `Frontend\ProductController@index` | `frontend.products.index` |
| `/products/{slug}` | `products.show` | `Frontend\ProductController@show` | `frontend.products.show` |
| `/categories/{slug}` | `categories.show` | `Frontend\CategoryController@show` | `frontend.categories.show` |
| `/cart` | `cart.index` | `Frontend\CartController@index` | `frontend.cart.index` |
| `/cart/add/{product}` | `cart.add` | `Frontend\CartController@add` | — |
| `/cart/update/{id}` | `cart.update` | `Frontend\CartController@update` | — |
| `/cart/remove/{id}` | `cart.remove` | `Frontend\CartController@remove` | — |
| `/checkout` | `checkout.index` | `Frontend\CheckoutController@index` | `frontend.checkout.index` |
| `/checkout/store` | `checkout.store` | `Frontend\CheckoutController@store` | — |
| `/orders` | `orders.index` | `Frontend\OrderController@index` | `frontend.orders.index` |
| `/orders/{order}` | `orders.show` | `Frontend\OrderController@show` | `frontend.orders.show` |
| `/wishlist` | `wishlist.index` | `Frontend\WishlistController@index` | `frontend.wishlist.index` |
| `/vendors/{slug}` | `vendors.show` | `Frontend\VendorController@show` | `frontend.vendors.show` |
| `/search?q=` | `search` | `Frontend\SearchController@index` | `frontend.search` |
| `/login` | `login` | `Frontend\Auth\LoginController@create` | `frontend.auth.login` |
| `/register` | `register` | `Frontend\Auth\RegisterController@create` | `frontend.auth.register` |
| `/profile` | `profile.edit` | `Frontend\ProfileController@edit` | `frontend.profile.edit` |
| `/logout` | `logout` | `Frontend\Auth\LoginController@destroy` | — |

---

## 2. Admin Panel (prefix: `/admin`, name prefix: `admin.`)

| URL | Route Name | Controller@Method | View |
|---|---|---|---|
| `/admin/login` | `admin.login` | `Admin\Auth\LoginController@create` | `admin.auth.login` |
| `/admin/dashboard` | `admin.dashboard` | `Admin\DashboardController@index` | `admin.dashboard` |
| `/admin/users` | `admin.users.index` | `Admin\UserController@index` | `admin.users.index` |
| `/admin/users/create` | `admin.users.create` | `Admin\UserController@create` | `admin.users.create` |
| `/admin/users/{user}/edit` | `admin.users.edit` | `Admin\UserController@edit` | `admin.users.edit` |
| `/admin/vendors` | `admin.vendors.index` | `Admin\VendorController@index` | `admin.vendors.index` |
| `/admin/vendors/{vendor}/approve` | `admin.vendors.approve` | `Admin\VendorController@approve` | — |
| `/admin/products` | `admin.products.index` | `Admin\ProductController@index` | `admin.products.index` |
| `/admin/products/{product}/edit` | `admin.products.edit` | `Admin\ProductController@edit` | `admin.products.edit` |
| `/admin/categories` | `admin.categories.index` | `Admin\CategoryController@index` | `admin.categories.index` |
| `/admin/orders` | `admin.orders.index` | `Admin\OrderController@index` | `admin.orders.index` |
| `/admin/orders/{order}` | `admin.orders.show` | `Admin\OrderController@show` | `admin.orders.show` |
| `/admin/payouts` | `admin.payouts.index` | `Admin\PayoutController@index` | `admin.payouts.index` |
| `/admin/reviews` | `admin.reviews.index` | `Admin\ReviewController@index` | `admin.reviews.index` |
| `/admin/coupons` | `admin.coupons.index` | `Admin\CouponController@index` | `admin.coupons.index` |
| `/admin/settings` | `admin.settings.index` | `Admin\SettingController@index` | `admin.settings.index` |
| `/admin/logout` | `admin.logout` | `Admin\Auth\LoginController@destroy` | — |

---

## 3. Vendor Dashboard (prefix: `/vendor`, name prefix: `vendor.`)

| URL | Route Name | Controller@Method | View |
|---|---|---|---|
| `/vendor/login` | `vendor.login` | `Vendor\Auth\LoginController@create` | `vendor.auth.login` |
| `/vendor/register` | `vendor.register` | `Vendor\Auth\RegisterController@create` | `vendor.auth.register` |
| `/vendor/dashboard` | `vendor.dashboard` | `Vendor\DashboardController@index` | `vendor.dashboard` |
| `/vendor/products` | `vendor.products.index` | `Vendor\ProductController@index` | `vendor.products.index` |
| `/vendor/products/create` | `vendor.products.create` | `Vendor\ProductController@create` | `vendor.products.create` |
| `/vendor/products/{product}/edit` | `vendor.products.edit` | `Vendor\ProductController@edit` | `vendor.products.edit` |
| `/vendor/orders` | `vendor.orders.index` | `Vendor\OrderController@index` | `vendor.orders.index` |
| `/vendor/orders/{order}` | `vendor.orders.show` | `Vendor\OrderController@show` | `vendor.orders.show` |
| `/vendor/earnings` | `vendor.earnings.index` | `Vendor\EarningController@index` | `vendor.earnings.index` |
| `/vendor/reviews` | `vendor.reviews.index` | `Vendor\ReviewController@index` | `vendor.reviews.index` |
| `/vendor/profile` | `vendor.profile.edit` | `Vendor\ProfileController@edit` | `vendor.profile.edit` |
| `/vendor/logout` | `vendor.logout` | `Vendor\Auth\LoginController@destroy` | — |

---

## 4. Matching Route Files (registered via `bootstrap/app.php`)

```
routes/
├── web.php          → frontend/customer routes
├── admin.php         → admin.* routes, prefix('admin'), name('admin.')
├── vendor.php         → vendor.* routes, prefix('vendor'), name('vendor.')
├── api.php
└── console.php
```

```php
// bootstrap/app.php
->withRouting(
    web: __DIR__.'/../routes/web.php',
    api: __DIR__.'/../routes/api.php',
    commands: __DIR__.'/../routes/console.php',
    then: function () {
        Route::middleware('web')
            ->prefix('admin')
            ->name('admin.')
            ->group(base_path('routes/admin.php'));

        Route::middleware('web')
            ->prefix('vendor')
            ->name('vendor.')
            ->group(base_path('routes/vendor.php'));
    },
)
```

## 5. Blade Link Examples

```blade
{{-- frontend --}}
<a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>

{{-- admin --}}
<a href="{{ route('admin.users.edit', $user) }}">Edit</a>

{{-- vendor --}}
<a href="{{ route('vendor.products.create') }}">Add Product</a>
```

---

**Note:** table field/route names above are a suggested baseline — rename resources (`payouts`, `coupons`, etc.) to match whatever features your project actually implements. Keep route names, view folder names, and controller namespaces mirrored 1:1 across all three sections for consistency.
