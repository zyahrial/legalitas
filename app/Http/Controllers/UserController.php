<?php
namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
class UserController extends Controller
    {	
       function index(Request $request)
    {       
    if ($request->has('name')) 
    {        
    $query = ($request->input('name'));
    //$karyawan = Karyawan::where('nama', $request->input('nama'))->get();
    $user = User::where('name', 'LIKE', '%' . $query . '%')
            ->orderBy('name', 'asc')
            ->paginate(10);
    }else{ 
    $user = User::orderBy('name', 'asc')->paginate(10);  
    } 
    return view('user.user',['user' => $user]);
    }

	function create()
    {
       return view('user.insert');
    }
  
    function show($id)
    {
        $data = User::where('id',$id)->get();

        return view('user/edit',compact('data'));
    }
 
    function update(Request $request, $id)
    
    { 
    $data = User::find($id);
    $data->name = $request->get('name');
    $data->email = $request->get('email');
    $data->save();
    
    \Session::flash('success','Data User Berhasil Di Ubah');
    return redirect('user');   
    }
    
    function destroy(Request $request, $id)
    {
        $data = User::find($id);
        $data->delete();
        \Session::flash('success','Data User Berhasil Di Hapus');
        return redirect('user');
    }

}