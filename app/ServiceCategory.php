<?php

namespace Jbb;

use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{	
    public function services() {
        return $this->hasMany('Jbb\Service','service_category_id','id'); //один ко многим
    }
}
