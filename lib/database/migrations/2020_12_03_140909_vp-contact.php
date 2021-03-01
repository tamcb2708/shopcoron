<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VpContact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp-contact', function (Blueprint $table) {
            $table->increments('ct_id');
            $table->string('ct_name');
            $table->string('ct_email');
            $table->string('ct_subject');
            $table->integer('ct_phone');
            $table->string('ct_mes');
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
        Schema::dropIfExists('vp-contact');
    }
}
