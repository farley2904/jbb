<?php

namespace Jbb;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function articles()
    {
        return $this->hasMany('Jbb\Article'); //один ко многим
    }
}
