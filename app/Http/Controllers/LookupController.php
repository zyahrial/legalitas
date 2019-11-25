<?php
namespace App\Http\Controllers;

use App\Legalitas;
use App\Karyawan;
use App\Inventaris_it;
use App\Peminjaman;
use App\Jenis_barang;



use Illuminate\Http\Request;

class LookupController extends Controller
{
    public function inventaris_it_lookup_karyawan(Request $request)
    {
    $lookup = Karyawan::orderBy('nama', 'asc')->get();
    return view('inventaris_it.lookup.lookup_karyawan', compact('lookup'));
    }

    public function inventaris_it_lookup_barang(Request $request)
    {
    $lookup = Jenis_barang::orderBy('nama_barang', 'asc')->get();
    return view('inventaris_it.lookup.lookup_barang', compact('lookup'));   
    }

    public function inventaris_it_lookup_warna(Request $request)
    {
    return view('inventaris_it.lookup.lookup_warna');   
    }

    public function inventaris_it_lookup_kondisi(Request $request)
    {
    return view('inventaris_it.lookup.lookup_kondisi');   
    }

    public function legalitas_lookup_karyawan(Request $request)
    {
    $lookup = Karyawan::orderBy('nama', 'asc')->get();
    return view('legalitas.lookup.lookup_karyawan', compact('lookup'));  
    }

    public function lookup_inventaris(Request $request)
    {
    $lookup = Inventaris_it::orderBy('jenis_barang', 'asc')->get();
    return view('peminjaman.lookup.lookup_inventaris', compact('lookup'));  
    }

        public function peminjaman_lookup_karyawan(Request $request)
    {
    $lookup = Karyawan::orderBy('nama', 'asc')->get();
    return view('peminjaman.lookup.lookup_karyawan', compact('lookup'));
    }
}
