<?php

namespace App\Http\Controllers;

use App\User;
use App\userFollowers;
use Illuminate\Http\Request;

class UserFollowersController extends Controller
{


    public function follow(Request $request)
    {
            $takipeden = User::all()->where('username','=',$request->takipeden)->first();
            $takipedilen = User::all()->where('id','=',$request->takipedilen)->first();
            $followers = new userFollowers();

            $followers->followed = $takipedilen->id;
            $followers->follower = $takipeden->id;
            $followers->date = date_create();
            $followers->save();
        return response()->json(['success' =>'Takip edildi.']);
    }

    public function unfollow(Request $request)
    {
        $takipeden = User::all()->where('username','=',$request->takipeden)->first();
        $takipedilen = User::all()->where('id','=',$request->takipedilen)->first();

        $followers = userFollowers::all()->where('followed','=',$takipedilen->id)->where('follower','=',$takipeden->id)
            ->first();

        $followers->delete();

        return response()->json(['success' =>'Takipten çıkıldı.']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\userFollowers  $userFollowers
     * @return \Illuminate\Http\Response
     */
    public function show(userFollowers $userFollowers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\userFollowers  $userFollowers
     * @return \Illuminate\Http\Response
     */
    public function edit(userFollowers $userFollowers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\userFollowers  $userFollowers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, userFollowers $userFollowers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\userFollowers  $userFollowers
     * @return \Illuminate\Http\Response
     */
    public function destroy(userFollowers $userFollowers)
    {
        //
    }
}
