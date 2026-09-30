<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['guest_name', 'guest_email', 'guest_phone', 'shipping_address_id', 'shipping_recipient_name', 'shipping_phone', 'shipping_address_line', 'shipping_district', 'shipping_fee', 'payment_method'])]
class Order extends Model
{
    function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
