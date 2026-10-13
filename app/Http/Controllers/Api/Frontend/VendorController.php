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

    
   public function show(Vendor $vendor)
    {
        $vendor->loadCount('products');
        $products = $vendor->products()->with('brand:id,name')->orderBy('created_at', 'desc')->paginate(12);
        // return view('frontend.vendors.show', compact('vendor', 'products'));
        return response()->json([
            'success' => true,
            'vendor' => $vendor,
            'products' => $products,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
   
}
