<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendors = Vendor::with('user')->orderBy('created_at', 'desc')->paginate(15);
        // dd($vendors);
        return view('admin.vendors.index', compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = \App\Models\User::all();
        return view('admin.vendors.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'shop_name' => 'required|min:3|max:100',
                'commission_rate' => "required|numeric|min:0|max:15",
                'description' => "required|min:3|max:500",
                'user_id' => 'required',
                'shop_logo' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:2048',
            ]
        );

        $vendor = new Vendor();
        $vendor->shop_name = $request->input('shop_name');
        $vendor->commission_rate = $request->input('commission_rate');
        $vendor->description = $request->input('description');
        $vendor->user_id = $request->input('user_id');
        $vendor->status = $request->input('status');
        $vendor->save();

        if ($request->hasFile('shop_logo')) {
            $vendor->addMediaFromRequest('shop_logo')
                ->toMediaCollection('shop_logo');
        }
        return redirect()->route('admin.vendors.index')->with('success', 'Vendor created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vendor $vendor)
    {
        $products = Product::where('vendor_id', $vendor->id)->orderBy('created_at', 'desc')->paginate(6);
        return view('admin.vendors.show', compact('vendor', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vendor $vendor)
    {
        $users = \App\Models\User::all();
        return view('admin.vendors.edit', compact('users', 'vendor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vendor $vendor)
    {

        $request->validate(
            [
                'shop_name' => 'required|min:3|max:100',
                'commission_rate' => "required|numeric|min:0|max:15",
                'description' => "required|min:3|max:500",
                'user_id' => 'required',
                'shop_logo' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:2048',
            ]
        );

        $vendor = Vendor::find($vendor->id);
        $vendor->shop_name = $request->input('shop_name');
        $vendor->commission_rate = $request->input('commission_rate');
        $vendor->description = $request->input('description');
        $vendor->user_id = $request->input('user_id');
        $vendor->status = $request->input('status');
        $vendor->save();

        if ($request->hasFile('shop_logo')) {
            $vendor->clearMediaCollection('shop_logo');
            $vendor->addMediaFromRequest('shop_logo')
                ->toMediaCollection('shop_logo');
        }
        return redirect()->route('admin.vendors.index')->with('success', 'Vendor updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendor $vendor)
    {
        Vendor::destroy($vendor->id);
        return redirect()->route('admin.vendors.index')->with('success', 'Vendor deleted succesfully');
    }
}
