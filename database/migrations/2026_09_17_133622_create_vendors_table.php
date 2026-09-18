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
        /* 
        id bigint [pk, increment]
  user_id bigint [unique, not null]
  shop_name varchar [not null]
  shop_logo_url varchar
  description text
  commission_rate decimal [default: 10.00]
  verification_status varchar [default: 'pending', note: 'pending, verified, rejected']
  status varchar [default: 'active', note: 'active, suspended, closed']
        */
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('shop_name');
            $table->text('description');
            $table->decimal('commission_rate', 10, 2)->default(10.00);
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
