<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        // echo "this is a seachh api";
        $search_text = $request['text'];
        $products = Product::with('category:id,name', 'brand:id,name')->where('name', 'LIKE', '%' . $search_text . '%')->select('id', 'name', 'slug', 'category_id', 'brand_id')->get();
        $categories = Category::where('name', 'LIKE', '%' . $search_text . '%')->get();

        if ($products->isEmpty() && $categories->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => "No items found that matches your search",
            ], 404);
        }

        return response()->json([
            'success' => true,
            'products' => $products,
            'categories' => $categories,
        ], 200);
    }
}
