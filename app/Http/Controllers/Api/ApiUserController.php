<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\userActivity;
use App\userPoint;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Pagination;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ApiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function registerWithApi(Request $request)
    {

           User::create([
            'name' => $request->get('isim'),
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('pass1')),
            'birthdate' => $request->get('birthdate'),
            'regDate' => date(now()),
            'about' => '',
            'email_verified_at' => null,
        ]);
        return response()->json('Kayit Basarili.',200);
    }


    public function loginAPI(Request $request)
    {
        $keys = $request->only('username','password');
        $user = User::all()->where('username', '=',$keys['username'])->first();

        if(!Auth::check()) {
            if (Auth::attempt($keys)) {
                session([ 'user' =>  $user]);
                return response()->json('Success',200);

            } else {
                return response()->json('Error',404);
            }
        }
    }

    public function showAbout(User $user)
    {
        $profileData = User::with('sorular','soruCevaplar','topluluks','followers','follows')->where('id','=',$user->id)
            ->firstOrFail();


        return response()->json(['data' =>$profileData],200);
    }

    public function showQuestions(User $user)
    {
        $profileData = User::with('sorular','followers','follows')->where('id','=',$user->id)
            ->firstOrFail();


        return response()->json(['data' =>$profileData],200);
    }

    public function showAnswers(User $user)
    {
        $profileData = User::with('sorular','soruCevaplar','topluluks','followers','follows')->where('id','=',$user->id)
            ->firstOrFail();



        return response()->json(['data' =>$profileData],200);
    }

    public function showSolutions(User $user)
    {
        $profileData = User::with('sorular','soruCevaplar','topluluks','followers','follows')->where('id','=',$user->id)
            ->firstOrFail();

        return response()->json(['data' =>$profileData],200);
    }

    public function showTakipci(User $user)
    {
        $profileData = User::with('sorular','soruCevaplar','topluluks','followers','follows')->where('id','=',$user->id)
            ->firstOrFail();

        return response()->json(['data' =>$profileData],200);
    }

    public function showTakip(User $user)
    {
        $profileData = User::with('sorular','soruCevaplar','topluluks','followers','follows')->where('id','=',$user->id)
            ->firstOrFail();

        return response()->json(['data' =>$profileData],200);
    }

    public function showActivity(User $user)
    {
        if(Auth::guest())
        {
            return redirect('/');
        }
        else if(Auth::user()->username == $user->username)
        {
            $activity = userActivity::all()->where('user','=',$user->id)->sortByDesc('id');

            $profileData = User::with('sorular','followers','follows')->where('id','=',$user->id)
                ->firstOrFail();

            return response()->json(['activity' => $activity, 'data' =>$profileData],200);
        }
        else
        {
            return redirect('/');
        }
    }

    public function showPoints(User $user)
    {
        if(Auth::guest())
        {
            return redirect('/');
        }
        else if(Auth::user()->username == $user->username)
        {
            $points = userPoint::all()->where('user','=',$user->id)->sortByDesc('id');

            $profileData = User::with('sorular','followers','follows')->where('id','=',$user->id)
                ->firstOrFail();

            return response()->json(['points' => $points, 'data' =>$profileData],200);
        }
        else
        {
            return redirect('/');
        }
    }

    public function showUsers()
    {
        $profileData = DB::table('users')->paginate(6);

        $sayfaSayisi = $profileData->total() / $profileData->perPage();

        return response()->json(['data' =>$profileData, 'sayfaSayisi' => $sayfaSayisi],200);
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(String $user)
    {
           $myUser = User::all()->where('username','=',$user)->first();


            return response()->json(['user' =>$myUser],200);
    }
    public function changepw(String $user)
    {
        $myUser = User::all()->where('username','=',$user)->first();


        return response()->json(['user' =>$myUser]);
    }
    public function updatepw(Request $request, User $user)
    {
        $request->validate(
            [
                'oldpassword' => ['required', 'string', 'min:8'],
                'newpassword' => ['required', 'confirmed', 'string', 'min:8'],
            ]
        );


        if(Hash::check($request->oldpassword,$user->password))
        {
            $user->password = Hash::make($request->newpassword);
            $user->save();

            return response()->json(['message' =>'Şifre Başarıyla değiştirildi.'],200);

        }
        else
        {
            return response()->json(['message' =>'Şifre değiştirme başarısız! Lütfen mevcut şifrenizi doğru girin.'],404);

        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, User $user)
    {

        if($request->hasFile('userpp')){
            $image = $request->file('userpp');
            $filename = $user->username . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save( 'fileserver/uploads/userpp/' . $filename );
            $userpp = '/fileserver/uploads/userpp/' . $filename;
            $user->ppURL = $userpp;
        };

        if ($request->hasFile('userCover'))
        {
            $image = $request->file('userCover');
            $filename = $user->username . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('fileserver/uploads/userCover/' . $filename );
            //Image::make($image)->resize(300, 300)->save('fileserver/uploads/userCover/' . $filename );
            $userCover = '/fileserver/uploads/userCover/' . $filename;
            $user->userCover = $userCover;
        }

        $user->name = $request->get('isim');
        $user->email = $request->get('email');
        $user->birthdate = $request->get('age');
        $user->about = $request->get('bio');
        $user->cinsiyet = $request->get('gender');
        $user->konum = $request->get('konum');
        $user->facebookURL = $request->get('facebook');
        $user->instagramURL = $request->get('instagram');
        $user->twitterURL = $request->get('twitter');
        $user->linkedinURL = $request->get('linkedin');

        $user->save();


        return response()->json(['message' =>'Profil güncelleme başarılı.'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
