<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Peminjaman;

class Peminjaman extends Model
{
	protected $table = 'it_peminjaman';
	protected $fillable = ['no_inventaris', 'merk_Type', 'jenis_barang', 'nama_peminjam', 'email', 'keperluan', 'tgl_pinjam' , 'est_tgl_kembali', 'tgl_kembali', 'menyerahkan', 'status', 'menerima', 'ket'];
    protected $primaryKey = 'kode';
    public $incrementing = false;
}