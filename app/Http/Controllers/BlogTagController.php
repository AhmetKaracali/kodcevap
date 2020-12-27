<?php

namespace App\Http\Controllers;

use App\blogTag;
use Illuminate\Http\Request;

class BlogTagController extends Controller
{
    public function index()
    {

    }

    public function show(blogTag $tag)
    {

    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function update(Request $request)
    {

    }

    public function destroy(blogTag $tag)
    {
        $tag->delete();
    }
}
