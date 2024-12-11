<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('pages.register');
    }

    public function register(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'password2' => 'required|min:8|same:password',
            'phone' => 'required|numeric'
        ]);

        if(User::where('email', $request->email)->exists()){
            return redirect('/register')->withErrors([
                'email' => 'Email is already registered'
            ]);
        } else {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone
            ]);
            return redirect('/');
        }
    }
}
