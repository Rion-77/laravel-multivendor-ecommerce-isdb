<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category', 'brand')->orderBy('id', 'desc')->paginate(15);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.products.create', compact('brands', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|min:3|max:100',
                'vendor_id' => 'required',
                'category_id' => 'required',
                'brand_id' => 'required',
                'description' => 'required|min:10|max:255',
                'base_price' => 'required|numeric|min:0',
                'offer_price' => 'nullable|numeric|min:0|lt:base_price'
            ]
        );

        $product = new Product;
        $product->name = $request->name;
        $product->vendor_id = $request->vendor_id;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->description = $request->description;
        $product->base_price = $request->base_price;
        $product->offer_price = $request->offer_price;
        $product->save();

        // if ($request->hasFile('profile_image')) {
        //     $product->addMediaFromRequest('profile_image')
        //         ->toMediaCollection('profile_image');
        // }

        return redirect()->route('admin.products.index')->with('success', "Product added succesfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $product = Product::findOrFail($product->id);
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'brands', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // dd($request);

        $request->validate(
            [
                'name' => 'required|min:3|max:100',
                'vendor_id' => 'required',
                'category_id' => 'required',
                'brand_id' => 'required',
                'description' => 'required|min:10|max:255',
                'base_price' => 'required|numeric|min:0',
                'offer_price' => 'nullable|numeric|min:0|lt:base_price'
            ]
        );

        $product = Product::findOrFail($product->id);
        $product->name = $request->name;
        $product->vendor_id = $request->vendor_id;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->description = $request->description;
        $product->base_price = $request->base_price;
        $product->offer_price = $request->offer_price;
        $product->save();

        // if ($request->hasFile('profile_image')) {
        //     $product->addMediaFromRequest('profile_image')
        //         ->toMediaCollection('profile_image');
        // }

        return redirect()->route('admin.products.index')->with('success', "Product updated succesfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Product::destroy($product->id);
        return redirect()->route('admin.products.index')->with('success', "Product deleted succesfully");
    }
}
