<?php

namespace App\Http\Controllers;

use App\Kodcevap;
use App\Soru;
use Illuminate\Http\Request;

class KodcevapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */


    public function index()
    {
        if(request()->has('show')) {
            if (request()->get('show') == "most-voted") {
                $sorus = Soru::with('soran')->orderByDesc('vote')->paginate('20');
            } elseif (request()->get('show') == "most-views") {
                $sorus = Soru::with('soran')->orderByDesc('views')->paginate('20');
            } else {
                $sorus = Soru::with('soran')->orderByDesc('crdate')->paginate('20');
            }

        }
        else
        {
            $sorus = Soru::with('soran')->orderByDesc('crdate')->paginate('20');
        }

        return view('main.home')->with(['site' => Kodcevap::findOrFail(1), 'sorus' => $sorus]);

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
     * @param  \App\Kodcevap  $kodcevap
     * @return \Illuminate\Http\Response
     */
    public function show(Kodcevap $kodcevap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kodcevap  $kodcevap
     * @return \Illuminate\Http\Response
     */
    public function edit(Kodcevap $kodcevap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kodcevap  $kodcevap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kodcevap $kodcevap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kodcevap  $kodcevap
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kodcevap $kodcevap)
    {
        //
    }
}
