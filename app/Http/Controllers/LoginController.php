<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('pages.login');
    }

    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if(Auth::attempt($request->only('email', 'password'))){
            return redirect('/home');
        } else if (!User::where('email', $request->email)->exists()){
            return redirect('/')->withErrors([
                'email' => 'Email is not registered'
            ]);
        } else {
            return redirect('/')->withErrors([
                'password' => 'Password is incorrect'
            ]);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
