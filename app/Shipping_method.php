<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping_method extends Model
{
    //
    protected $fillable = ['method_name', 'duration', 'price'];
   

}
