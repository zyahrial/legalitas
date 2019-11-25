<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Legalitas;
use App\Legalitas_notif;

class Legalitas extends Model
{
	protected $table = 'sdm_legalitas';
	protected $fillable = ['nama_dok', 'no_dok', 'tgl_warning','tgl_expired','tgl_renew', 'nilai', 'email1', 'email2','nilai','waktu','progres', 'info','nama_file'];
    protected $primaryKey = 'kode';
    public $incrementing = false;
}
