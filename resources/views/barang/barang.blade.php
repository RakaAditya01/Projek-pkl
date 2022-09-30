@extends('layout.main')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h1 class="mx-auto text-center">Data Barang</h1>
            <div class="row">
                <a href="{{route('tambahbarang')}}" type="button" class="btn btn-success mt-2">Tambah +</a>
                <div class="col">
                    <form action="/barang/cari" method="GET" class="mt-3">
                        <input type="text" id="input" placeholder="Cari Barang .." onkeyup='searchTable()'>
                    </form>
                </div>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Anggaran</th>
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
                            <td>{{$row -> nama_barang}}</td>
                            <td>{{$row -> stock}}</td>
                            <td>{{$row -> anggaran}}</td>
                            <td class="d-flex">
                                <form action="/deletebarang/{{$row->id}}" method="GET">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger m-2" type="submit">Delete</button>
                                </form>
                                <a href="/tampilanbarang/{{$row->id}}" type="submit"
                                    class="btn btn-warning m-2">Edit</a>
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
<script src="https://code.jquery.com/jquery-3.6.0.slim.js"
    integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</tbody>
<script>
    $('.deletebarang').click(function () {
        var barangid = $(this).attr('data-id');
        swal({
                title: "Yakin Deck?",
                text: "kamu akan menghapus data barang dengan id " + barangid + " ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/deletebarang/" + barangid + " "
                    swal("Data berhasil di hapus", {
                        icon: "success",
                    });
                } else {
                    swal("data tidak jadi dihapus");
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
