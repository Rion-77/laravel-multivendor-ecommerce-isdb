<?php

namespace App\Http\Controllers\Api\Frontend;

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
                AllowedFilter::callback('min_price', function ($query, $value) {
                    $query->where('base_price', '>=', $value);
                }),
                AllowedFilter::callback('max_price', function ($query, $value) {
                    $query->where('base_price', '<=', $value);
                })
            )
            ->paginate(9)
            ->appends(request()->query());
        // $products = Product::paginate(5);
        // return ProductResource::collection($products);
        return response()->json([
            'success' => true,
            'products' => $products,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $product = Product::with('category', 'brand', 'vendor')->findOrFail($id);
        // $related_products = Product::orderBy('created_at', 'desc')->limit(6)->get();
        // $featured_products = Product::orderBy('created_at', 'desc')->limit(6)->get();
        // $vendor = Vendor::withCount('products')->findOrFail($product->vendor_id);
        // return view('frontend.products.show', compact('product', 'related_products', 'featured_products', 'vendor'));
        return response()->json([
            'success' => true,
            'product' => $product,
        ], 200);
    }

}
