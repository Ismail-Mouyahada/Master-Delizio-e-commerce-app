<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
     protected $redirectTo = RouteServiceProvider::Accueil;

    protected function authenticated()
    {
        if(Auth::user()->is_admin == true) //1 = Admin Login
        {
            return redirect('/admin')->with('status','Welcome to your dashboard');
        }
        elseif(Auth::user()->is_admin == false) // Normal or Default User Login
        {
            return redirect('/accueil')->with('status','Logged in successfully');
        }else{
             return redirect('/accueil')->with('status','Logged in successfully');

        }
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}