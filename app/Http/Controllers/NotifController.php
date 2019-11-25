<?php
namespace App\Http\Controllers;
use App\Legalitas;
use App\Notif;
use App\Karyawan;
use App\User;
use App\Inventaris_it;
use Illuminate\Http\Request;

    class NotifController extends Controller
{

    function destroy(Request $request, $kode)
    {
        Legalitas::where('kode', $kode)->delete();
        \Session::flash('success','Data Legalitas Berhasil Di Hapus');
        return redirect('legalitas');
    }

    function notif(Request $request)
    {      

    $notif = Notif::orderBy('ket', 'asc')->get();
    $count_notif = Notif::count(); 
    $date_now = date('Y-m-d');
    return view('home',compact('notif','count_notif'));
    }

}
    
