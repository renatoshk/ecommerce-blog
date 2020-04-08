<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	 protected $fillable = ['product_id', 'card_id', 'status', 'qty', 'total_price', ];
    //
	 public function product(){
	 	return $this->belongsTo('App\Product');
	 }

	
	 public function user(){
	 	return $this->belongsTo('App\User');
	 }
     public function checkout(){
     	return $this->hasMany('App\User_Checkout');
     }
     public function shippings(){
     	return $this->hasMany('App\Shipping');
     }
     public function payments(){
     	return $this->hasMany('App\Payment');
     }
}
