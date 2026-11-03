<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\OrderStatus;

class OrderStatusController extends Controller
{
    public function index()
    {
        $statuses = OrderStatus::withCount('orders')->orderBy('name')->paginate(15);

        return response()->json([
            'success' => true,
            'statuses' => $statuses,
        ]);
    }

    public function destroy(OrderStatus $orderStatus)
    {
        if ($orderStatus->orders()->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Order statuses assigned to orders cannot be deleted.',
            ], 409);
        }

        $orderStatus->delete();

        return response()->json([
            'success' => true,
            'message' => 'Order status deleted successfully.',
        ]);
    }
}
