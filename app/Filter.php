<?php

namespace Jbb;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    
     public function portfolios() {
        return $this->hasMany('Jbb\Portfolio','filter_alias','alias'); //один ко многим
    }
}
