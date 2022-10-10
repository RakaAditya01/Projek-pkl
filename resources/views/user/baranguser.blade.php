@extends('layout.main')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h1 class="mx-auto text-center">Data Barang</h1>
            <div class="row">
                <div class="col">
                    <form action="/baranguser" method="GET" class="mt-3">
                        <input type="text" id="input" placeholder="Cari Barang .." onkeyup='searchTable()'>
                    </form>
                </div>
                <table class="table mt-3 table-bordered" id="table1">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Gambar</th>
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
                            <td>
                                <img src="{{ asset('fotodokumentasi/'.$row->gambar) }}" alt=""
                                    style="width: 80px;">
                            </td>
                            <td hidden id="id">{{$row -> id}}</td>
                            <td>{{$row -> nama_barang}}</td>
                            <td>{{$row -> stock}}</td>
                            <td>{{$row -> anggaran}}</td>
                            <td>
                                <a href="{{route('pinjamuser')}}" type="button" class="btn btn-success m-2">Pinjam</a>
                            </td>
                        </tr>
            </div>
        </div>
    </div>
</div>
@endforeach
@if ($data->count() == 0)
    <div class="alert alert-danger" role="alert">
        Tidak Ada Data Tersedia!
    </div>
@endif
</tbody>
</table>
{{ $data->links() }}
</div>
</div>
</div>
</div>
@php
    echo $data["gambar"];
@endphp
</div>
@include('sweetalert::alert')
<script src="https://code.jquery.com/jquery-3.6.0.slim.js"
    integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</tbody>
<script>
    $("#meminjam").click(function () {
        console.log("babo")
        // var requestOptions = {
        //     method = 'POST',
        //     redirect = 'follow'
        // };
        var coba = $("#id").val()
        console.log(coba)
        // fetch("http://localhost:8000/api/namadannim/?id=" +id, requestOptions)
        // .then(response => response.text())
        // .then(result => console.log("bismillah"))
        // .catch(error => console.log('error', error));
    
    })
        

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
