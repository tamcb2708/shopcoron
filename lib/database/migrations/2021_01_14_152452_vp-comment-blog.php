<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VpCommentBlog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp-comment-blog', function (Blueprint $table) {
            $table->increments('comm_id');
            $table->string('comm_email');
            $table->string('comm_name');
            $table->string('comm_content');
            $table->integer('comm_blog')->unsigned();
            $table->foreign('comm_blog')
                  ->references('bl_id') 
                  ->on('vp-blog')
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
        Schema::dropIfExists('vp-comment-blog');
    }
}
