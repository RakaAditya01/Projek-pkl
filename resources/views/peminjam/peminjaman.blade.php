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
                      <input type="text" id="input" placeholder="Cari Peminjam .."  onkeyup='searchTable()'>
                  </form>
                  </div>
                <table class="table mt-3">
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
                                <form action="/deletepeminjaman/{{$row->id}}" method="POST">
                                    @csrf
                                    @method("delete")
                                    <button class="btn btn-danger m-2">Delete</button>

                                </form>
                                <a href="/tampilanpeminjam/{{$row->id}}" type="submit"
                                    class="btn btn-warning m-2">Edit</a>
                            </td>
                        </tr>
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

{{-- @include('peminjam.peminjam_js') --}}
@include('sweetalert::alert')
<script src="https://code.jquery.com/jquery-3.6.0.slim.js"
    integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</tbody>
<script>
    $('.deletebarang').click(function () {
        var peminjamsid = $(this).attr('data-id');
        swal({
                title: "Yakin Deck?",
                text: "kamu akan menghapus data barang dengan id " + peminjamsid + " ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/deletepeminjam/" + peminjamsid + " "
                    swal("Data berhasil di hapus", {
                        icon: "success",
                    });
                } else {
                    swal("data tidak jadi dihapus");
                }
            });
    });

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
</tbody>
</table>
@endsection
