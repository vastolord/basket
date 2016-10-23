<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
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
     * @return array
     */
    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    /*public function role()
    {

        return $this->belongsTo('App\Role');
    }*/
    public function category(){

        return $this->belongsTo('App\Category');
    }

   public function photo()
    {

        return $this->belongsTo('App\Photo');

    }


    public function isAdmin()
    {

        if ($this->role->name == "admin") {

            return true;


        }

        return false;

    }

    public function posts()
    {
        return $this->belongsTo('App\Product');
        //return $this->hasMany('App\Product');

    }
}
