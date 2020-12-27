<?php
use App\blogCategory;
use App\blogTag;
use App\blogPost;

if (! function_exists('getCategoryData')) {
    function getCategoryData($key, $default = null)
    {

        $category = blogCategory::all()->where('id','=',$key)->first();

        return $category;
    }
}

if (! function_exists('getTagData')) {
    function getTagData($key, $default = null)
    {

        $tag = blogTag::all()->where('id','=',$key)->first();

        return $tag;
    }
}


if (! function_exists('getPrevious')) {
    function getPrevious($key, $default = null)
    {
        $key = $key-1;
        $previous = blogPost::all()->where('id','=',$key)->first();

        return $previous;
    }
}

if (! function_exists('getNext')) {
    function getNext($key, $default = null)
    {
        $key = $key+1;
        $next = blogPost::all()->where('id','=',$key)->first();

        return $next;
    }
}
