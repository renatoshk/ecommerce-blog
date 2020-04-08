<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Checkout extends Model
{
	protected $fillable = ['order_id', 'name', 'surname', 'email', 'address', 'country', 'city', 'zip_code', 'phone_number', 'additional_information'];
    //

   
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
    public function orders(){
    	return $this->belongsTo('App\Order', 'order_id');
    }
}
