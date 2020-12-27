<?php

namespace App\Http\Controllers;

use App\User;
use App\userActivity;
use Illuminate\Http\Request;

class UserActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(int $activity, int $identifier, User $user)
    {


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
     * @param  \App\userActivity  $userActivity
     * @return \Illuminate\Http\Response
     */
    public function show(userActivity $userActivity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\userActivity  $userActivity
     * @return \Illuminate\Http\Response
     */
    public function edit(userActivity $userActivity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\userActivity  $userActivity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, userActivity $userActivity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\userActivity  $userActivity
     * @return \Illuminate\Http\Response
     */
    public function destroy(userActivity $userActivity)
    {
        //
    }
}
