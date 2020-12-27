<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class postTags extends Model
{
    protected $table = 'posttags';
    protected $fillable = array('postID', 'tagID');

    public function post()
    {
        return $this->belongsTo(blogPost::class,'id','postID','post');
    }

    public function tag()
    {
        return $this->belongsTo(blogTag::class,'id','tagID','tag');
    }

}
