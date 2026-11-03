<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\Vendor;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendors = Vendor::orderBy('created_at', 'desc')
            ->with('user:id,name,email,phone')
            ->withCount('products')
            ->paginate(15);

        return response()->json([
            'success' => true,
            'vendors' => $vendors,
        ], 200);
    }

    public function destroy(Vendor $vendor)
    {
        if ($vendor->products()->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Vendors with products cannot be deleted. Remove or reassign their products first.',
            ], 409);
        }

        $vendor->delete();

        return response()->json([
            'success' => true,
            'message' => 'Vendor deleted successfully.',
        ]);
    }
}
