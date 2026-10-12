<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        
        return response()->json([
            'success' => true,
            'categories' => $categories
        ], 200);
    }

    public function show(string $slug)
    {
        $category = Category::with([
            'products' => function ($query) {
                $query->with('brand:id,name');
            },
        ])->where('slug', '=' , $slug)->get();

        return response()->json([
            'success' => true,
            'category' => $category
        ], 200);
    }
}
