<?php

namespace Jbb;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $timestamps = false;

    protected $fillable = [
       'id', 'price', 'service_category_id', 'main',
    ];

    public $translatedAttributes = ['name'];

 
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function serviceCategory() {
    	return $this->belongsTo('Jbb\ServiceCategory');
    }

}
