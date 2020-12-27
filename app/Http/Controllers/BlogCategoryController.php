<?php

namespace App\Http\Controllers;

use App\blogCategory;
use App\blogPost;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class BlogCategoryController extends Controller
{

    public function index()
    {

    }

    public function paginateit($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function show(blogCategory $category)
    {
        $catPosts = blogCategory::with('posts')->where('id','=',$category->id)->get();

        $posts = BlogCategoryController::paginateit($catPosts->first()->posts);
        $categories = blogCategory::all();
        return view('blog.singleCategory')->with(['posts' => $posts, 'categories' => $categories]);


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

    public function destroy(blogCategory $category)
    {
        $category->delete();
    }
}
