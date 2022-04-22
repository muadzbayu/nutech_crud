@extends('layout')

@section('content')
  <div class="container my-5">
    <div class="card">
      <div class="card-header">
            <h2>Data Product</h2>
             @if(\Session::has('alert'))
                <div class="alert alert-danger">
                    <div>{{Session::get('alert')}}</div>
                </div>
            @endif
            @if(\Session::has('alert-success'))
                <div class="alert alert-success">
                    <div>{{Session::get('alert-success')}}</div>
                </div>
            @endif
      </div>
      <div class="card-body table-responsive">
          <div class="d-grid gap-2 mb-3 d-md-flex justify-content-md-end">
            <a href="#modaltambah" data-bs-toggle="modal" class="btn btn-success btn-sm"><i class="bi bi-plus"></i> Tambah Data</a>
        </div>
          <table class="table table-bordered table-hover table-striped" id="table_id">
              <thead>
                  <tr>
                      <th>No</th>
                      <th width="5px">Foto Barang</th>
                      <th>Nama Barang</th>
                      <th>Harga Beli</th>
                      <th>Harga Jual</th>
                      <th>Stok</th>
                      <th>OPSI</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($product as $i => $p)
                  <tr>
                      <td>{{ $i+1 }}</td>
                      <td width="150px"><img src="{{ 'img/'.$p->foto_barang}}" alt="{{ $p->foto_barang }}" width="150px"></td>
                      <td>{{ $p->nama_barang }}</td>
                      <td>Rp. {{ number_format($p->harga_beli) }}</td>
                      <td>Rp. {{ number_format($p->harga_jual) }}</td>
                      <td>{{ $p->stok }}</td>
                      <td>
                          <a href="product/edit/{{ $p->id }}" class="btn btn-info btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                          <a href="#modalhapus{{ $p->id }}" data-bs-toggle="modal" class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i> Hapus</a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
    </div>
  </div>

<!-- ============ MODAL ADD =============== -->
<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="product/tambah">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Produk Baru</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </button>
                </div>
                <form action="/produk/tambah" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input name="nama_barang" id="nama_barang" class="form-control" type="text" required @error('nama_barang') is-invalid @enderror" name="nama_barang" value="{{ old('nama_barang') }}"  autofocus>
                        </div>
                        @error('nama_barang')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-group">
                            <label for="harga_beli">Harga Beli</label>
                            <input name="harga_beli" class="form-control" type="number" required>
                        </div>
                
                        <div class="form-group">
                            <label for="harga_jual">Harga Jual</label>
                            <input name="harga_jual" class="form-control" type="number"  required>
                        </div> 

                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input name="stok" class="form-control" type="number" required>
                        </div> 
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button class="btn btn-info">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>  

<!-- ============ MODAL HAPUS =============== -->
@foreach($product as $a)
<div id="modalhapus{{$a->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal" method="get" action="product/hapus/{{$a->id}}">
            {{ csrf_field() }}
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Hapus Data</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Yakin mau hapus <b>{{ $a->nama_barang }}</b>..?</p>
                    <input name="id" type="hidden" value="{{ $a->id_user }}?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Hapus</button>
                </div>
            </form>
         </div>
    </div>
</div>

@endforeach
<!--END MODAL-->
@endsection