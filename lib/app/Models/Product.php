<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='vp-products';
    protected $primaryKey='prod_id';
    protected $guarded=[];
}
