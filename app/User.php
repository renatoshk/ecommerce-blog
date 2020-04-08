<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password','role_id','photo_id','is_active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function photo(){
        return $this->belongsTo('App\Photo_users');
    }
    public function posts(){
         return $this->hasMany('App\Post');
    }
    public function products(){
        return $this->hasMany('App\Product');
    }
    public function orders(){
        return $this->hasMany('App\Order');
    }
    public function isAdmin(){
        if($this->role->role == "admin" && $this->is_active == 1){
            return true;
        }
        else {
            return false;
        }
    }
    public function user_checkouts(){
        return $this->hasMany('App\User_Checkout');
    } 
     public function payments(){
        return $this->hasMany('App\Payment');
    }

    public function shippings(){
        return $this->hasMany('App\Shipping');
    }
}
