<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class postCategories extends Model
{
    protected $table = 'postcategories';
    protected $fillable = array('id', 'postID', 'catID','created_at','updated_at');

    public function post()
    {
        return $this->belongsTo(blogPost::class,'id','postID','categories');
    }
}
