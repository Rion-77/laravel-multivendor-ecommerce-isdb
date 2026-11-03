<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function show(Order $order)
    {
        $order->load([
            'user:id,name,email,phone',
            'orderStatus:id,name',
            'orderItems.product:id,name,vendor_id,category_id,brand_id',
            'orderItems.product.vendor:id,shop_name,commission_rate',
            'orderItems.product.category:id,name',
            'orderItems.product.brand:id,name',
        ]);

        return response()->json([
            'success' => true,
            'order' => $order,
            'statuses' => OrderStatus::query()->orderBy('id')->get(['id', 'name']),
        ]);
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'order_status_id' => ['required', 'integer', 'exists:order_statuses,id'],
        ]);

        $order->order_status_id = $validated['order_status_id'];
        $order->save();
        $order->load('orderStatus:id,name');

        return response()->json([
            'success' => true,
            'message' => 'Order status updated successfully.',
            'order' => $order,
        ]);
    }

    public function index()
    {
        $orders = Order::with([
            'user:id,name,email',
            'orderStatus:id,name',
            'orderItems.product.vendor:id,shop_name',
        ])->latest()->paginate(15);

        return response()->json([
            'success' => true,
            'orders' => $orders,
        ]);
    }

    public function destroy(Order $order)
    {
        DB::transaction(function () use ($order): void {
            $order->orderItems()->delete();
            $order->delete();
        });

        return response()->json([
            'success' => true,
            'message' => 'Order deleted successfully.',
        ]);
    }
}
