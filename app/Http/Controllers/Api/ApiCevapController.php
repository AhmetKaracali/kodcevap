<?php

namespace App\Http\Controllers\Api;

use App\cevap;
use App\Soru;
use App\User;
use App\userActivity;
use App\userPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ApiCevapController extends Controller
{
        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $cevap = new cevap();

        $cevap->owner = $request['author'];
        $cevap->questionID = $request['qid'];
        $cevap->body = $request['mytextarea'];
        $cevap->created_at = date_create();
        $cevap->parent = $request['comment_parent'];
        $cevap->score = 0;
        $cevap->isSolution = 0;

        $cevap->save();

        $user = User::all()->where('id','=',$request['author'])->first();
        $soru = Soru::all()->where('id','=',$cevap->questionID)->first();

        $user->points += 5;
        $user->save();

        $aktivite = new userActivity();
        $aktivite->activityType = 6;
        $aktivite->user = $user->id;
        $aktivite->url = "/soru/".$soru->slug;
        $aktivite->date = date_create();
        $aktivite->save();

        $puan = new userPoint();
        $puan->pointType = 2;
        $puan->user = $user->id;
        $puan->url = "/soru/" .$soru->slug;
        $puan->pointValue = 5;
        $puan->date = date_create();
        $puan->save();

        return response()->json('Success',200);


    }

    public function cozumisaret(Request $request)
    {
        $cevap = $request->commentID;

        $cevap = cevap::all()->where('id','=',$cevap)->first();

        $owner = User::all()->where('id','=',$cevap->owner)->first();

        $soru = Soru::all()->where('id','=',$cevap->questionID)->first();

        if (Auth::guest())
        {

        }
        else
        {
            $cevap->isSolution = 1;
            $owner->points += 10;
            $soru->solved = 1;

            $puan = new userPoint();
            $puan->pointType = 7;
            $puan->user = $owner->id;
            $puan->url = "/soru/" .$soru->slug."/#comment-".$cevap->id;
            $puan->pointValue = 10;
            $puan->date = date_create();

            $puan->save();

            $cevap->save();
            $owner->save();
            $soru->save();

            return response()->json(['success' =>'Çözüm işaretlendi.'],200);
        }
    }

    public function voted(Request $request)
    {
        $cevap = $request->commentid;
        $user = User::all()->where('username','=',$request->voter)->first();
        $cevap = cevap::all()->where('id','=',$cevap)->first();
        $cevapOwner = User::all()->where('id','=',$cevap->owner)->first();
        $soru = Soru::all()->where('id','=',$cevap->questionID)->first();

        if (Auth::guest())
        {
            return response()->json('Önce giriş yapmalısınız.',404);
        }
        else
        {

            if($request->voteType ==1)
            {
                $cevap->score += 1;

                $aktivite = new userActivity();
                $aktivite->activityType = 3;
                $aktivite->user = $user->id;
                $aktivite->url = "/soru/". $soru->slug."/#comment-".$cevap->id;
                $aktivite->date = date_create();
                $aktivite->save();

                $puan = new userPoint();
                $puan->pointType = 5;
                $puan->user = $cevap->owner;
                $puan->url = "/soru/" .$soru->slug."/#comment-".$cevap->id;
                $puan->pointValue = 1;
                $puan->date = date_create();

                $cevapOwner->points +=1;
                $cevapOwner->save();
                $puan->save();
            }
            else{
                $cevap->score -= 1;
                $aktivite = new userActivity();
                $aktivite->activityType = 4;
                $aktivite->user = $user->id;
                $aktivite->url = "/soru/".$soru->slug."/#comment-".$cevap->id;
                $aktivite->date = date_create();
                $aktivite->save();

                $puan = new userPoint();
                $puan->pointType = 6;
                $puan->user = $cevap->owner;
                $puan->url = "/soru/" .$soru->slug."/#comment-".$cevap->id;
                $puan->pointValue = -1;
                $puan->date = date_create();

                $cevapOwner->points -=1;
                $cevapOwner->save();
                $puan->save();
            }

            $cevap->save();
            return response()->json(['success' =>'Oy verildi.'],200);

        }
    }

}
