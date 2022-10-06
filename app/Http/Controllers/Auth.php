<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
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
            'remember_token' => Str::random(60)
        ]);
        return redirect('/login');
    }
    
    public function User_PasswordExpired(&$rs) {
        CurrentPage()->setWarningMessage("Halo ".$rs["name"].", kata sandi Anda sudah <em>expired</em>. Silahkan ganti kata sandi Anda melalui form berikut. <br><br>Jika Anda lupa dengan kata sandi yang lama, silahkan reset dengan mengklik link <strong>Lupa Kata Sandi</strong> di bawah form Login.");
    }
    
}