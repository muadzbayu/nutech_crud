<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use File;

class ProductController extends Controller
{
    public function index(){
        $product = Product::all();
        return view('tampil_product',['product' => $product]);
    }

    public function tambah(Request $request){
        $nama_barang = $request->nama_barang; 

        if( Product::where('nama_barang', $nama_barang)->first() == null ) {
            Product::create([
                'foto_barang' => '',
                'nama_barang' => $request->nama_barang,
                'harga_jual' => $request->harga_jual,
                'harga_beli' => $request->harga_beli,
                'stok' => $request->stok
            ]);
            return redirect('/')->with('alert-success','Data berhasil ditambahkan');
        }
        else{
            return redirect('/')->with('alert','Nama barang sudah ada');
        }
    }

    public function edit($id){
        $product = Product::where('id',$id)->get();
        return view('edit_product',['product' => $product]);
    }

    public function simpan_edit(Request $request){
        $data = Product::find($request->id);
        $this->validate($request, [
			'file' => 'required|mimes:png,jpg|max:100',
		]);
        // menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');
        $nama_file = $file->getClientOriginalName();
 
      	// isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'img';
		$file->move($tujuan_upload,$nama_file);

        $data->foto_barang = $nama_file;
        $data->nama_barang = $request->nama_barang;
        $data->harga_jual = $request->harga_jual;
        $data->harga_beli = $request->harga_beli;
        $data->stok = $request->stok;
        $data->save();
        return redirect('/');
    }

    
    
    public function hapus($id){
        $product = Product::where('id',$id)->first();
	    File::delete('img/'.$product->file);
 
        // hapus data
        Product::where('id',$id)->delete();
        return redirect('/');
    }
}
