<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::withCount('products')->paginate();

        return response()->json([
            'success' => true,
            'brands' => $brands,
        ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('brands', 'name')],
        ]);

        $brand = Brand::create($data)->loadCount('products');

        return response()->json([
            'success' => true,
            'brand' => $brand,
        ], 201);
    }

    public function update(Request $request, Brand $brand)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('brands', 'name')->ignore($brand->id)],
        ]);

        $brand->update($data);

        return response()->json([
            'success' => true,
            'brand' => $brand->loadCount('products'),
        ]);
    }

    public function destroy(Brand $brand)
    {
        if ($brand->products()->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Brands assigned to products cannot be deleted.',
            ], 409);
        }

        $brand->delete();

        return response()->json([
            'success' => true,
            'message' => 'Brand deleted successfully.',
        ]);
    }
}
