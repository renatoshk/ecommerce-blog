<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo_users extends Model
{
   
    //
    protected $uploads = '/images/';
	protected $fillable = ['user_register_file'];
	public function getFileAttribute($photo){
		return $this->uploads . $photo;
	}
}
