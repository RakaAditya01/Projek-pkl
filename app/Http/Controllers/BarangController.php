<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index(){
        $data = Barang::paginate(5);
        return view('barang\barang',compact('data'));
    }
    public function tambahbarang(){

        return view('barang\tambahbarang');
    }
    public function store(request $request){
        $this-> validate($request, [
            'nama_barang',
            'jumlah',
            'anggaran'
        ]);
        Barang::create($request->all());
        return redirect(route('barang'))->with('success', 'Task Created Successfully!');
        }
    
    

    public function tampilanbarang($id){
        $data = Barang::find ($id);
    return view('barang\edit',compact('data'));
   }
   public function update(request $request, $id){

    $data = Barang::find($id);
    $data->update($request->all());
    return redirect()->route('barang')->with('success', 'Task Edit Successfully!');;
}   
    public function destroy($id){
    $data = Barang::find($id);
    $data->delete();
    return redirect()->route('barang')->with('success', 'Task Delete Successfully!');;
}

}
