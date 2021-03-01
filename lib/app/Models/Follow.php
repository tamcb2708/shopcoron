<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table='vp-follow';
    protected $primaryKey='fl_id';
    protected $guarded=[];
}