<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(9);
        return view('frontend.products.index', compact('products'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with('category', 'brand')->findOrFail($id);
        $related_products = Product::orderBy('created_at', 'desc')->limit(6)->get();
        $featured_products = Product::orderBy('created_at', 'desc')->limit(6)->get();
        $vendor= Vendor::withCount('products')->findOrFail($product->vendor_id);
        return view('frontend.products.show', compact('product', 'related_products', 'featured_products', 'vendor'));
    }

    
}
