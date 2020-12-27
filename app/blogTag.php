<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blogTag extends Model
{
    protected $table = 'blog_tags';
    protected $fillable = array('id', 'slug', 'tagName');
    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function postTags()
    {
        return $this->hasMany(postTags::class,'tagID','id');
    }

}
