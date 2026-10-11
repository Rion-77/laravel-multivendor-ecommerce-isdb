<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $products = Product::limit(5)->get();
        $categories = Category::withCount('products')->orderBy('products_count', 'desc')->limit(20)->get();


        // $products = Product::paginate(5);
        // return ProductResource::collection($products);
        return response()->json([
            'success' => true,
            'topCategories' => $topCategories,
            'categories' => $categories
        ], 200);
    }
}
