<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Providers\RouteServiceProvider;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{


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

    public function index(){
        return view('auth.login');
    }

    public function autheticate(LoginRequest $request) {
        $credentials = $request->validated();

            if (Auth::attempt($credentials)) {
                
                return redirect()->intended('home');
            }
            return redirect()->back()->withErrors(['Os dados informados não conferem']);
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}

