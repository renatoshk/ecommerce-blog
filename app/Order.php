<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	 protected $fillable = ['product_id', 'card_id', 'status', 'quantity', 'total_price'];
    //
	 public function product(){
	 	return $this->belongsTo('App\Product');
	 }

	 public function user_checkouts(){
	 	return $this->hasMany('App\User_Checkout');
	 }
}
