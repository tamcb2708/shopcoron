<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table='vp-blog';
    protected $primaryKey='bl_id';
    protected $guarded=[];
}
