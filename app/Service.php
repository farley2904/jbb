<?php

namespace Jbb;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    public $timestamps = false;

    protected $fillable = [
       'id', 'name', 'price', 'service_category_id', 'main',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function serviceCategory() {
    	return $this->belongsTo('Jbb\ServiceCategory');
    }
}
