<?php

namespace App\Http\Controllers;
use App\Legalitas;
use App\Notif;
use App\Karyawan;
use App\User;
use App\Inventaris_it;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function dashboard(Request $request)
    {      
    $count_karyawan = Karyawan::count(); 
    $count_inventaris_it = Inventaris_it::count(); 
    $count_legalitas = Legalitas::count(); 
    $count_user = User::count(); 
    $legalitas = Legalitas::orderBy('tgl_expired', 'asc')
	->limit(10)
    ->get();
    $notif = Notif::orderBy('ket', 'asc')->get();
    $count_notif = Notif::count(); 
    $date_now = date('Y-m-d');
    return view('home',compact('count_inventaris_it', 'count_karyawan','count_legalitas','count_user','legalitas','notif','count_notif'));
    }

    function destroy(Request $request)
    {
        Notif::truncate();
        return redirect('home');
    }
}
