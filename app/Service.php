<?php

namespace Jbb;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    public $timestamps = false;

    public function serviceCategory() {
    	return $this->belongsTo('Jbb\ServiceCategory');
    }
}
