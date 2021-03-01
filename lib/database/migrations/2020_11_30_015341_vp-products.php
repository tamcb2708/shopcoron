<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VpProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp-products', function (Blueprint $table) {
            $table->increments('prod_id');
            $table->string('prod_name');
            $table->integer('prod_quantity');
            $table->integer('prod_sold');
            $table->string('prod_slug');
            $table->string('prod_view');
            $table->integer('prod_price');
            $table->integer('prod_pricenew');
            $table->string('prod_img');
            $table->tinyInteger('prod_status');
            $table->text('prod_descripton');
            $table->text('prod_more');
            $table->string('prod_sty');
            $table->string('prod_comp');
            $table->string('prod_prop');
            $table->integer('prod_cate')->unsigned();
            $table->foreign('prod_cate')
                  ->references('cate_id')
                  ->on('vp-categorys')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('vp-products');
    }
}
