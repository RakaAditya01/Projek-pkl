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

        return view('barang\tambahbarang');
    }
    public function store(request $request){
        $this-> validate($request, [
            'nama_barang',
            'stock',
            'anggaran'
        ]);
        Barang::create($request->all());
        return redirect(route('barang'))->with('success', 'Data Berhasil Di Tambahkan!');
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

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$barang = DB::table('barangs')
		->where('nama_barang','LIKE',"%".$cari."%")
		->paginate(5);
 
    		// mengirim data pegawai ke view index
		return view('barang\barang',['data' => $barang]);
 
	}

}
