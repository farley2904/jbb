<?php

namespace Jbb;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users() {
        return $this->belongsToMany('Jbb\User','role_user'); //многие ко многим
    }
    public function permissions() {
        return $this->belongsToMany('Jbb\Permission','permission_role'); //многие ко многим //'permission_role' можно опустить
    }
}
