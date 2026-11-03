<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;

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
