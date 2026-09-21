<?php

namespace App\Http\Controllers;

use App\Enums\ProductStatus;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Enum;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role_id == 3) {
            $products = Product::with('category', 'brand', 'vendor')->orderBy('created_at', 'desc')->whereHas('vendor', function ($query) {
                $query->where('user_id', Auth::user()->id);
            })->paginate(15);
        } else {
            $products = Product::with('category', 'brand', 'vendor')->orderBy('id', 'desc')->paginate(15);
        }
        // $products = Product::with('category', 'brand', 'vendor')->orderBy('id', 'desc')->paginate(15);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vendors = Vendor::all();
        $brands = Brand::all();
        $categories = Category::all();

        return view('admin.products.create', compact('vendors', 'brands', 'categories'));
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
                'offer_price' => 'nullable|numeric|min:0|lt:base_price',
                'product_image' => 'nullable|array',
                'product_image.*' => 'image|mimes:jpeg,png,jpg,webp,avif|max:2048',
                'status' => new Enum(ProductStatus::class),
            ]
        );

        $product = new Product;

        if (Auth::user()->role_id == 3) {
            $product->vendor_id = session('user_vendor_id');
        } else {
            $product->vendor_id = $request->vendor_id;
        }

        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->description = $request->description;
        $product->base_price = $request->base_price;
        $product->offer_price = $request->offer_price;
        $product->status = $request->status;
        $product->save();

        if ($request->hasFile('product_image')) {
            $product->addMultipleMediaFromRequest(['product_image'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('product_image');
                });
        }

        return redirect()->route('admin.products.index')->with('success', 'Product added succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        if (Auth::user()->role_id == 3 && $product->vendor_id != session('user_vendor_id')) {
            abort(403, 'Unauthorized action.');
        }
        $product = Product::findOrFail($product->id);

        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        if (Auth::user()->role_id == 3 && $product->vendor_id != session('user_vendor_id')) {
            abort(403, 'Unauthorized action.');
        }
        $product = Product::findOrFail($product->id);
        $brands = Brand::all();
        $categories = Category::all();
        $vendors = Vendor::all();

        return view('admin.products.edit', compact('product', 'brands', 'categories', 'vendors'));
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
                'offer_price' => 'nullable|numeric|min:0|lt:base_price',
                'product_image' => 'nullable|array',
                'product_image.*' => 'image|mimes:jpeg,png,jpg,webp,avif|max:2048',
                'status' => new Enum(ProductStatus::class),
            ]
        );

        $product = Product::findOrFail($product->id);

        if (Auth::user()->role_id == 3) {
            $product->vendor_id = session('user_vendor_id');
        } else {
            $product->vendor_id = $request->vendor_id;
        }

        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->description = $request->description;
        $product->base_price = $request->base_price;
        $product->offer_price = $request->offer_price;
        $product->status = $request->status;
        $product->save();

        if ($request->hasFile('product_image')) {
            $product->clearMediaCollection('product_image');
            $product->addMultipleMediaFromRequest(['product_image'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('product_image');
                });
        }

        return redirect()->route('admin.products.index')->with('success', 'Product updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if (Auth::user()->role_id == 3 && $product->vendor_id != session('user_vendor_id')) {
            abort(403, 'Unauthorized action.');
        }
        Product::destroy($product->id);

        return redirect()->route('admin.products.index')->with('success', 'Product deleted succesfully');
    }
}
