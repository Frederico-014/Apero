<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apero extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function tags ()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function user ()
    {
        return $this->hasOne('App\User');
    }
}
