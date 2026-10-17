<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ProductController extends Controller
{
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

    public function show(string $slug)
    {
         $product = Product::with('category:id,name', 'brand:id,name', 'vendor:id,shop_name,slug')->where('slug', '=' , $slug)->first();
        
        return response()->json([
            'success' => true,
            'product' => $product,
        ], 200);
    }

}
