<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login (Request $request)
    {
        if ($request->isMethod('post'))
        {
            $this->validate($request,[
                'email'=>'required|email',
                'password'=>'required'
            ]);

            $credentials=$request->only('email','password');



            if (Auth::attempt($credentials))
            {


                return redirect('/')->with(['message'=>'succes']);
            }
            else
            {
                return back()->withInput($request->only('email'))->with(['message'=>'Fail']);
            }
        }
        return view('auth.login');
    }
    public function logout()
    {
        Auth::logout();

        return redirect('/')->with(['message'=>'succes logout']);
    }
}
