<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $products = Product::limit(5)->get();
        $categories = Category::withCount('products')->orderBy('products_count', 'desc')->limit(20)->get();

        $topCategories = $categories->take(3)->map(function ($category) {
            return [
                'id'       => $category->id,
                'name'     => $category->name,
                'products' => Product::where('category_id', $category->id)
                    ->orderBy('created_at', 'desc')
                    ->with('brand:id,name')
                    ->limit(10)
                    ->get(),
            ];
        })->values();

        // $products = Product::paginate(5);
        // return ProductResource::collection($products);
        return response()->json([
            'success' => true,
            'topCategories' => $topCategories,
            'categories' => $categories
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }
}
