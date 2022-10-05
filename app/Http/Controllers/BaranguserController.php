<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BaranguserController extends Controller
{
    public function index(){
        $data = Barang::paginate();
        return view('user\baranguser',compact('data'));
    }

    public function store(request $request){
        $this-> validate($request, [
            'gambar' => 'required',
            'nama_barang' => 'required',
            'stock' => 'required',
            'anggaran' => 'required',
        ]);
        $data = Barang::create ($request->all());
        if($request->hasFile('gambar')){
            $request->file('gambar')->move('fotodokumentasi/', $request->file('gambar')->getClientOriginalName());
            $data->gambar = $request->file('gambar')->getClientOriginalName();
            $data->save();
        }
        return redirect(route('barang'));
    }

}
