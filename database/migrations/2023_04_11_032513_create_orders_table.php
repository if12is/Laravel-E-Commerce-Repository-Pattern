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
            $table->string('order_number')->unique();
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->enum('status', ['pending', 'processing', 'shipped', 'delivered', 'canceled'])->default('pending');
            $table->string('payment_method');
            $table->string('payment_status');
            $table->string('payment_id');
            $table->decimal('total_amount', 10, 2);
            $table->enum('payment_type', ['cash_on_delivery', 'credit_card', 'paypal', 'stripe'])
            ->default('cash_on_delivery');
            $table->text('payment_details');
            $table->text('shipping_address');
            $table->string('shipping_name');
            $table->string('shipping_price');
            $table->string('shipping_phone');
            $table->string('shipping_email');
            $table->string('shipping_city');
            $table->string('shipping_country');
            $table->string('shipping_zip');
            $table->string('shipping_notes');
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
