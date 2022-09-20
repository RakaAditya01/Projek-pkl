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
                  <th scope="col">Nama</th>
                  <th scope="col">NIM</th>
                  <th scope="col">Alat</th>
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
                  <td>{{$row -> nama}}</td>
                  <td>{{$row -> nim}}</td>
                  <td>{{$row -> alat}}</td>
                  <td>{{$row -> jumlah}}</td>
                  <td class="d-flex">
                      <form action="/deletepeminjaman/{{$row->id}}" method="POST">
                          @csrf
                    @method('delete')
                    <button class="btn btn-danger" type="submit">Delete</button>
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
