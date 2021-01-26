<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Topluluk;
use App\toplulukFollowers;
use App\User;
use App\userFollowers;
use Illuminate\Http\Request;

class ApiToplulukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {


        $topluluklar = Topluluk::with('user')->get();

        return response()->json(['topluluklar' => $topluluklar],200);
    }


    public function follow(Request $request)
    {
        $key = "a5877455-b8ac-477f-9b7f-ccb9a979f44e";
        if ($request->get('apiKey') == $key) {
        $takipeden = User::all()->where('username','=',$request->takipeden)->first();
        $topluluk = Topluluk::all()->where('id','=',$request->topluluk)->first();
        $followers = new toplulukFollowers();

        $followers->toplulukID = $topluluk->id;
        $followers->userID = $takipeden->id;
        $followers->created_at = date_create();
        $followers->save();
        return response()->json(['success' =>'Topluluk takip edildi.'],200);
    }
    }

    public function unfollow(Request $request)
    {
        $key = "a5877455-b8ac-477f-9b7f-ccb9a979f44e";
        if ($request->get('apiKey') == $key) {
            $takipeden = User::all()->where('username', '=', $request->takipeden)->first();
            $topluluk = Topluluk::all()->where('id', '=', $request->topluluk)->first();

            $followers = toplulukFollowers::all()->where('toplulukID', '=', $topluluk->id)->where('userID', '=', $takipeden->id)
                ->first();

            $followers->delete();

            return response()->json(['success' => 'Topluluk takipten çıkıldı.'], 200);
        }
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

        return response()->json(['topluluk' => $toplulukSingle],200);
    }

}
