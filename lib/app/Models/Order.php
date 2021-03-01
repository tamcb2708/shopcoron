<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='vp-orders';
    protected $primaryKey='order_id';
    protected $guarded=[];
}
