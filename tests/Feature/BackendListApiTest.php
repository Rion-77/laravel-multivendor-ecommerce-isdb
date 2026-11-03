<?php

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\User;

it('lists and deletes categories through the backend API', function () {
    $admin = User::factory()->create(['role_id' => 1]);
    $category = new Category();
    $category->name = 'Accessories';
    $category->slug = 'accessories';
    $category->save();

    $this->actingAs($admin)
        ->getJson('/api/backend/categories')
        ->assertOk()
        ->assertJsonPath('categories.data.0.name', 'Accessories');

    $this->actingAs($admin)
        ->deleteJson("/api/backend/categories/{$category->id}")
        ->assertOk()
        ->assertJsonPath('success', true);

    $this->assertDatabaseMissing('categories', ['id' => $category->id]);
});

it('provides list responses for persisted admin resources', function () {
    $admin = User::factory()->create(['role_id' => 1]);

    foreach ([
        '/api/backend/products' => 'products',
        '/api/backend/vendors' => 'vendors',
        '/api/backend/brands' => 'brands',
        '/api/backend/categories' => 'categories',
        '/api/backend/orders' => 'orders',
        '/api/backend/order-statuses' => 'statuses',
        '/api/backend/users' => 'users',
        '/api/backend/customers' => 'customers',
        '/api/backend/roles' => 'roles',
    ] as $url => $key) {
        $this->actingAs($admin)
            ->getJson($url)
            ->assertOk()
            ->assertJsonStructure([$key => ['data', 'links']]);
    }
});

it('shows order details and updates its status', function () {
    $admin = User::factory()->create(['role_id' => 1]);
    $pending = new OrderStatus();
    $pending->name = 'Pending';
    $pending->save();
    $shipped = new OrderStatus();
    $shipped->name = 'Shipped';
    $shipped->save();

    $order = new Order();
    $order->order_number = 'ORD-DETAIL-1001';
    $order->guest_name = 'Taylor Customer';
    $order->guest_email = 'taylor@example.com';
    $order->guest_phone = '555-0101';
    $order->shipping_recipient_name = 'Taylor Customer';
    $order->shipping_phone = '555-0101';
    $order->shipping_address_line = '123 Market Street';
    $order->shipping_district = 'Central';
    $order->subtotal_amount = 45;
    $order->shipping_fee = 5;
    $order->total_amount = 50;
    $order->order_status_id = $pending->id;
    $order->save();

    $this->actingAs($admin)
        ->getJson("/api/backend/orders/{$order->id}")
        ->assertOk()
        ->assertJsonPath('order.order_number', 'ORD-DETAIL-1001')
        ->assertJsonPath('order.order_status.name', 'Pending')
        ->assertJsonPath('statuses.1.name', 'Shipped');

    $this->actingAs($admin)
        ->patchJson("/api/backend/orders/{$order->id}", ['order_status_id' => $shipped->id])
        ->assertOk()
        ->assertJsonPath('order.order_status_id', $shipped->id)
        ->assertJsonPath('order.order_status.name', 'Shipped');

    $this->assertDatabaseHas('orders', [
        'id' => $order->id,
        'order_status_id' => $shipped->id,
    ]);
});
