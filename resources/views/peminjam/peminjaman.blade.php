@extends('layout.main')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h1 class="mx-auto text-center">Data Peminjam</h1>
            <div class="row">
                <a href="{{route('tambahpeminjam')}}" type="button" class="btn btn-success mt-2">Tambah +</a>
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
                                                    <button class="btn btn-primary" type="submit">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <a href="/tampilanpeminjam/{{$row->id}}" type="submit" class="btn btn-warning">Edit</a>
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
</tbody>
</table>
@endsection
