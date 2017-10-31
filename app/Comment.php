<?php

namespace Jbb;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    public function article() {
    	return $this->belongsTo('Jbb\Article');
    }

    public function user() {
    	return $this->belongsTo('Jbb\User');
    }
}
