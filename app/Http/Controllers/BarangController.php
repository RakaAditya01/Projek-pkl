<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function index(){
        $data = Barang::paginate();
        return view('barang\barang',compact('data'));
    }

    public function tambahbarang(){
        $data = Barang::all();
        return view('barang\tambahbarang' , compact('data'));
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
    
    

    public function tampilanbarang($id){
        $data = Barang::find ($id);
    return view('barang\edit',compact('data'));
   }
   public function update(request $request, $id){
    $data = Barang::find($id);
    $data->update($request->all());
    return redirect()->route('barang')->with('success', 'Data Berhasil Di Edit!');;
    }   

    public function destroy($id){
    $data = Barang::find($id);
    $data->delete();
    return redirect()->route('barang')->with('success', 'Data Berhasil Di Hapus!');;
    }

}
