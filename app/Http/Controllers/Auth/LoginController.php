<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

    public function login(Request $request){
        $input = $request->all();

        $this->validate($request,[
            'nim' => 'required',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('nim' => $input['nim'],'password'=> 
        $input['password'])))
        {
            if(auth()->user()->is_admin == 1){
                return redirect('/tabel')->with('success', "Berhasil login!");
            }elseif(auth()->user()->is_admin == 0){
                return redirect('/')->with('success', "Berhasil login!");
            }
        }else{
            return redirect()->route('login')
            ->with('login','Email-Address atau Password salah ! ');
        }
    }
}
