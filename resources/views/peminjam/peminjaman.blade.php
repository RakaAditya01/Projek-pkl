@extends('layout.main')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h1 class="mx-auto text-center">Data Peminjam</h1>
            <div class="row">
                <a href="{{route('tambahpeminjam')}}" type="button" class="btn btn-success mt-2 mb-4">Tambah +</a>
                <div class="col">
                    <form action="/peminjam" method="GET" class="mt-3">
                      <input type="text" id="input" placeholder="Cari Peminjam .."  onkeyup='searchTable()'>
                  </form>
                  </div>
                <table class="table mt-3 table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Dokumentasi</th>
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
                            <td>{{$row->nim}}</td>
                            <td>{{$row->nama}}</td>
                            <td>{{$row->nama_barang}}</td>
                            <td>
                                <img src="{{ asset('fotodokumentasi/'.$row->dokumentasi) }}" alt=""
                                    style="width: 80px;">
                            </td>
                            <td>{{$row->jumlah}}</td>
                            <td class="d-flex">
                                    <a href="#" class="btn btn-danger m-2 delete" data-id="{{$row->id}}"  data-nama="{{$row->nama}}">Delete</a>
                                <a href="/tampilanpeminjam/{{$row->id}}" type="submit"class="btn btn-warning m-2">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                        @if ($data->count() == 0)
                            <div class="alert alert-danger" role="alert">
                                Tidak Ada Data Peminjam!
                            </div>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
 {{-- script --}}
 <script
  src="https://code.jquery.com/jquery-3.6.0.slim.js"
  integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY="
  crossorigin="anonymous"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

{{-- end --}}
  </body>
  <script>
    $('.delete').click( function( ){
        var peminjamid = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');
        swal({
                title: "Yakin?",
                text: "Anda Akan Menghapus Data Ini id "+nama+"",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    window.location = "/deletepeminjaman/ "+nama+""
                    swal("Data Anda Berhasil Di Hapus", {
                    icon: "success",
                    });
                } else {
                    swal("Data Anda Tidak Jadi Di Hapus");
                }
        });
    });

  </script>

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
                tr[i].style.display = "uuun";
                status = false;
            } else {
                tr[i].style.display = "none";
            }
        }
    }

</script>
</html>
@endsection
