@extends('layout.main')

@section('content')
<div class="container">
  <div class="card">
  <div class="card-body">
  <h1 class="mx-auto text-center">Data Barang</h1>
  <div class="row">
      <a href="{{route('tambahbarang')}}" type="button" class="btn btn-success mt-2">Tambah +</a>
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
                      <form action="/deletebarang/{{$row->id}}" method="POST">
                          @csrf 
                                 @method('delete')
                                    <a class="btn btn-danger deletebarang" data-id="{{$row -> id}}" type="submit">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                      </form>
                     <a href="/tampilanbarang/{{$row->id}}" type="submit" class="btn btn-warning">Edit</a>
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
<script
  src="https://code.jquery.com/jquery-3.6.0.slim.js"
  integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY="
  crossorigin="anonymous"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </tbody>
    <script>
        $('.deletebarang').click( function(){
            var barangid = $(this).attr('data-id');
            swal({
                                title: "Yakin Deck?",
                                text: "kamu akan menghapus data barang dengan id "+barangid+" ",
                                icon: "warning",
                                buttons: true,
                                dangerMode: true,
                                })
                                .then((willDelete) => {
                                if (willDelete) {
                                    window.location ="/deletebarang/"+barangid+" "
                                    swal("Data berhasil di hapus", {
                                    icon: "success",
                                    });
                                } else {
                                    swal("data tidak jadi dihapus");
                                }
                });
        });
                       
    </script>
  </table>
@endsection
