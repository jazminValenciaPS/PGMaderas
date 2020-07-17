<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Auth as c;

class LoginClientController extends Controller
{
  use AuthenticatesUsers;

    public function showLoginForm(){
        if(c::check()){
            return redirect('/consola');
        }
        return view('auth.loginC');
    }

    protected $redirectTo = '/Perfil';

    public function login(Request $request){

        // $this->validateLogin($request); 
        // ['usuario' => $request->usuario,'password' => $request->password]

        $this->validate($request,[
            'email' => 'required|string',
            'password' => 'required|string'
        ]);             

        if (Auth::attempt(['email' => $request->email,'password' => $request->password])){
        // ,'password' => $request->password])
            // Auth::loginUsingId(Auth::user()->userTablePrimaryKey);
            return 'Tu sesión ha sido iniciada con éxito';
            // redirect('/Perfil');
        }

        return back()
        ->withErrors(['email' => trans('auth.failed')])
        ->withInput(request(['email']));

    }

    protected function validateLogin(Request $request){
        $this->validate($request,[
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

    }
    
    public function logout(Request $request){
     Auth::logout();
        $request->session()->invalidate();
        return redirect('/Perfil');
    } 

    public function username(){
        
        return 'email';
    }


}