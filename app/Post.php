<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['title', 'body', 'category_id', 'photo_id'];
    

    //lidhja me categories
    public function category(){
    	return $this->belongsTo('App\PostCategory');
    }
    //lidhja me komentet 

    public function comments(){
    	return $this->hasMany('App\Comment');
    }

    //lidhja me users
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function photo(){
        return $this->belongsTo('App\Photo_post');
    }
}
