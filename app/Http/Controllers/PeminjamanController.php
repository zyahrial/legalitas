<?php
namespace App\Http\Controllers;
use App\Peminjaman;
use App\Barang;
use App\Karyawan;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
    {   

       function index(Request $request)
    {       
    if ($request->has('status')) 
    {        
    $query = ($request->input('status'));
    $peminjaman = Peminjaman::where('status', 'LIKE', '%' . $query . '%')
            ->orderBy('nama_peminjam', 'asc')
            ->paginate(100);
    }
    elseif ($request->has('nama_peminjam'))  
    {        
    $query = ($request->input('nama_peminjam'));
    $peminjaman = Peminjaman::where('nama_peminjam', 'LIKE', '%' . $query . '%')
            ->orderBy('nama_peminjam', 'asc')
            ->paginate(100);
    }else{ 
    $peminjaman = Peminjaman::where('status', 'OPEN')->paginate(10);  
    } 
    return view('peminjaman.peminjaman',['peminjaman' => $peminjaman]);
    }

    function create()
    {
       $lookup = Karyawan::orderBy('nama', 'asc')->get();
       return view('peminjaman.insert', compact('lookup'));
    }
  
    function store(Request $request)
    {

//$data = $this->validate($request, [
  //  'no_inventaris' => 'unique:it_inventaris,no_inventaris'
//]);
    $validatedData = $request->validate([
        'no_inventaris' => 'required|max:50',
        'tgl_pinjam' => 'required',
        'est_tgl_kembali' => 'required',
        'nama_peminjam' => 'required|max:100',
        'email' => 'required|max:100',
        'keperluan' => 'required|max:200',
    ]);

    $peminjaman = new Peminjaman();
    $peminjaman->no_inventaris = $request->get('no_inventaris');
    $peminjaman->merk_Type = $request->get('merk_Type');
    $peminjaman->jenis_barang = $request->get('jenis_barang');
    $peminjaman->nama_peminjam = $request->get('nama_peminjam');
    $peminjaman->email = $request->get('email');
    $peminjaman->keperluan = $request->get('keperluan');
    $peminjaman->tgl_pinjam = $request->get('tgl_pinjam');
    $peminjaman->est_tgl_kembali = $request->get('est_tgl_kembali');
    $peminjaman->tgl_kembali = $request->get('tgl_kembali');
    $peminjaman->menyerahkan = $request->get('menyerahkan');
    $peminjaman->status = $request->get('status');
    $peminjaman->ket = $request->get('ket');
    $peminjaman->save();
       
    \Session::flash('success','Data Peminjaman Berhasil Di Tambahkan');
    return redirect('peminjaman');    
    }
    
    function show($kode)
    {
        $data = Peminjaman::where('kode',$kode)->get();
        return view('peminjaman/edit',compact('data'));
    }
 
    function update(Request $request, $kode)
    {

            $validatedData = $request->validate([
        'no_inventaris' => 'required|max:50',
        'tgl_pinjam' => 'required',
        'est_tgl_kembali' => 'required',
        'nama_peminjam' => 'required|max:100',
        'email' => 'required|max:100',
        'keperluan' => 'required|max:200',
    ]);
    $data = Peminjaman::find($kode);
    $data->no_inventaris = $request->get('no_inventaris');
    $data->merk_Type = $request->get('merk_Type');
    $data->jenis_barang = $request->get('jenis_barang');
    $data->nama_peminjam = $request->get('nama_peminjam');
	$data->email = $request->get('email');
    $data->keperluan = $request->get('keperluan');
    $data->tgl_pinjam = $request->get('tgl_pinjam');
    $data->est_tgl_kembali = $request->get('est_tgl_kembali');
    $data->tgl_kembali = $request->get('tgl_kembali');
    $data->status = $request->get('status');
    $data->menerima = $request->get('menerima');
    $data->ket = $request->get('ket');
    $data->save();
    
    \Session::flash('success','Data Peminjaman Berhasil Di Ubah');
    return redirect('peminjaman');   
    }
    
    function destroy(Request $request, $kode)
    {
        $data = Peminjaman::find($kode);
        $data->delete();
        \Session::flash('success','Data Peminjaman Berhasil Di Hapus');
        return redirect('peminjaman');
    }
    
   function search(Request $request)
    {
        $query = $request->get('q');
        $hasil = Peminjaman::where('jenis_barang', 'LIKE', '%' . $query . '%')->get();

        return view('result', compact('hasil', 'query'));
    }    

}