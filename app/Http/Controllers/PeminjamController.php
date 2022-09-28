<?php

namespace App\Http\Controllers;

use App\Models\Peminjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamController extends Controller
{
    public function index(){  
        $data = Peminjam::paginate(5);
        return view('peminjam\peminjaman',compact('data'));
    }

    public function tambahpeminjam(){

        return view('peminjam\tambahpeminjam');
    }
    public function store(request $request){
        $this-> validate($request, [
            'nim',
            'nama',
            'nama_barang',
            'dokumentasi',
            'jumlah',
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

// public function cari(Request $request)
// {
//     // menangkap data pencarian
//     $cari = $request->cari;

//         // mengambil data dari table pegawai sesuai pencarian data
//     $peminjam = DB::table('peminjams')
//     ->where('nama','LIKE',"%".$cari."%")
//     ->paginate(5);

//         // mengirim data pegawai ke view index
//     return view('peminjam\peminjaman',['data' => $peminjam]);
// }
}