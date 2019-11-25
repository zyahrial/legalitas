<?php
namespace App\Http\Controllers;

use App\Inventaris_it;

use App\Barang;
use Illuminate\Http\Request;

class Inventaris_itController extends Controller
    {   

       function index(Request $request)
    {       
    if ($request->has('jenis_barang')) 
    {        
    $query = ($request->input('jenis_barang'));
    //$karyawan = Karyawan::where('nama', $request->input('nama'))->get();
    $inventaris_it = Inventaris_it::where('jenis_barang', 'LIKE', '%' . $query . '%')
            ->orderBy('jenis_barang', 'asc')
            ->paginate(1000);
    }elseif ($request->has('posisi')) 
    {        
    $query = ($request->input('posisi'));
    //$karyawan = Karyawan::where('nama', $request->input('nama'))->get();
    $inventaris_it = Inventaris_it::where('posisi', 'LIKE', '%' . $query . '%')
            ->orderBy('jenis_barang', 'asc')
            ->paginate(1000);
    }else{ 
    $inventaris_it = Inventaris_it::orderBy('jenis_barang', 'asc')->paginate(10);  
    } 
    return view('inventaris_it.inventaris_it',['inventaris_it' => $inventaris_it]);
    }

    function create()
    {
       return view('inventaris_it.insert');
    }
  
    function store(Request $request)
    {

$data = $this->validate($request, [
    'no_inventaris' => 'unique:it_inventaris,no_inventaris'
]);

    $inventaris_it = new Inventaris_it();
    $inventaris_it->no_inventaris = $request->get('no_inventaris');
    $inventaris_it->merk_Type = $request->get('merk_Type');
    $inventaris_it->jenis_barang = $request->get('jenis_barang');
    $inventaris_it->no_seri = $request->get('no_seri');
    $inventaris_it->warna = $request->get('warna');
    $inventaris_it->tahun = $request->get('tahun');
    $inventaris_it->bulan = $request->get('bulan');
    $inventaris_it->kondisi = $request->get('kondisi');
    $inventaris_it->posisi = $request->get('posisi');
    $inventaris_it->kantor = $request->get('kantor');
    $inventaris_it->harga = $request->get('harga');
    $inventaris_it->ket = $request->get('ket');
    $inventaris_it->save();
       
    \Session::flash('success','Data Inventaris Berhasil Di Tambahkan');
    return redirect('inventaris_it');
    
    }
    
    function show($kode)
    {
        $data = Inventaris_it::where('kode',$kode)->get();
        return view('inventaris_it/edit',compact('data'));
    }
 
    function update(Request $request, $kode)
    {
    $data = Inventaris_it::find($kode);
    $data->no_inventaris = $request->get('no_inventaris');
    $data->merk_Type = $request->get('merk_Type');
    $data->jenis_barang = $request->get('jenis_barang');
    $data->no_seri = $request->get('no_seri');
    $data->warna = $request->get('warna');
    $data->tahun = $request->get('tahun');
    $data->bulan = $request->get('bulan');
    $data->kondisi = $request->get('kondisi');
    $data->posisi = $request->get('posisi');
    $data->kantor = $request->get('kantor');
    $data->harga = $request->get('harga');
    $data->ket = $request->get('ket');
    $data->save();
    
    \Session::flash('success','Data Inventaris Berhasil Di Ubah');
    return redirect('inventaris_it');   
    }   
}