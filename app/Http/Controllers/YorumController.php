<?php

namespace App\Http\Controllers;

use App\Yorum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class YorumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $yorum = new Yorum();

        $yorum->owner = $request->author;
        $yorum->parent = $request['comment_parent'];
        $yorum->postID = $request->blogid;
        $yorum->comment = $request->blogyorum;

        $yorum->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Yorum  $yorum
     * @return \Illuminate\Http\Response
     */
    public function show(Yorum $yorum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Yorum  $yorum
     * @return \Illuminate\Http\Response
     */
    public function edit(Yorum $yorum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Yorum  $yorum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Yorum $yorum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Yorum  $yorum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Yorum $yorum)
    {
        //
    }
}
