<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Jenis_barang;

class Jenis_barang extends Model
{
	protected $table = 'it_nama_barang';
	protected $fillable = ['nama_barang', 'keterangan'];
    protected $primaryKey = 'kode_barang';
    public $incrementing = false;
}