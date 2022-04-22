@extends('layout')

@section('content')
  <div class="container my-5">
    <div class="col-12">
      <div class="card">
        @foreach($product as $a)
        <form action="/product/simpan_edit" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="card-header">
              <h4 class="card-title">Edit Data Product</h4>
          </div>
          <div class="card-body py-0 my-3">
            <h4 class="text-muted my-3">Foto Barang</h4>
            <img src="{{ url('/img/'.$a->foto_barang) }}" alt="{{ $a->foto_barang }}" width="150px">
            <div class="row">
              <div class="col-xs-12 col-sm-6 mt-4">
                <div class="form-group">
                  <input type="file" name="file" class="form-control" >
                </div>
              </div>
              <div class="col-xs-12 col-sm-6">
                <div class="form-group">
                    <input type="hidden" name="id" value="{{ $a->id }}">
                    <label for="nama_barang">Nama Barang</label>
                    <input name="nama_barang" class="form-control" type="text" value="{{ $a->nama_barang}}" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-4">
                <div class="form-group">
                  <label for="harga_beli">Harga Beli</label>
                  <input name="harga_beli" class="form-control" type="number" value="{{ $a->harga_beli }}"" required>
                </div>
              </div>
              <div class="col-xs-12 col-sm-4">
                <div class="form-group">
                  <label for="harga_jual">Harga Jual</label>
                  <input name="harga_jual" class="form-control" type="number" value="{{ $a->harga_jual }}" required>
                </div>
              </div>
              <div class="col-xs-12 col-sm-4">
                <div class="form-group">
                  <label for="stok">Stok</label>
                  <input name="stok" class="form-control" type="number" value="{{ $a->stok }}" required>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
              <div class="row w-100">
                  <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                      <button type="submit" class="btn btn-primary btn-block">Simpan <i class="fa fa-save"></i></button>
                      <a href="/" class="btn btn-warning">Kembali</i></a>
                  </div>
              </div>
          </div>
        </form>
      </div>
    </div>
  </div>  
@endforeach
<!--END MODAL-->
@endsection
