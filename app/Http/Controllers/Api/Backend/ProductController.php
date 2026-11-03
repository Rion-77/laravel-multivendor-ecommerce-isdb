<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = QueryBuilder::for(Product::class)
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
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $product = Product::with('category:id,name', 'brand:id,name', 'vendor:id,shop_name')->findOrFail($id);
        
        return response()->json([
            'success' => true,
            'product' => $product,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

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
}
