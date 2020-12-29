<?php


namespace App\Http\Controllers\Api;
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

    // SORU FONKSİYONLARI
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

    public function store(Request $request)
    {

        $user = $request->get('username');

        $soru = new Soru();
        $soru->title = $request->get('soruTitle');
        $soru->slug = Str::slug($soru->title,'-');
        if ($request->get('topluluk') ==0)
        {
            $soru->toplulukID = null;
        }
        else
        {
            $soru->toplulukID = $request->get('topluluk');
        }

        $soru->body = $request->get('mytextarea');
        $soru->owner = $user->id;
        $soru->crdate = date_create();

        $soru->save();


        $etikets = explode(',',$request->get('etiketler'));

        foreach ($etikets as $etiket)
        {
            $count = Etiket::all()->where('name','=',$etiket)->count();
            if ($count <1)
            {
                $newEtiket = new Etiket();
                $newEtiket->name = $etiket;
                $newEtiket->slug = Str::slug($newEtiket->name,'-');
                $newEtiket->color = '#88742c';
                $newEtiket->save();

                $soruEtiket = new soruEtiket();
                $soruEtiket->soruID = Soru::getSoru($soru)->id;
                $soruEtiket->tagID = Etiket::all()->where('slug','=',$newEtiket->slug)->first()->id;
                $soruEtiket->save();
            }
            else
            {
                $soruEtiket = new soruEtiket();
                $soruEtiket->soruID = Soru::getSoru($soru)->id;
                $soruEtiket->tagID = Etiket::all()->where('slug','=',$etiket)->first()->id;
                $soruEtiket->save();
            }
        }

        $aktivite = new userActivity();
        $aktivite->activityType = 5;
        $aktivite->user = $user->id;
        $aktivite->url = "/soru/" .$soru->slug;
        $aktivite->date = date_create();
        $aktivite->save();

        $puan = new userPoint();
        $puan->pointType = 1;
        $puan->user = $user->id;
        $puan->url = "/soru/" .$soru->slug;
        $puan->pointValue = 2;
        $puan->date = date_create();
        $puan->save();

        return response()->json('Sorunuz paylaşıldı.',201);

    }

    public function voteQuestion(Request $request)
    {
        $soru = $request->postid;

        $soru = Soru::all()->where('id','=',$soru)->first();
        $user = User::all()->where('username','=',$request->voter)->first();
        $soruOwner = User::all()->where('id','=',$soru->owner)->first();

        if($request->voteType ==1)
        {
            $soru->vote += 1;

            $aktivite = new userActivity();
            $aktivite->activityType = 1;
            $aktivite->user = $user->id;
            $aktivite->url = "/soru/". $soru->slug;
            $aktivite->date = date_create();
            $aktivite->save();

            $puan = new userPoint();
            $puan->pointType = 3;
            $puan->user = $soru->owner;
            $puan->url = "/soru/" .$soru->slug;
            $puan->pointValue = 1;
            $puan->date = date_create();

            $soruOwner->points +=1;
            $soruOwner->save();
            $puan->save();


        }
        else{
            $soru->vote -= 1;

            $aktivite = new userActivity();
            $aktivite->activityType = 2;
            $aktivite->user = $user->id;
            $aktivite->url = "/soru/".$soru->slug;
            $aktivite->date = date_create();
            $aktivite->save();

            $puan = new userPoint();
            $puan->pointType = 4;
            $puan->user = $soru->owner;
            $puan->url = "/soru/" .$soru->slug;
            $puan->pointValue = -1;
            $puan->date = date_create();

            $soruOwner->points -=1;
            $soruOwner->save();
            $puan->save();

        }

        $soru->save();
        return response()->json(['success' =>'Oy verildi.']);

    }
}
