<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'guest_name' => 'required|string|regex:/^[\pL\s]+$/u|max:255',
            'guest_email' => 'required|email|max:255',
            'guest_phone' => 'required|string|max:20',
            'shipping_address_id' => 'nullable|exists:shipping_addresses,id',
            'shipping_recipient_name' => 'string|max:255',
            'shipping_phone' => 'string|max:20',
            'shipping_address_line' => 'required|string|max:255',
            'shipping_district' => 'required|string|max:255',
            'order_items' => ['required', 'array', 'min:1'],
        ]);



        $order_items_validated = [];
        $subtotal = 0;


        foreach ($request->order_items as $order_item) {
            $product = Product::findOrFail($order_item['id']);


            array_push($order_items_validated, [
                'product_id' => $product->id,
                'quantity'  => $order_item['quantity'],
                'unit_price' => $product->base_price,
            ]);

            $subtotal += $product->base_price * $order_item['quantity'];
        }

        $shipping_fee = 120;
        $total_amount = $subtotal + $shipping_fee;

        $order = new Order();
        $order->guest_name = $request->guest_name;
        $order->guest_email = $request->guest_email;
        $order->guest_phone = $request->guest_phone;
        // $order->shipping_address_id = $request->shipping_address_id;
        $order->shipping_recipient_name = $request->guest_name;
        $order->shipping_phone = $request->guest_phone;
        $order->shipping_address_line = $request->shipping_address_line;
        $order->shipping_district = $request->shipping_district;
        $order->order_number = date('YmdHis');
        $order->subtotal_amount = $subtotal;
        $order->shipping_fee = $shipping_fee;
        $order->total_amount = $total_amount;
        $order->save();


        foreach ($order_items_validated as $order_item) {
            $order->orderItems()->create($order_item);
        }
        return response()->json([
            'success' => true,
            'message' => 'Order created successfully.',
            'order_number' => $order->order_number,
        ], 201);
    }

    public function show(string $order_number)
    {
        $order = Order::with([
            'orderItems.product:id,name',
            'orderStatus:id,name',
        ])
            ->where('order_number', $order_number)
            ->first();

        if ($order) {
            return response()->json([
                'success' => true,
                'order' => $order
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Your order was not found. Please check again if the order number is correct"
            ], 404);
        }
    }
}
