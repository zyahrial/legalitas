<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Inventaris_it;

class Inventaris_it extends Model
{
	protected $table = 'it_inventaris';
	protected $fillable = ['no_inventaris', 'merk_Type', 'jenis_barang','no_seri','warna', 'tahun', 'bulan', 'kondisi' ,'posisi','kantor','harga', 'ket'];
    protected $primaryKey = 'kode';
    public $incrementing = false;
}