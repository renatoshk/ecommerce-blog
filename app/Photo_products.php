<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo_products extends Model
{
    protected $fillable = ['product_file'];
    //
    protected $uploads = '/product_images/';
	public function getFileAttribute($photo){
		return $this->uploads . $photo;
	}

}
