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
    public function show(string $id)
    {
        //
    }
}
