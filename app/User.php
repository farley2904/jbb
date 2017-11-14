<?php

namespace Jbb;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function articles() {
        return $this->hasMany('Jbb\Article'); //один ко многим
    }

      public function roles() {
        return $this->belongsToMany('Jbb\Role','role_user'); //многие ко многим
    }

        //  'string'  array('View_Admin','ADD_ARTICLES')
    //
    public function canDo($permission, $require = FALSE) {
        if(is_array($permission)) {
            foreach($permission as $permName) {
                
                $permName = $this->canDo($permName);
                if($permName && !$require) {
                    return TRUE;
                }
                else if(!$permName  && $require) {
                    return FALSE;
                }               
            }
            
            return  $require;
        }
        else {
            foreach($this->roles as $role) {
                foreach($role->permissions as $perm) {
                    //foo*    foobar
                    if(str_is($permission,$perm->name)) {
                        return TRUE;
                    }
                }
            }
        }
    }
}
