<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VpShipping extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp-shipping', function (Blueprint $table) {
            $table->Increments('ship_id');
            $table->string('ship_name');
            $table->string('ship_address');
            $table->Integer('ship_phone');
            $table->string('ship_email');
            $table->string('ship_note');
            $table->Integer('ship_paymment');
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
        Schema::dropIfExists('vp-shipping');
    }
}
