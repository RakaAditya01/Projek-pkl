<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjam;

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
            'nama',
            'nim',
            'alat',
            'jumlah',
        ]);
        Peminjam::create($request->all());
        return redirect(route('peminjaman'))->with('success', 'Task Created Successfully!');
        }
    
    

    public function tampilanpeminjam($id){
        $data = Peminjam::find ($id);
    return view('peminjam\edit',compact('data'));
   }
   public function update(request $request, $id){

    $data = Peminjam::find($id);
    $data->update($request->all());
    return redirect()->route('peminjaman')->with('success', 'Task Edit Successfully!');;
}   
    public function destroy($id){
    $data = Peminjam::find($id);
    $data->delete();
    return redirect()->route('peminjaman')->with('success', 'Task Delete Successfully!');;
}
}
