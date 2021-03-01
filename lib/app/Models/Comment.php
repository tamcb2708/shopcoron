<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table='vp-comment';
    protected $primaryKey='com_id';
    protected $guarded=[];
}
