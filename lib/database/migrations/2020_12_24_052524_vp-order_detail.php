<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VpOrderDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp-order_detail', function (Blueprint $table) {
            $table->increments('order_detail_id');
            $table->integer('order_code');
            $table->integer('product_id');
            $table->string('product_image');
            $table->string('product_name');
            $table->float('product_price');
            $table->integer('product_quantity');
            $table->string('product_coupon');
            $table->string('product_freeship');
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
        Schema::dropIfExists('vp-order_detail');
    }
}
