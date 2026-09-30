<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            
            $table->bigInteger('user_id')->nullable();
            $table->string('guest_name')->nullable();
            $table->string('guest_email')->nullable();
            $table->string('guest_phone')->nullable();
            $table->string('order_number')->unique();
            $table->bigInteger('shipping_address_id')->nullable();
            // snapshot of shipping address
            $table->string('shipping_recipient_name');
            $table->string('shipping_phone');
            $table->string('shipping_address_line');
            $table->string('shipping_district')->nullable();
            // Financial Breakdowns
            $table->decimal('subtotal_amount');
            $table->decimal('shipping_fee');
            $table->decimal('total_amount');
            $table->bigInteger('order_status_id')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
