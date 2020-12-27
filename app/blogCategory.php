<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blogCategory extends Model
{
    protected $table = 'blog_categories';
    protected $fillable = array('slug', 'name', 'seoTitle', 'seoDesc');
    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function posts()
    {
        return $this->hasManyThrough(blogPost::class,postCategories::class,'catID','id','id','catID');
    }
}
