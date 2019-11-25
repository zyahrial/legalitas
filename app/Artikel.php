<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Artikel;

class Artikel extends Model
{
	protected $table = 'tb_artikel';
	protected $fillable = ['id', 'tittle', 'content','date'];
   	protected $primaryKey = 'id';
}
