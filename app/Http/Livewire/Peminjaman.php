<?php

namespace App\Http\Livewire;

use App\Models\Peminjam;
use Livewire\Component;

class Peminjaman extends Component
{
    public $searchTerm;

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm. '%';
        $peminjams = Peminjam::where('nama', 'LiKE',$searchTerm)
        ->orWhere('nama', 'LIKE',$searchTerm)
        ->orWhere('nim', 'LIKE',$searchTerm)
        ->orWhere('alat', 'LIKE',$searchTerm)
        ->orderBy('id', 'DESC')->paginate(5);
        return view('peminjam.peminjaman',['peminjams'=>$peminjam]);
    }
}
