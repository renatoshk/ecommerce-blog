<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
	protected $fillable = ['address', 'zip_code'];
    //

    public function user_checkout(){
    	return $this->belongsTo('User_Checkout');
    }
    public function shipping_method(){
    	return $this->belongsTo('App\Shipping_method');
    }
}
