<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function aperos ()
    {
        return $this->belongsToMany('App\Apero');
    }
}
