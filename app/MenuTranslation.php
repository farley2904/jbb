<?php

namespace Jbb;

use Illuminate\Database\Eloquent\Model;

class MenuTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title'];
    protected $guarded = ['id'];
}
