<?php

namespace App\Http\Controllers;

use App\Models\Order;
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
        // dd($request->all());

        // Decode the string into an array if it exists
        if ($request->order_items && is_string($request->order_items)) {
            $request->merge(['order_items' => json_decode($request->order_items, true)]);
        }

        /*  "guest_name" => "Gregory Lyons"
  "guest_phone" => "+8801968988709"
  "guest_email" => "wuvymog@mailinator.com"
  "shipping_address_id" => null
  "shipping_recipient_name" => null
  "shipping_phone" => null
  "shipping_address_line" => "Doloremque consequun"
  "shipping_district" => "Velit maxime volupta"
  "shipping_fee" => "8"
  "payment_method" => "cod"
  "order_items" => "[{"id":13,"name":"quisquam et ullam","price":"1741.73","image":"https://placehold.net/400x400.png","quantity":3}]" */

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

        $order = new Order();
        $order->guest_name = $request->guest_name;
        $order->guest_email = $request->guest_email;
        $order->guest_phone = $request->guest_phone;
        // $order->shipping_address_id = $request->shipping_address_id;
        $order->shipping_recipient_name = $request->shipping_recipient_name;    
        $order->shipping_phone = $request->shipping_phone;    
        $order->shipping_address_line = $request->shipping_address_line;    
        $order->shipping_district = $request->shipping_district;
        $order->order_number = date('Y-m-d');
        $order->save();       
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
