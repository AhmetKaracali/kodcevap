<?php

namespace App\Http\Controllers\Api;

use App\cevap;
use App\Etiket;
use App\Http\Controllers\Controller;
use App\postTags;
use App\Soru;
use App\soruEtiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiEtiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etiketler = Etiket::all();


        return response()->json(['etiketler' => $etiketler] ,200);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Etiket  $etiket
     * @return \Illuminate\Http\Response
     */
    public function show(Etiket $etiket)
    {
        $etiketler = soruEtiket::with('sorular')->where('tagID','=',$etiket->id)
        ->get();

        //$etiketler2 =Soru::with('soran','soruEtiketleri')
        //    ->rightJoin('soru_tags','tagID','=','sorus.id')->where('tagID','=',$etiket->id)

         //   ->get();
    //$etiketler2->dd();
        //$questions = Soru::with('writer', 'soru','soruEtiketleri')->where('questionID', '=', $soruid->id)
            //->where('parent', '=', NULL)->get()->flatten();

        return response()->json(['etiketler' => $etiketler, 'etikett' => $etiket],200);
    }



}
