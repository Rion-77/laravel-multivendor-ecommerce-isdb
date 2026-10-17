<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    
    public function index()
    {
        $vendors = Vendor::withCount('products')->get();
        return response()->json([
            'success' => true,
            'vendors' => $vendors,
        ]);
    }

    
   public function show(string $slug)
    {
        $vendor = Vendor::with('products.brand:id,name')->withCount('products')->where('slug', '=' , $slug)->first();
        
        
        return response()->json([
            'success' => true,
            'vendor' => $vendor,
            // 'products' => $products,
        ], 200);
    }
   
}
