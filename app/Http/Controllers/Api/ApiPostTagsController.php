<?php

namespace App\Http\Controllers\Api;

use App\blogTag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiPostTagsController extends Controller
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
