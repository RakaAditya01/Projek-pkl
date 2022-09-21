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
            <input type="text" name="cari" placeholder="Cari Barang .." value="{{ old('cari') }}">
            <input type="submit" value="CARI">
        </form>
        </div>
      <table class="table mt-3">
          <thead>
              <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nama Barang</th>
                  <th scope="col">Jumlah</th>
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
                  <td>{{$row -> jumlah}}</td>
                  <td>{{$row -> anggaran}}</td>
                  <td class="d-flex">
                      <form action="/deletebarang/{{$row->id}}" method="POST">
                          @csrf 
                                 @method('delete')
                                    <button class="btn btn-danger m-2" type="submit">Delete</button>
                                </form>
                               <a href="/tampilanbarang/{{$row->id}}" type="submit" class="btn btn-warning m-2">Edit</a>
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
  </table>
@endsection
