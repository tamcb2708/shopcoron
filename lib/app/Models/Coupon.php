<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table='vp-coupon';
    protected $primaryKey='con_id';
    protected $guarded=[];
}
