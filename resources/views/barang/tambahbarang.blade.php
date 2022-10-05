@extends('layout.main')


@section('content')
<div class="container">
    <h1 class="text-center mb-4 pt-4">Tambah Barang</h1>
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body" style="width: 90%">
                    <form  method="POST"  action="/insertbarang/"  enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Gambar</label>
                            <input type="file" name="gambar" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                            @error('gambar')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" id="" aria-describedby="emailHelp">
                            @error('nama_barang')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Stock</label>
                            <input type="text" name="stock" class="form-control" id="" aria-describedby="emailHelp">
                            @error('stock')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Anggaran</label>
                            <input type="text" name="anggaran" class="form-control" id="" aria-describedby="emailHelp">
                            @error('anggaran')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
