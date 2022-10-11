<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $data = User::paginate();
        return view('expired\user',compact('data'));
    }

    public function tambahuser(){
        $user = User::all();
        return view('expired.tambah',compact('user'));
    }

    public function store(request $request){
        user::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            // 'expired' => Carbon::parse($request->updated_at)->format('l\, d-m-Y h:1 A'),
            // 'tanggal_awal' => Carbon::parse($request->created_at)->format('l\, d-m-Y h:1 A'),
            'remember_token' => Str::random(60)
        ]);
        return redirect('/user');
    }

    public function tampilanUser($id){
        $data = User::find ($id);
        return view('expired\user',compact('data'));
    }

    public function update(request $request, $id){  
        $data = User::find($id);
        $data->update($request->all());
        return redirect()->route('user')->with('success', 'Data Berhasil Di Edit!');;
    }   

    public function destroy($id){
        $data = User::first();
        $data->delete();
        return redirect()->route('user');
    }
}

