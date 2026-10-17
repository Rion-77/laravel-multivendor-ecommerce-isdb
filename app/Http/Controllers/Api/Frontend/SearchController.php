<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request) {
        // echo "this is a seachh api";
        $search_text = $request['text'];
        $products = Product::where('name', 'LIKE', '%' . $search_text . '%')->get();
        return response()->json($products);
    }
}
