<?php

namespace App\Http\Controllers;

use App\Models\Peminjam;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamController extends Controller
{   
    public function index(){  
        $data = Peminjam::paginate();
        return view('peminjam\peminjaman',compact('data'));
    }

    public function tambahpeminjam(){
        $barang = Barang ::all();
        return view('peminjam\tambahpeminjam' , compact('barang'));
    }

    public function store(request $request){
        $this-> validate($request, [
            'nim'=> 'required',
            'nama'=> 'required',
            'nama_barang'=> 'required',
            'dokumentasi'=> 'required',
            'jumlah'=> 'required',
        ],
        [
            'nim.required' => 'Nim tidak boleh kosong',
            'nama.required' => 'Nama tidak boleh kosong',
            'nama_barang.required' => 'Nama Barang tidak boleh kosong',
            'dokumentasi.required' => 'Dokumentasi tidak boleh kosong',
            'jumlah.required' => 'Jumlah tidak boleh kosong',
        ]);
        $data = Peminjam::create ($request->all());
        if($request->hasFile('dokumentasi')){
            $request->file('dokumentasi')->move('fotodokumentasi/', $request->file('dokumentasi')->getClientOriginalName());
            $data->dokumentasi = $request->file('dokumentasi')->getClientOriginalName();
            $data->save();
        }  
            
        return redirect(route('peminjaman'));
    }
    

    public function tampilanpeminjam($id){
        $data = Peminjam::find ($id);
        return view('peminjam\edit',compact('data'));
    }

    public function update(request $request, $id){  
        $data = Peminjam::find($id);
        $data->update($request->all());
        return redirect()->route('peminjaman')->with('success', 'Data Berhasil Di Edit!');;
    }   

    public function destroy($id){
        $data = Peminjam::find($id);
        $data->delete();
        return redirect()->route('peminjaman');
    }
}