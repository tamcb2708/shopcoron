<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FreeShip extends Model
{
	public $timestamps=false;
	protected $fillable=[
		'fre_matp','fre_maqh','fre_xaid','fre_ship'
	];
    protected $table='vp-freeship';
    protected $primaryKey='fre_id';
    public function city(){
    	return $this->belongsTo('App\Models\City','fre_matp');
    }
    public function province(){
    	return $this->belongsTo('App\Models\Province','fre_maqh');
    }
    public function wards(){
    	return $this->belongsTo('App\Models\Wards','fre_xaid');
    }
}
