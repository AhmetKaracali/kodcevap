<?php

namespace App\Http\Controllers;

use App\blogCategory;
use App\blogPost;
use App\Yorum;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{

    public function index()
    {
        $blogPosts = blogPost::with('tags','categories','comments','writer')->orderByDesc('created_at')
            ->paginate('10');
        $categories = blogCategory::all();

        return view('blog.blog')->with(['posts' => $blogPosts, 'categories' => $categories]);
    }

    public function show(blogPost $post)
    {
        $blogPost = blogPost::with('tags','categories','comments','writer')->where('slug','=',$post->slug)
        ->firstOrFail();

        $commentAnswers2 = Yorum::all()->where('postID','=',$post->id)->where('parent','!=',NULL);

        $commentAnswers = Yorum::with('yorumOwner')->where('postID','=',$post->id)->where('parent','!=',NULL)
         ->get();

        $categories = blogCategory::all();


        return view('blog.singleBlog')->with(['post' => $blogPost, 'categories' => $categories, 'commentAnswers' => $commentAnswers]);
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

    public function destroy(blogPost $post)
    {
        $post->delete();
    }
}
