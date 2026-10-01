<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
      public function store(Request $request)
    {

        // converts order items into array for validation
        if ($request->order_items && is_string($request->order_items)) {
            $request->merge(['order_items' => json_decode($request->order_items, true)]);
        }

        $request->validate([
            'guest_name' => 'required|string|max:255',
            'guest_email' => 'required|email|max:255',
            'guest_phone' => 'required|string|max:20',
            'shipping_address_id' => 'nullable|exists:shipping_addresses,id',
            'shipping_recipient_name' => 'string|max:255',
            'shipping_phone' => 'string|max:20',
            'shipping_address_line' => 'required|string|max:255',
            'shipping_district' => 'nullable|string|max:255',
            'order_items' => ['required', 'array', 'min:1'],
        ]);

        $order_items_validated = [];

        $subtotal = 0;


        foreach ($request->order_items as $order_item) {
            $product = Product::findOrFail($order_item['id']);

            // dd($product);

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
        $order->order_number = date('Y-m-d H:i:s');
        $order->subtotal_amount = $subtotal;
        $order->shipping_fee = $shipping_fee;
        $order->total_amount = $total_amount;
        $order->save();


        foreach ($order_items_validated as $order_item) {
            $order->orderItems()->create($order_item);
        }
        return redirect()->route('frontend.order-confirmed')->with([
            'success' => 'Order created successfully.',
        ]);
    } 

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
