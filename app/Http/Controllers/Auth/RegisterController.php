<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/added';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $newUser
     * @return \App\Models\User
     */
    protected function create(array $newUser)
    {
        return User::create([
            'username' => $newUser['username'],
            'mail' => $newUser['mail'],
            'password' => bcrypt($newUser['password']),
        ]);
    }

    public function register(Request $request)
    {
        if ($request->isMethod('post')) {

            $request->validate([
                'username' => 'required|string|between:4,12',
                'mail' => 'required|string|email|min:4|unique:users',
                'password' => 'required|alpha_num|between:4,12|confirmed',
                'password_confirmation' => 'required',
            ]);

            $newUser = $request->input();
            $this->create($newUser);

            return redirect()->route('show.added');
        }
        return view('auth.register');
    }

    public function added()
    {
        $username = User::latest()->value('username');

        return view('auth.added', compact('username'));
    }
}
