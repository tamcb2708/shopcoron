<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VpOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp-orders', function (Blueprint $table) {
            $table->increments('order_id');
            $table->integer('customer_id');
            $table->integer('shipping_id');
            $table->integer('order_status');
            $table->string('order_date');
            $table->string('order_code');
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
        Schema::dropIfExists('vp-orders');
    }
}
