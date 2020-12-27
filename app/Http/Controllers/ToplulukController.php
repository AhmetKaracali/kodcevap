<?php

namespace App\Http\Controllers;

use App\Topluluk;
use App\toplulukFollowers;
use App\User;
use App\userFollowers;
use Illuminate\Http\Request;

class ToplulukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $topluluklar = Topluluk::with('user')->get();


        return view('main.topluluklar',['topluluklar' => $topluluklar] );
    }


    public function follow(Request $request)
    {
        $takipeden = User::all()->where('username','=',$request->takipeden)->first();
        $topluluk = Topluluk::all()->where('id','=',$request->topluluk)->first();
        $followers = new toplulukFollowers();

        $followers->toplulukID = $topluluk->id;
        $followers->userID = $takipeden->id;
        $followers->created_at = date_create();
        $followers->save();
        return response()->json(['success' =>'Topluluk takip edildi.']);
    }

    public function unfollow(Request $request)
    {
        $takipeden = User::all()->where('username','=',$request->takipeden)->first();
        $topluluk = Topluluk::all()->where('id','=',$request->topluluk)->first();

        $followers = toplulukFollowers::all()->where('toplulukID','=',$topluluk->id)->where('userID','=',$takipeden->id)
            ->first();

        $followers->delete();

        return response()->json(['success' =>'Topluluk takipten çıkıldı.']);
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Topluluk  $topluluk
     * @return \Illuminate\Http\Response
     */
    public function show(Topluluk $topluluk)
    {
        $toplulukSingle = Topluluk::with('user')->where('id','=',$topluluk->id)
            ->with('soruTopluluk')->where('id','=',$topluluk->id)->get();


        return view('main.singleTopluluk',['topluluk' => $toplulukSingle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Topluluk  $topluluk
     * @return \Illuminate\Http\Response
     */
    public function edit(Topluluk $topluluk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Topluluk  $topluluk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topluluk $topluluk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Topluluk  $topluluk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topluluk $topluluk)
    {
        //
    }
}
