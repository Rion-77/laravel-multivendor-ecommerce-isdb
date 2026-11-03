<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Enums\ProductStatus;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Product::query();
        if ((int) request()->user()->role_id === 3) {
            $query->whereIn('vendor_id', request()->user()->vendors()->select('id'));
        }

        $products = QueryBuilder::for($query)
            ->allowedFilters(
                'name',
                AllowedFilter::exact('category_id'),
                AllowedFilter::exact('vendor_id'),
                AllowedFilter::exact('status'),
                AllowedFilter::callback('min_price', function ($query, $value) {
                    $query->where('base_price', '>=', $value);
                }),
                AllowedFilter::callback('max_price', function ($query, $value) {
                    $query->where('base_price', '<=', $value);
                })
            )
            ->with('category:id,name', 'brand:id,name', 'vendor:id,shop_name')
            ->orderBy('created_at', 'desc')
            ->paginate(9)
            ->appends(request()->query());
        return response()->json([
            'success' => true,
            'products' => $products,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->validatedProductData($request);
        $data['slug'] = $this->uniqueProductSlug($data['name']);

        $product = new Product();
        if ((int) $request->user()->role_id === 3) {
            $vendorId = $request->user()->vendors()->value('id');
            abort_if(!$vendorId, 403, 'A vendor profile is required to manage products.');
            $data['vendor_id'] = $vendorId;
            $data['status'] = ProductStatus::PendingReview->value;
        }
        $this->fillProduct($product, $data);
        $product->save();
        $this->saveProductImages($request, $product);

        return response()->json([
            'success' => true,
            'product' => $product->load('category:id,name', 'brand:id,name', 'vendor:id,shop_name'),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $query = Product::with('category:id,name', 'brand:id,name', 'vendor:id,shop_name');
        if ((int) request()->user()->role_id === 3) {
            $query->whereIn('vendor_id', request()->user()->vendors()->select('id'));
        }
        $product = $query->findOrFail($id);
        
        return response()->json([
            'success' => true,
            'product' => $product,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $this->authorizeVendorProduct($request, $product);
        $data = $this->validatedProductData($request, $product);

        if ((int) $request->user()->role_id === 3) {
            unset($data['vendor_id'], $data['status']);
        }
        $this->fillProduct($product, $data);
        $product->save();
        $this->saveProductImages($request, $product);

        return response()->json([
            'success' => true,
            'product' => $product->load('category:id,name', 'brand:id,name', 'vendor:id,shop_name'),
        ], 200);
    }

    /**
     * Validate the persisted product fields and any replacement images.
     *
     * @return array<string, mixed>
     */
    private function validatedProductData(Request $request, ?Product $product = null): array
    {
        $rules = [
            'vendor_id' => (int) $request->user()->role_id === 3
                ? ['prohibited']
                : ['required', 'integer', Rule::exists(Vendor::class, 'id')],
            'category_id' => ['required', 'integer', Rule::exists(Category::class, 'id')],
            'brand_id' => ['required', 'integer', Rule::exists(Brand::class, 'id')],
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'description' => ['required', 'string', 'min:10', 'max:255'],
            'base_price' => ['required', 'numeric', 'min:0'],
            'offer_price' => ['required', 'numeric', 'min:0', 'lte:base_price'],
            'status' => (int) $request->user()->role_id === 3
                ? ['prohibited']
                : ['required', new Enum(ProductStatus::class)],
            'product_image' => ['sometimes', 'nullable', 'array'],
            'product_image.*' => ['image', 'mimes:jpeg,png,webp', 'max:2048'],
        ];

        if ($product) {
            $rules['slug'] = ['required', 'string', 'max:255', Rule::unique('products', 'slug')->ignore($product->id)];
        }

        return $request->validate($rules);
    }

    private function uniqueProductSlug(string $name): string
    {
        $baseSlug = Str::slug($name) ?: 'product';
        $slug = $baseSlug;
        $suffix = 2;

        while (Product::query()->where('slug', $slug)->exists()) {
            $slug = "{$baseSlug}-{$suffix}";
            $suffix++;
        }

        return $slug;
    }

    /**
     * @param array<string, mixed> $data
     */
    private function fillProduct(Product $product, array $data): void
    {
        foreach ([
            'vendor_id',
            'category_id',
            'brand_id',
            'name',
            'slug',
            'description',
            'base_price',
            'offer_price',
            'status',
        ] as $field) {
            if (array_key_exists($field, $data)) {
                $product->{$field} = $data[$field];
            }
        }
    }

    private function saveProductImages(Request $request, Product $product): void
    {
        if (!$request->hasFile('product_image')) {
            return;
        }

        $product->clearMediaCollection('product_image');
        $product->addMultipleMediaFromRequest(['product_image'])
            ->each(fn ($fileAdder) => $fileAdder->toMediaCollection('product_image'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $query = Product::query();
        if ((int) request()->user()->role_id === 3) {
            $query->whereIn('vendor_id', request()->user()->vendors()->select('id'));
        }
        $product = $query->findOrFail($id);

        if ($product->orderItems()->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Products included in an order cannot be deleted.',
            ], 409);
        }

        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully.',
        ]);
    }

    private function authorizeVendorProduct(Request $request, Product $product): void
    {
        if ((int) $request->user()->role_id === 3
            && !$request->user()->vendors()->whereKey($product->vendor_id)->exists()) {
            abort(404);
        }
    }
}
