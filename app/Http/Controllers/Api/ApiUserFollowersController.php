<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\userFollowers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserFollowersController extends Controller
{


    public function follow(Request $request)
    {
        $key = "a5877455-b8ac-477f-9b7f-ccb9a979f44e";
        if ($request->get('apiKey') == $key) {
            $takipeden = User::all()->where('username', '=', $request->takipeden)->first();
            $takipedilen = User::all()->where('id', '=', $request->takipedilen)->first();
            $followers = new userFollowers();

            $followers->followed = $takipedilen->id;
            $followers->follower = $takipeden->id;
            $followers->date = date_create();
            $followers->save();
            return response()->json(['success' => 'Takip edildi.'], 200);
        }
    }

    public function unfollow(Request $request)
    {
        $key = "a5877455-b8ac-477f-9b7f-ccb9a979f44e";
        if ($request->get('apiKey') == $key) {
            $takipeden = User::all()->where('username', '=', $request->takipeden)->first();
            $takipedilen = User::all()->where('id', '=', $request->takipedilen)->first();

            $followers = userFollowers::all()->where('followed', '=', $takipedilen->id)->where('follower', '=', $takipeden->id)
                ->first();

            $followers->delete();

            return response()->json(['success' => 'Takipten çıkıldı.'], 200);
        }
    }
}
