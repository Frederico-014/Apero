<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function aperos ()
    {
        return $this->hasMany('App\Apero');
    }

    public function isCat($id)
    {
        return $this->id == $id;
    }
}
