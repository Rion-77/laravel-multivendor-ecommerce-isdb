<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
    $vendors = Vendor::limit(4)->get();
    $products = Product::with('category', 'brand', 'vendor')->orderBy('id', 'desc')->paginate(12);
    return view('frontend.home', compact('products', 'vendors')); 
    } 
}
