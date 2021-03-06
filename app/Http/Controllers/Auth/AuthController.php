<?php

namespace App\Http\Controllers\Auth;

use Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            'date_of_birth' => 'required|date',
            'surname' => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'date_of_birth' => $data['date_of_birth'],
        ]);
    }

    public function register(Request $request)
    {
        $validation = $this->validator($request->all());

        if($validation->fails())
        {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $this->create($request->all());
        return redirect()->back()->withSucces('jej');
        // return redirect()->back()->withInput();
        // var_dump($validation);
    }

    public function getLogin()
    {
        // echo 'loginpae';
        // Auth::loginUsingId(1);
        // return redirect()->back()->withSucces('logged in');
        return View('auth.login');
    }

    public function login(Request $request)
    {
        if($request->input('user') && $request->input('password'))
        {
                if (Auth::attempt(['email' => $request->input('user'), 'password' => $request->input('password')])) {
                // Authentication passed...
                return redirect()->route('home');
            }
        }
        return redirect()->route('auth.login')->withErrors('there was something wrong with your email or password');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->withSucces('logged out');
    }
}
