<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
            'email' => 'required',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('email' => $input['email'],'password'=> 
        $input['password'])))
        {
            if(auth()->user()->is_admin == 0){
                return redirect('/dashboard')->with('success', "Berhasil login!");
            }elseif(auth()->user()->is_admin == 1){
                return redirect('/pengumuman')->with('success', "Berhasil login!");
            }elseif(auth()->user()->is_admin == 2){
                return redirect('/admin')->with('success', "Berhasil login!");
            }
        }else{
            return redirect()->route('login')
            ->with('login','Email atau Password Anda Salah ! ');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Melakukan logout pengguna

        // Menghapus sesi dan data sesi yang terkait
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); // Redirect ke halaman utama atau halaman login
    }
}
