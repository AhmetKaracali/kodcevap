<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yorum extends Model
{
    protected $table = 'yorums';
    protected $fillable = array('owner', 'postID', 'comment');

    public function post()
    {
        return $this->belongsTo(blogPost::class,'id','postID','blogPost');
    }

    public function yorumOwner()
    {
        return $this->belongsTo(User::class,'owner','id','yorumOwner');
    }
}
