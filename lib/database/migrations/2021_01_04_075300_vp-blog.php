<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VpBlog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp-blog', function (Blueprint $table) {
            $table->increments('bl_id');
            $table->string('bl_name');
            $table->string('bl_metatitle');
            $table->string('bl_description');
            $table->string('bl_image');
            $table->Integer('bt_status');
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
        Schema::dropIfExists('vp-blog');
    }
}
