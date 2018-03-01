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

    public function hasPermission($name, $require = false) {
        if (is_array($name)) {
        	
            foreach ($name as $permissionName) {

                $hasPermission = $this->hasPermission($permissionName);

                if ($hasPermission && !$require) {
                    return true;
                } elseif (!$hasPermission && $require) {
                    return false;
                }
            }
            return $require;
        } else {
            foreach ($this->permissions as $permission) {
                if ($permission->name == $name) {
                    return true;
                }
            }
        }

        return false;
    }

}
