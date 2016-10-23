<?php

namespace App;



use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title', 'description', 'imgpath','price','category_id','stock'
    ];

    public function user(){


        return $this->hasMany('App\User');


    }
    public function photo(){


        return $this->belongsTo('App\photo');


    }
}
