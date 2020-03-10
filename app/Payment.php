<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
	 protected $fillable = ['credit_card_name', 'credit_card_number', 'expiration'];
    //
	 public function users_checkout(){
	 	return $this->belongsTo('User_Checkout');
	 }
}
