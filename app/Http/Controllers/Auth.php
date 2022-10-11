<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(){
        return view('login\login');
    }

    public function loginproses(Request $request)
    {
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/home');
        }
        return redirect('login');
    }


    public function register(){
        return view('login.register');
    }

    public function registeruser(Request $request){
        // dd($request->all());
        user::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            // 'expired' => Carbon::parse($request->updated_at)->format('l\, d-m-Y h:1 A'),
            // 'tanggal_awal' => Carbon::parse($request->created_at)->format('l\, d-m-Y h:1 A'),
            'remember_token' => Str::random(60)
        ]);
        return redirect('/login');
    }
    
}