<?php
namespace App\Http\Controllers;

use App\Inventaris_it;
use App\Lelang_inventaris_it;

use App\Barang;
use Illuminate\Http\Request;

class LelangController extends Controller
    {   

       function index(Request $request)
    {       
    if ($request->has('jenis_barang')) 
    {        
    $query = ($request->input('jenis_barang'));
    //$karyawan = Karyawan::where('nama', $request->input('nama'))->get();
    $daftar_lelang = Lelang_inventaris_it::where('jenis_barang', 'LIKE', '%' . $query . '%')
            ->orderBy('jenis_barang', 'asc')
            ->paginate(1000);
    }elseif ($request->has('pembeli')) 
    { 
    $query = ($request->input('pembeli'));
    $daftar_lelang = Lelang_inventaris_it::where('pembeli', 'LIKE', '%' . $query . '%')
            ->orderBy('jenis_barang', 'asc')
            ->paginate(1000);  
    }else{ 
    $daftar_lelang = Lelang_inventaris_it::orderBy('jenis_barang', 'asc')->paginate(10);  
    } 
    return view('inventaris_it.lelang.daftar_lelang',['daftar_lelang' => $daftar_lelang]);
    }
    
    function show($kode)
    {
        $data = Inventaris_it::where('kode',$kode)->get();
        return view('inventaris_it/lelang/proses_lelang',compact('data'));
    }

    function update(Request $request, $no_inventaris)
    {
        //Inventaris_it::where('no_inventaris', $no_inventaris)->delete();

    $inventaris_it = new Lelang_inventaris_it();
    $inventaris_it->tanggal = $request->get('tanggal');
    $inventaris_it->keterangan = $request->get('keterangan');
    $inventaris_it->pembeli = $request->get('pembeli');
    $inventaris_it->harga_lelang = $request->get('harga_lelang');

    $inventaris_it->no_inventaris = $request->get('no_inventaris');
    $inventaris_it->merk_Type = $request->get('merk_Type');
    $inventaris_it->jenis_barang = $request->get('jenis_barang');
    $inventaris_it->no_seri = $request->get('no_seri');
    $inventaris_it->warna = $request->get('warna');
    $inventaris_it->tahun = $request->get('tahun');
    $inventaris_it->bulan = $request->get('bulan');
    $inventaris_it->kondisi = $request->get('kondisi');
    $inventaris_it->posisi = $request->get('posisi');
    $inventaris_it->harga = $request->get('harga');

    $inventaris_it->save();

        $inventaris_it = \DB::table('it_inventaris')->where('no_inventaris',$inventaris_it->no_inventaris)->delete();

        \Session::flash('success','Inventaris Berhasil Di Lelang');
        return redirect('inventaris_it');
    }  
}