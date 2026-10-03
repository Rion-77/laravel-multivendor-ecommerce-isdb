<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendors = Vendor::withCount('products')->paginate(12);
        return view('frontend.vendors.index', compact('vendors'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Vendor $vendor)
    {
        $vendor->loadCount('products');
        // $products = Product::where('vendor_id', $vendor->id)->orderBy('created_at', 'desc')->paginate(12);
        $products = $vendor->products()->orderBy('created_at', 'desc')->paginate(12);
        return view('frontend.vendors.show', compact('vendor', 'products'));
    }
}
