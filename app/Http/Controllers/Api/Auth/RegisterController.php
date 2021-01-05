<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }


    public function register(Request $request)
    {

        $request->validate(
            [
                'isim' => ['required', 'string', 'max:255'],
                'username' => ['required', 'string', 'min:4', 'max:10', 'unique:users'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'pass1' => ['required', 'confirmed', 'string', 'min:8'],
                'birthdate' => ['required', 'date'],
            ]
        );

        $user = $this->create($request->all());
    return redirect()->back()->with('message','Kayıt başarılı.');
    }

    public function registerWithApi(Request $request)
    {

        $request->validate(
            [
                'isim' => ['required', 'string', 'max:255'],
                'username' => ['required', 'string', 'min:4', 'max:10', 'unique:users'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'pass1' => ['required', 'confirmed', 'string', 'min:8'],
                'birthdate' => ['required', 'date'],
            ]
        );

        $user = $this->create($request->all());
        return response()->json('Kayit Basarili.',200);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'isim' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'min:4', 'max:10', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'pass1' => ['required', 'string', 'min:8', 'confirmed'],
            'birthdate' => ['required', 'date', 'max:now'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['isim'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['pass1']),
            'birthdate' => $data['birthdate'],
            'regDate' => date(now()),
            'about' => '',
            'email_verified_at' => null,
        ]);
    }
}
