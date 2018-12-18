<?php

namespace Jbb;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['title'];
}
