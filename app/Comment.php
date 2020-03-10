<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = ['author', 'email', 'photo', 'text', 'post_id', 'is_active'];
    //
    //lidhja me postimet 

    public function post(){
    	return $this->belongsTo('App\Post');
    }

    public function comment_replies(){
    	return $this->hasMany('App\CommentReply');
    }
}
