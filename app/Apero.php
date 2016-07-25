<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Apero extends Model
{
    protected $fillable = ['title','content','date','category_id','uri'];

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

    public function getDateAttribute ($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

}
