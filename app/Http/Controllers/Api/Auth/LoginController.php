<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $keys = $request->only('username','password');
        $user = User::all()->where('username', '=',$keys['username'])->first();

        if(!Auth::check()) {
            if (Auth::attempt($keys)) {
                session([ 'user' =>  $user]);
            return redirect('/');

            } else {
                return redirect('/giris')->with('error', 'hata.');
            }
        }
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

    public function logout(Request $request)
    {
            if(Auth::check())
            {
                Auth::logout();
                return redirect('/');
            }

    }
}
