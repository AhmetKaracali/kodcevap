<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Yorum;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class YorumController extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
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

        return response()->json('Yorum gonderildi.',200);
    }

}
