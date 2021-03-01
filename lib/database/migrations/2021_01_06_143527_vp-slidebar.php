<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VpSlidebar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp-slidebar', function (Blueprint $table) {
            $table->increments('sli_id');
            $table->string('sli_name');
            $table->string('sli_image');
            $table->integer('sli_status');
            $table->string('sli_des');
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
        Schema::dropIfExists('vp-slidebar');
    }
}
