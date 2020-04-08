<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','description','price','image_id','category_id', 'product_review_id', 'qty'];
    //
    //lidhja me category
    public function category(){
    	return $this->belongsTo('App\Category');
    }

    //lidhja me users

    public function user(){
    	return $this->belongsTo('App\User');
    }
    //lidhja me orders

    public function orders(){
    	return $this->hasMany('App\Order');
    }

    //lidhja me review 

    public function review(){
    	return $this->belongsTo('App\ProductReview');
    }
    //lidhja me photo
    public function photo(){
        return $this->belongsTo('App\Photo_products','image_id');
    }


}
