<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Apero extends Model
{
    protected $fillable = ['title','abstract','content','date','user_id','category_id','uri','status'];

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
        return $this->belongsTo('App\User');
    }

    public function getDateAttribute ($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function scopeonline($query)

    {
        $now=Carbon::now();
        return $query->where('date','>',$now);
    }

    public function scopesearch($query, $word)
    {
        return $query   ->where('title','like','%'.$word.'%')
                        ->orWhere('content','like','%'.$word.'%');

    }

    public function isTag($id)
    {
        foreach($this->tags as $tag)
        {
            if ($tag->id == $id)
            {
                return true;
            }
        }

        return false;
    }
}
