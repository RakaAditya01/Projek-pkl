@extends('layout.main')

@section('content')
<div class="container">
    <h1 class="text-center mb-4 pt-4">Pinjam Barang</h1>
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body" style="width: 90%">
                    <form method="POST" action="/insertpinjam/" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">NIM</label>
                            <input type="text" name="nim" id="" class="form-control 
                            @error('nim')
                                is-invalid
                            @enderror" aria-describedby="emailHelp">
                            @error('nim')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control 
                            @error('nama')
                                is-invalid
                            @enderror" aria-describedby="emailHelp">
                            @error('nama')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label  @error('nama_barang')
                                is-invalid
                            @enderror">Nama Barang</label>
                            <select class="form-control" id="nama_barang" aria-label="Default select example" name="nama_barang">
                                <option value="">-- Pilih --</option>
                                @foreach ($barang as $data)
                                <option value="{{$data->nama_barang}}">{{ $data->nama_barang}}</option>
                                @endforeach
                            </select>
                            @error('nama_barang')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Dokumentasi</label>
                            <input type="file" name="dokumentasi" class="form-control 
                            @error('dokumentasi')
                                is-invalid
                            @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                            @error('dokumentasi')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Jumlah</label>
                            <input type="text" name="jumlah" class="form-control 
                            @error('jumlah')
                                is-invalid
                            @enderror" id="" aria-describedby="emailHelp">
                            @error('jumlah')
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