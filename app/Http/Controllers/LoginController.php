<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
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
            'nim' => $request->nim,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'expired' => Carbon::parse($request->updated_at)->format('d-m-Y G:i'),
            'tanggal_awal' => Carbon::parse($request->created_at)->format('d-m-Y G:i'),
            'remember_token' => Str::random(60)
        ]);
        return redirect('/login');
    }

    // recaptcha
    // public function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'nim'  => ['required', 'numeric', 'min:16'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //         'g-recaptcha-response' => 'required|captcha'
    //     ]);
    // }

    public function logout(Request $request)
    {
        Auth::logout();
 
        request()->session()->invalidate();
        
        request()->session()->regenerateToken();
 
        return redirect('/login');
    }
    
    // rechaptcha-2
    // public function validateLogin(Request $request) {
    //     $this->validate( $request, [
    //         'email' => ['required', 'string', 'email'],
    //         'password' => ['required', 'string'],
    //         'g-recaptcha-response' => 'required|captcha'
    //     ]);
    // }

}
