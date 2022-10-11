
@extends('layout.main')


@section('content')
<div class="container">
    <h1 class="text-center mb-4 pt-4">Edit Data Peminjam</h1>
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body" style="width: 90%">
                    <form  method="POST" action="/updateuser/{{$data->id}}">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama/label>
                            <input type="text" name="name" value="{{$data->name}}" class="form-control" id=""
                                aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text"></div>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nim</label>
                            <input type="text" name="nim" value="{{$data->nim}}" class="form-control" id=""aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text"></div>
                        </div>


                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="text" name="email" value="{{$data->email}}" class="form-control" id=""
                                aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text"></div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Dokumentasi</label>
                            <input type="text" name="password" value="{{$data->password}}" class="form-control"  id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                            @error('password')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col mb-lg-2 mb-1">
                                <label for="exampleFormControlSelect1" class="form-label">Role</label>
                                <select class="form-select @error('level') is-invalid @enderror" id="exampleFormControlSelect1" aria-label="Default select example" name="role">
                                    {{-- <option selected value="{{ $user->role }}">{{ $user->role }}</option> --}}
                                    <option value="admin">Admin</option>
                                    <option value="mahasiswa">Mahasiswa</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
