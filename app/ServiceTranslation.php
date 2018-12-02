<?php

namespace Jbb;

use Illuminate\Database\Eloquent\Model;

class ServiceTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];
    protected $guarded = ['id'];
}
