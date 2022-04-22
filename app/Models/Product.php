<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $fillable = ['foto_barang','nama_barang','harga_beli','harga_jual','stok'];
    use HasFactory;

}
