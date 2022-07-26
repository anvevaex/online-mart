<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments("order_id");
            $table->bigInteger("order_number");
            $table->integer("id")->references("customer_id")->on("Customers");
            $table->string("recipient");
            $table->string("province");
            $table->string("city");
            $table->string("district");
            $table->string("address");
            $table->string("payment_method");
            $table->decimal("order_amount");
            $table->decimal("shipping_cost");
            $table->decimal("discount");
            $table->decimal("paid_amount");
            $table->string("shipper");
            $table->string("shipping_number");
            $table->datetime("shipping_time");
            $table->datetime("ordered_time");
            $table->datetime("paid_time");
            $table->datetime("delivered_time");
            $table->string("order_status");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
