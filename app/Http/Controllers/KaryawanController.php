<?php
namespace App\Http\Controllers;

use App\Karyawan;
use Illuminate\Http\Request;
class KaryawanController extends Controller
    {	
       function index(Request $request)
    {       
    if ($request->has('nama')) 
    {        
    $query = ($request->input('nama'));
    //$karyawan = Karyawan::where('nama', $request->input('nama'))->get();
    $karyawan = Karyawan::where('nama', 'LIKE', '%' . $query . '%')
            ->orderBy('nama', 'asc')
            ->paginate(10);
    }else{ 
    $karyawan = Karyawan::orderBy('nama', 'asc')->paginate(10);  
    } 
    return view('karyawan.karyawan',['karyawan' => $karyawan]);
    }
	function create()
    {
       return view('karyawan.insert');
    }
  
    function store(Request $request)
    {
    $karyawan = new Karyawan();
    $karyawan->npp = $request->get('npp');
    $karyawan->nama = $request->get('nama');
    $karyawan->alamat = $request->get('alamat');
    $karyawan->telp = $request->get('telp');
    $karyawan->email = $request->get('email');
    $karyawan->jk = $request->get('jk');
    $karyawan->tanggal_lahir = $request->get('tanggal_lahir');
    $karyawan->tanggal_masuk = $request->get('tanggal_masuk');   
    $karyawan->status_kerja = $request->get('status_kerja');
    $karyawan->jabatan = $request->get('jabatan');
    $karyawan->divisi = $request->get('divisi');
    $karyawan->status_pegawai = $request->get('status_pegawai');
    $karyawan->save();
       
    \Session::flash('success','Data Karyawan Berhasil Di Tambahkan');
    return redirect('karyawan');
    
    }
	
    function show($kode)
    {
        $data = Karyawan::where('kode',$kode)->get();

        return view('karyawan/edit',compact('data'));
    }
 
    function update(Request $request, $kode)
    { 
    $data = Karyawan::find($kode);
    $data->npp = $request->get('npp');
    $data->nama = $request->get('nama');
    $data->alamat = $request->get('alamat');
    $data->telp = $request->get('telp');
    $data->email = $request->get('email');
    $data->jk = $request->get('jk');   
    $data->tanggal_lahir = $request->get('tanggal_lahir');
    $data->tanggal_masuk = $request->get('tanggal_masuk');
    $data->status_kerja = $request->get('status_kerja');
    $data->jabatan = $request->get('jabatan');
    $data->divisi = $request->get('divisi');
    $data->status_pegawai = $request->get('status_pegawai');
    $data->save();
    
    \Session::flash('success','Data Karyawan Berhasil Di Ubah');
    return redirect('karyawan');   
    }
    
    function destroy(Request $request, $kode)
    {
        $data = Karyawan::find($kode);
        $data->delete();
        \Session::flash('success','Data Karyawan Berhasil Di Hapus');
        return redirect('karyawan');
    }

}