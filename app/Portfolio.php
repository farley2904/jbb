<?php

namespace Jbb;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
       public function filter() {
    	return $this->belongsTo('Jbb\Filter','filter_alias','alias');
    }
}
