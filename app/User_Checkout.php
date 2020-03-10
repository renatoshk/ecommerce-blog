<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Checkout extends Model
{
	protected $fillable = ['order_id', 'name', 'surname', 'email', 'address', 'country', 'city', 'zip_code', 'phone_number', 'additional_information'];
    //
    public function order(){
    	return $this->belongsTo('App\Order');
    }

    public function payments(){
    	return $this->hasMany('App\Payment');
    }

    public function shippings(){
    	return $this->hasMany('App\Shipping');
    }
}
