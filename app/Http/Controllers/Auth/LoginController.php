<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function redirectTo()
    {
        if(Auth::user()->deleted_at==1){
            Session::flash('message', 'Bienvenue'); 
            Session::flash('alert-class', 'alert-primary text-center'); 
            return '/admin/users';
        } 
        else{
            $this->guard()->logout();
            Session::flash('message', 'Ce compte a été desactivé !'); 
            Session::flash('alert-class', 'alert-danger text-center'); 
            return '/login';
        }
    } 

    public function logout(Request $request) {
        Auth::logout();
        Session::flash('message', 'Vous êtes déconnectés!'); 
        Session::flash('alert-class', 'alert-success text-center'); 
        return redirect('/login');
      }
}
