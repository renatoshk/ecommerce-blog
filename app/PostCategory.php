<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    // 
    protected $fillable = ['name'];
    public function posts(){
    	return $this->hasMany('App\Post');
    }
}
