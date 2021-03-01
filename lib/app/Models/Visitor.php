<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $table='vp-visitors';
    protected $primaryKey='id_visitors';
    protected $guarded=[];
}
