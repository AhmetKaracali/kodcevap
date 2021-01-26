<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Kodcevap;
use App\Soru;
use App\User;
use App\userFollowers;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ApiKodcevapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */


    public function index()
    {
        if(request()->has('show')) {
            if (request()->get('show') == "most-voted") {
                $sorus = Soru::with('soran')->orderByDesc('vote')->paginate('20');
            } elseif (request()->get('show') == "most-views") {
                $sorus = Soru::with('soran')->orderByDesc('views')->paginate('20');
            } elseif (request()->get('show') == "timeline") {
                $user = User::with('follows')->where('username','=',request()->get('user'))->first();
                //$userFollows = userFollowers::all()->where('follower','=',$user->id);
                $collection = new Collection();
                foreach($user->follows as $uuu)
                {
                    //$userFollowing = User::all()->where('id','=',$uuu->followed);
                    $sorulari = Soru::with('soran')->where('owner','=',$uuu->followed)->orderByDesc('crdate')->get();
                    $collection = $collection->merge($sorulari);
                }
                $collection->sortByDesc('crdate');

                return response()->json(['site' => Kodcevap::findOrFail(1), 'sorus' => $collection],200);
            }else {
                $sorus = Soru::with('soran')->orderByDesc('crdate')->paginate('20');
            }

        }
        else
        {
            $sorus = Soru::with('soran')->orderByDesc('crdate')->paginate('20');
        }

        return response()->json(['site' => Kodcevap::findOrFail(1), 'sorus' => $sorus],200);

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
