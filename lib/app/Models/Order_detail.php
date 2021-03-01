<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $table='vp-order_detail';
    protected $primaryKey='order_detail_id';
    protected $guarded=[];

    public function product(){
    	return $this->belongsTo('App\Models\Product','product_id');
    }
}
