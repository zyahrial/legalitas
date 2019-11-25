<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Lelang_inventaris_it;

class Lelang_inventaris_it extends Model
{
	protected $table = 'it_lelang_inventaris';
	protected $fillable = ['tanggal','keterangan','pembeli','harga_lelang',  'no_inventaris', 'merk_Type', 'jenis_barang','no_seri','warna', 'tahun', 'bulan', 'kondisi' ,'posisi','kantor','harga', 'ket'];
    protected $primaryKey = 'kode';
    //public $incrementing = false;
}