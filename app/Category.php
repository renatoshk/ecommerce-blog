<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['name'];
    //lidhja me produktet
    public function products(){
    	return $this->hasMany('App\Product');
    } 

    //lidhja me postimet
    public function posts(){
    	return $this->hasMany('App\Post');
    }



}
