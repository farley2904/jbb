<?php

namespace Jbb;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use \Dimsav\Translatable\Translatable;

    use SoftDeletes;

    public $translatedAttributes = ['title'];

    protected $dates = ['deleted_at'];
}
