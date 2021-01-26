<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\toplulukFollowers;
use App\userActivity;
use App\userFollowers;
use App\userPoint;
use http\Env\Response;
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
use PhpParser\Node\Expr\Array_;

class ApiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function registerWithApi(Request $request)
    {

        $key = "a5877455-b8ac-477f-9b7f-ccb9a979f44e";
        if ($request->get('apiKey') == $key){

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
            return response()->json('Kayit Basarili.', 200);


        }
        else {
            return response()->json('API KEY IS WRONG',404);
        }
    }


    public function loginAPI(Request $request)
    {
        $keys = $request->only('username','password');
        $user = User::all()->where('username', '=',$keys['username'])->first();

        $key = "a5877455-b8ac-477f-9b7f-ccb9a979f44e";
        if ($request->get('apiKey') == $key){

        if(!Auth::check()) {
            if (Auth::attempt($keys)) {
                session([ 'user' =>  $user]);
                return response()->json('Success',200);

            } else {
                return response()->json('Error: Wrong username or password.',404);
            }
        }
        }
        else{
            return response()->json('Error: API CODE IS WRONG.',404);
        }
    }

    public function showAbout(User $user)
    {
        $profileData = User::with('sorular','soruCevaplar','topluluks','followers','follows')->where('id','=',$user->id)
            ->firstOrFail();


        return response()->json(['data' =>$profileData],200);
    }
    public function getUserByID(Request $request)
    {
        $userData = User::all()->where('id','=',$request->get('userID'));
        return response()->json(['userData' => $userData],200);
    }
    public function getPopularUsers()
    {
        $popularUsers = User::all()->sortByDesc('points');

        return response()->json(['popularUsers' => $popularUsers],200 );
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
        $followers = $profileData->followers;

        $userDatas = collect();
        foreach ($followers as &$user) {
            $singleUser = User::with('followers','follows')->where('id','=',$user->id)
                ->firstOrFail();
            $userDatas->add($singleUser);
        }
        //dd($userDatas->toArray());
        return response()->json(['data' =>$userDatas->toArray()],200);
    }

    public function showTakip(User $user)
    {
        $profileData = User::with('followers','follows')->where('id','=',$user->id)
            ->firstOrFail();

        $follows = $profileData->follows;

        $userDatas = collect();
        foreach ($follows as &$user) {
            $singleUser = User::with('followers','follows')->where('id','=',$user->id)
                ->firstOrFail();
            $userDatas->add($singleUser);
        }
        //dd($userDatas->toArray());
        return response()->json(['data' =>$userDatas->toArray()],200);

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

    public function showNotifications(Request $request)
    {
        $key = "a5877455-b8ac-477f-9b7f-ccb9a979f44e";
        if($request->get('apiKey') != $key)
        {
            return response()->json("API KEY HATALI.",404);
        }
        else
        {

            $user = User::all()->where('username',"=",$request->get('username'))->first();
            $points = userPoint::all()->where('user','=',$user->id)->sortByDesc('id');


            return response()->json(['points' => $points],200);
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
     * @return \Illuminate\Http\JsonResponse
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

        $key = "a5877455-b8ac-477f-9b7f-ccb9a979f44e";
        if ($request->get('apiKey') == $key) {
            if (Hash::check($request->oldpassword, $user->password)) {
                $user->password = Hash::make($request->newpassword);
                $user->save();

                return response()->json(['message' => 'Şifre Başarıyla değiştirildi.'], 200);

            } else {
                return response()->json(['message' => 'Şifre değiştirme başarısız! Lütfen mevcut şifrenizi doğru girin.'], 404);

            }
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
        $key = "a5877455-b8ac-477f-9b7f-ccb9a979f44e";
        if ($request->get('apiKey') == $key){

            if ($request->hasFile('userpp')) {
            $image = $request->file('userpp');
            $filename = $user->username . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('fileserver/uploads/userpp/' . $filename);
            $userpp = '/fileserver/uploads/userpp/' . $filename;
            $user->ppURL = $userpp;
        };

        if ($request->hasFile('userCover')) {
            $image = $request->file('userCover');
            $filename = $user->username . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('fileserver/uploads/userCover/' . $filename);
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


        return response()->json(['message' => 'Profil güncelleme başarılı.'], 200);
        }
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

    public function questionVoteHelper(Request $request)
    {
        $question = $request->get('question');
        $user = $request->get('user');
        $activity = userActivity::all()->where('user', '=', $user)->where('url', '=', $question)
            ->where('activityType', '<=', 2)->first();

        if ($activity == null) {
            return response()->json(['activity' => 0],200);
        } else {
            $result = $activity->activityType;

            if ($result == 1) {
                return response()->json(['activity' => 1],200);
            } else if ($result == 2) {
                return response()->json(['activity' => 2], 200);
            }
        }
    }

    public function answerVoteHelper(Request $request)
    {
        $answer = $request->get('answer');
        $user = $request->get('user');
        $activity = userActivity::all()->where('user','=',$user)->where('url','=',$answer)
            ->where('activityType','<',5)->first();

        if ($activity == null)
        {
            return response()->json(['activity' => 0],200);
        }
        else{
            $result = $activity->activityType;

            if ($result == 3)
            {
                return response()->json(['activity' => 3]);
            }
            else if ( $result == 4)
                return response()->json(['activity' => 4]);
        }
    }

    public function userFollowHelper(Request $request)
    {
        $key1 = $request->get('user');
        $key2 = $request->get('isFollowing');

        $return = userFollowers::all()->where('followed','=',$key2)
            ->where('follower','=',$key1)->isNotEmpty();

        return response()->json(['following' => $return]);
    }

    public function toplulukFollowHelper(Request $request)
    {
        $user = $request->get('user');
        $community = $request->get('community');
        $result = toplulukFollowers::all()->where('userID','=',$user)
            ->where('toplulukID','=',$community)->isNotEmpty();
        return response()->json(['following' => $result]);
    }
}
