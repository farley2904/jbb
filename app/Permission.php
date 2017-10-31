<?php

namespace Jbb;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function roles() {
        return $this->BelongsToMany('Jbb\Role','permission_role'); //многие ко многим
    }
}
