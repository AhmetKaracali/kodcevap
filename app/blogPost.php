<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blogPost extends Model
{
    protected $table = 'blog_posts';
    protected $fillable = array('slug', 'title', 'body', 'seoDesc', 'owner', 'gorsel', 'views');

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function tags()
    {
        return $this->hasMany(postTags::class,'postID','id');
    }

    public function categories()
    {
        return $this->hasMany(postCategories::class,'postID','id');
    }

    public function comments()
    {
        return $this->hasMany(Yorum::class,'postID','id');
    }

    public function writer()
    {
        return $this->belongsTo(User::class,'owner','id','owner');
    }
}
