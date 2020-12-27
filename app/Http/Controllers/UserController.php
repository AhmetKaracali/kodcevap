<?php

namespace App\Http\Controllers;

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

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */


    public function index()
    {


    }

    public function showAbout(User $user)
    {
        $profileData = User::with('sorular','soruCevaplar','topluluks','followers','follows')->where('id','=',$user->id)
            ->firstOrFail();


        return view('profile.profile',['data' =>$profileData]);
    }

    public function showQuestions(User $user)
    {
        $profileData = User::with('sorular','followers','follows')->where('id','=',$user->id)
            ->firstOrFail();


        return view('profile.userQuestions',['data' =>$profileData]);
    }

    public function showAnswers(User $user)
    {
        $profileData = User::with('sorular','soruCevaplar','topluluks','followers','follows')->where('id','=',$user->id)
            ->firstOrFail();



        return view('profile.userAnswers',['data' =>$profileData]);
    }

    public function showSolutions(User $user)
    {
        $profileData = User::with('sorular','soruCevaplar','topluluks','followers','follows')->where('id','=',$user->id)
            ->firstOrFail();

        return view('profile.userSolutions',['data' =>$profileData]);
    }

    public function showTakipci(User $user)
    {
        $profileData = User::with('sorular','soruCevaplar','topluluks','followers','follows')->where('id','=',$user->id)
            ->firstOrFail();

        return view('profile.takipci',['data' =>$profileData]);
    }

    public function showTakip(User $user)
    {
        $profileData = User::with('sorular','soruCevaplar','topluluks','followers','follows')->where('id','=',$user->id)
            ->firstOrFail();

        return view('profile.takip',['data' =>$profileData]);
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

            return view('profile.userActivity', ['activity' => $activity, 'data' =>$profileData]);
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

            return view('profile.userPoints', ['points' => $points, 'data' =>$profileData]);
        }
        else
        {
            return redirect('/');
        }
    }

    public function showUsers()
    {
        $profileData = DB::table('users')->paginate(6);

        $sayfaSayısı = $profileData->total() / $profileData->perPage();

        return view('main.users',['data' =>$profileData, 'sayfaSayisi' => $sayfaSayısı]);
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
        die($request->email);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(String $user)
    {
           $myUser = User::all()->where('username','=',$user)->first();


            return view('profile.editProfile')->with('user', $myUser);
    }
    public function changepw(String $user)
    {
        $myUser = User::all()->where('username','=',$user)->first();


        return view('profile.changepw')->with('user', $myUser);
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

            return redirect()->back()->with('message','Şifre Başarıyla değiştirildi.');
        }
        else
        {
            return redirect()->back()->with('message', 'Şifre değiştirme başarısız! Lütfen mevcut şifrenizi doğru girin.');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
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


        return redirect()->back()->with('message','Profil güncelleme başarılı.');
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
