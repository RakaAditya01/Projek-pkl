@extends('layout.main')


@section('content')
<div class="container">
    <h1 class="text-center mb-4 pt-4">Tambah Peminjam</h1>
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body" style="width: 90%">
                    <form method="POST" action="/insertpeminjam/" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">NIM</label>
                            <input type="text" value="{{ auth()->user()->id }}" disabled id="nim" class="form-control">
                            <div id="emailHelp" class="form-text"></div>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama</label>
                            <input type="text" value="{{ auth()->user()->name  }}" disabled id="nama"  class="form-control">
                            <div id="emailHelp" class="form-text"></div>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Nama Barang</label>
                            <select class="form-control" id="barangs" aria-label="Default select example" name="nama_barang">
                                <option value="" selected disabled>- Pilih -</option>
                                @foreach ($data as $data)
                                <option value="{{$data->id}}">{{ $data->nama_barang }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Dokumentasi</label>
                            <input type="file" name="dokumentasi" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                            @error('dokumentasi')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Jumlah</label>
                            <input type="text" name="jumlah" class="form-control" id=""
                                aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text"></div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script>
		$(function() {
			$("#nim").change(function(){
				var nim = $("#nim").val();
 
				$.ajax({
					type: 'POST',
					dataType: 'json',
					data: {
						'nim': nim
					},
					success: function (peminjam) {
						$("#nama").val(peminjam['nama']);
 
						var $nama = $('input:text[name=nama]');
					}
				});
			});
 
			$("form").submit(function(){
				alert("Keep learning");
			});
		});
	</script>
</div>
@endsection
                          