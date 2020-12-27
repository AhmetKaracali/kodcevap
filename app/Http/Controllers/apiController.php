<?php


namespace App\Http\Controllers;
use App\cevap;
use App\Etiket;
use App\Soru;
use App\soruEtiket;
use App\Topluluk;
use App\User;
use App\userActivity;
use App\userPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class apiController
{
    public function getSoru(Soru $soruid)
    {

        $data = Soru::with('soran')->where('id','=',$soruid->id)->firstOrFail();
        $comments = cevap::with('writer', 'soru')->where('questionID', '=', $soruid->id)
            ->where('parent', '=', NULL)->get()->flatten();
        $commentAnswers = cevap::with('writer', 'soru')->where('questionID', '=', $soruid->id)
            ->where('parent', '!=', NULL)->get();

        $commentCount =$comments->count() + $commentAnswers->count();
        $etiketler = soruEtiket::getSoruEtikets($soruid)->get()->unique('tagID');

        if($topluluk = Topluluk::find($soruid->toplulukID)!=NULL)
        {
            $topluluk = Topluluk::all()->where('id','=',$soruid->toplulukID);
        }
        else
        {
            $topluluk=Topluluk::all()->where('id','=','2');
        }
        DB::table('sorus')->where('id','=',$soruid->id)->increment('views',1);

        $soruJSON = $data->toArray();
        $commentJSON = $comments->toArray();
        $etiketlerJSON = $etiketler->toArray();

        $arraymerged = array_merge($soruJSON, $commentJSON);

        //dd(json_encode($arraymerged));

        return response()->json(['data' => $data , 'comments' => $comments, 'etikets' => $etiketler,
            'commentCount' => $commentCount, 'topluluks' => $topluluk, 'commentAnswers' =>$commentAnswers],200);

        /*return view('main.singleQuestion',['data' => $data , 'comments' => $comments, 'etikets' => $etiketler,
            'commentCount' => $commentCount, 'topluluks' => $topluluk, 'commentAnswers' =>$commentAnswers] );
        */
    }
}
