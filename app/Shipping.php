<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
	protected $fillable = ['order_id','address', 'zip_code', 'country', 'shipping_id'];
    //

    public function user(){
    	return $this->belongsTo('App\User', 'user_id');
    }
    public function shipping_method(){
    	return $this->belongsTo('App\Shipping_method', 'shipping_id');
    }
    public function order(){
    	return $this->belongsTo('App\Order', 'order_id');
    }
  
}
