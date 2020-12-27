<?php

namespace App\Http\Controllers;

use App\cevap;
use App\Etiket;
use App\postTags;
use App\Soru;
use App\soruEtiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EtiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etiketler = Etiket::all();


        return view('main.etiketler',['etiketler' => $etiketler] );
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

        return view('main.singleEtiket',['etiketler' => $etiketler, 'etikett' => $etiket] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Etiket  $etiket
     * @return \Illuminate\Http\Response
     */
    public function edit(Etiket $etiket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Etiket  $etiket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etiket $etiket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Etiket  $etiket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etiket $etiket)
    {
        //
    }
}
