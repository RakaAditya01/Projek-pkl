@extends('layout.main')

@section('content')
<div class="container">
  <div class="card">
  <div class="card-body">
  <h1 class="mx-auto text-center">Data Peminjam</h1>
  <div class="row">
      <a href="{{route('tambahpeminjam')}}" type="button" class="btn btn-success mt-2">Tambah +</a>
      <div class="col">
        <form action="/peminjam/cari" method="GET" class="mt-3">
          <input type="text" id="input" placeholder="Cari Peminjam .." onkeyup='searchTable()'>
      </form>
      </div>
      <table class="table mt-3" id="table">
          <thead>
              <tr>
                  <th scope="col">ID</th>
                  <th scope="col">NIM</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Nama Barang</th>
                  <th scope="col">Jumlah</th>
                  <th scope="col">Action</th>
              </tr>   
          </thead>
          <tbody>
            @php
            $no = 1;
              @endphp
              <tr>
                  @foreach ($data as $index => $row)
                  <th scope="row">{{ $index + $data->firstItem() }}</th>
                  <td>{{$row -> nim}}</td>
                  <td>{{$row -> nama}}</td>
                  <td>{{$row -> nama_barang}}</td>
                  <td>{{$row -> jumlah}}</td>
                  <td class="d-flex">
                      <form action="/deletepeminjaman/{{$row->id}}" method="POST">
                          @csrf
                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                              <button class="btn btn-danger">Delete</button>
                          </a>
                          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin Ingin Menghapus Data ini?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        <tr>
                            @foreach ($data as $index => $row)
                            <th scope="row">{{ $index + $data->firstItem() }}</th>
                            <td>{{$row -> nim}}</td>
                            <td>{{$row -> nama}}</td>
                            <td>{{$row -> nama_barang}}</td>
                            <td>{{$row -> jumlah}}</td>
                            <td class="d-flex">
                                <form action="/deletepeminjaman/{{$row->id}}" method="POST">
                                    @csrf
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <button class="btn btn-danger">Delete</button>
                                    </a>
                                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Yakin Ingin Menghapus
                                                        Data ini?</h5>
                                                    <button class="close" type="button" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Select "Delete" below if you are ready to Delete
                                                    This Data.</div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button"
                                                        data-dismiss="modal">Cancel</button>
                                                    @method('delete')
                                                    <button class="btn btn-danger m-2" type="submit">Delete</button>
                                </form>
            </div>
        </div>
    </div>
</div>
<a href="/tampilanpeminjam/{{$row->id}}" type="submit" class="btn btn-warning m-2">Edit</a>
</td>
</tr>
</div>
</div>
</div>
</div>
              @endforeach
          </tbody>
      </table>
       {{ $data->links() }}
  </div>
  </div>
</div>
</div>
</div>

@include('sweetalert::alert')
</tbody>
<script>
    function searchTable() {
        var input;
        var saring;
        var status; 
        var tbody; 
        var tr; 
        var td;
        var i; 
        var j;
        input = document.getElementById("input");
        saring = input.value.toUpperCase();
        tbody = document.getElementsByTagName("tbody")[0];;
        tr = tbody.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td");
            for (j = 0; j < td.length; j++) {
                if (td[j].innerHTML.toUpperCase().indexOf(saring) > -1) {
                    status = true;
                }
            }
            if (status) {
                tr[i].style.display = "";
                status = false;
            } else {
                tr[i].style.display = "none";
            }
        }
    }
    </script>
</table>
@endsection
