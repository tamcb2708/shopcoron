<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table='vp-rating';
    protected $primaryKey='ra_id';
    protected $guarded=[];
}
