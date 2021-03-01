<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentBlog extends Model
{
    //
    protected $table='vp-comment-blog';
    protected $primaryKey='comm_id';
    protected $guarded=[];
}
