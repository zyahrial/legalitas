<?php
namespace App\Http\Controllers;
use App\Legalitas;
use App\Legalitas_notif;
use App\Karyawan;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Storage;
use File;

class LegalitasController extends Controller
{	
    function index(Request $request)
    {       
    if ($request->has('nama_dok')) 
    {        
    $query = ($request->input('nama_dok'));
    //$karyawan = Karyawan::where('nama', $request->input('nama'))->get();
    $legalitas = Legalitas::where('nama_dok', 'LIKE', '%' . $query . '%')
            ->orderBy('tgl_expired', 'asc')
            ->paginate(10);
    }else{ 
    $legalitas = Legalitas::orderBy('tgl_warning', 'asc')->paginate(10);  
    } 
    return view('legalitas.legalitas',['legalitas' => $legalitas]);
    }
   
    function create()
    {
       return view('legalitas.insert');
    }
  
    function store(Request $request)
    {
         $this->validate($request, [
            'file' => 'mimes:pdf',
        ]);

    $legalitas = new Legalitas();
    $legalitas->kode = $request->get('kode');
    $legalitas->nama_dok = $request->get('nama_dok');
    $legalitas->no_dok = $request->get('no_dok');
    $legalitas->penanggung_jawab = $request->get('penanggung_jawab');
    $legalitas->email2 = $request->get('email2');
    $legalitas->tgl_terbit = $request->get('tgl_terbit');
    $legalitas->tgl_warning = $request->get('tgl_warning');
    $legalitas->tgl_expired = $request->get('tgl_expired');   
    $legalitas->nilai = $request->get('nilai');
    $legalitas->waktu = $request->get('waktu');

        if (empty($request->file('file'))){
        }else{
        $file_path = public_path().'/file/'.$legalitas->nama_file;
        File::delete($file_path);
        $file = $request->file('file');
        $ext = $file->getClientOriginalExtension();
        $newName = $legalitas->kode.".".$ext;
        $file->move('file',$newName);
        $legalitas->nama_file = $newName;
        }

    $legalitas->save();
      
    \Session::flash('success','Data Legalitas Berhasil Di Tambahkan');
    return redirect('legalitas');  
    }

    function show($kode)
    {
        $data = Legalitas::where('kode',$kode)->get();

        return view('legalitas/edit',compact('data'));
    }
 
    function update(Request $request, $kode)
    { 
        $this->validate($request, [
            'file' => 'mimes:pdf',
        ]);
    $data= Legalitas::find($kode);
    $data->kode = $request->get('kode');
    $data->nama_dok = $request->get('nama_dok');
    $data->no_dok = $request->get('no_dok');
    $data->penanggung_jawab = $request->get('penanggung_jawab');
    $data->email2 = $request->get('email2');
    $data->tgl_terbit = $request->get('tgl_terbit');
    $data->tgl_warning = $request->get('tgl_warning');
    $data->tgl_expired = $request->get('tgl_expired');   
    $data->nilai = $request->get('nilai');
    $data->waktu = $request->get('waktu');
    $data->progres = $request->get('progres');

        if (empty($request->file('file'))){
        }else{
        $file_path = public_path().'/file/'.$data->nama_file;
        File::delete($file_path);
        $file = $request->file('file');
        $ext = $file->getClientOriginalExtension();
        $newName = $data->kode.".".$ext;
        $file->move('file',$newName);
        $data->nama_file = $newName;
        }

    $data->save();
    
    \Session::flash('success','Data Legalitas Berhasil Di Ubah');
    return redirect('legalitas');   
    }

    function destroy(Request $request, $kode)
    {
        $data = Legalitas::find($kode);
        $file_path = public_path().'/file/'.$data->nama_file;
        File::delete($file_path);
        //Storage::delete('file/npwp/'.$klien->npwp);
        Legalitas::where('kode', $kode)->delete();
        \Session::flash('success','Data Legalitas Berhasil Di Hapus');
        return redirect('legalitas');
    }
    

    public function kode(Request $request)
    {
    $posts = \DB::table('sdm_legalitas')->where('kode', \DB::raw("(select max(kode) from sdm_legalitas)"))->get();
    return view('legalitas.insert', compact('posts'));
    }

    function edit_upload($kode)
    {
        //
        $data = Legalitas::where('kode',$kode)->get();
        return view('legalitas.upload.form_upload',compact('data'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    function update_upload(Request $request, $kode)
    {
        $data = \App\Legalitas::findOrFail($kode);
        if (empty($request->file('file'))){
            $data->nama_file = $data->nama_file;
        }
        else{
            unlink('upload/file/'.$data->nama_file); //menghapus file lama
            $file = $request->file('file');
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $file->move('upload',$newName);
            $data->file = $newName;
         }
        $data->save();
    \Session::flash('success','File Berhasil Di Upload');
    return redirect('legalitas');          
    }
}