<?php

namespace Jbb;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //поля которые разрешены к массовому заполнению;
    protected $fillable = ['title', 'img', 'alias', 'text', 'desc', 'category_id'];

    public function user()
    {
        return $this->belongsTo('Jbb\User'); //принадлежит к
    }

    public function category()
    {
        return $this->belongsTo('Jbb\Category');
    }

    public function comments()
    {
        return $this->hasMany('Jbb\Comment');
    }
}
