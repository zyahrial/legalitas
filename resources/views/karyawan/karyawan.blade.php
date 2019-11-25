<!DOCTYPE html>
<html>
<title>sprintONE | Karyawan</title>
<body class="sidebar-collapse hold-transition skin-blue sidebar-mini">
<div class="wrapper">
@include('partials/header')
@include('partials/sidebar')
  <!-- Left side column. contains the logo and sidebar -->
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
           @include('alert.flash-message')
    <!-- Main content -->
    <div class="contains" style="background-color: white;">
    <nav >
      <!-- Sidebar toggle button-->
      <a href="{{ URL('/karyawan/create') }}"  class="btn btn-default pull-left" style=" margin-top: 10px;  margin-left: 10px; ">
                <i class="fa fa-plus"></i> Tambah</a>
              <a href="{{ URL('/karyawan') }}"  class="btn btn-default pull-left" style="margin-left: 5px; margin-top: 10px;">
                <i class="fa fa-refresh"></i> Refresh</a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Control Sidebar Toggle Button -->
      <li style="padding-left: 10px; margin-top: 10px;">
<div class="form-group has-feedback">
 <form action="{{ url('karyawan/') }}" method="GET">
    <input type="text" class="form-control" placeholder="Cari Nama Karyawan.." name="nama" onChange="form.submit()"></input>
 </form>  
 <span class="glyphicon glyphicon-search form-control-feedback"></span>
</div>
      </li>
        </ul>
      </div>
    </nav>
    {{-- part alert --}}
    
      {{-- Kita cek, jika sessionnya ada maka tampilkan alertnya, jika tidak ada maka tidak ditampilkan alertnya --}}
    
    @if (Session::has('after_update'))
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-dismissible alert-{{ Session::get('after_update.alert') }}">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ Session::get('after_update.title') }}</strong>
            <a href="javascript:void(0)" class="alert-link">{{ Session::get('after_update.text-1') }}</a> {{ Session::get('after_update.text-2') }}
          </div>
        </div>
                            
      </div>
    @endif
    {{-- end part alert --}}
      <table class="table table-bordered table-hover" style="font-size:12px; color: black">
      <thead class="bg-info">
        <tr>
           <th>NO</th>
          <th>NPP</th>
          <th>NAMA</th>
          <th>TANGGAL.LAHIR</th>
          <th>ALAMAT</th>
          <th>TELP</th>
          <th>EMAIL</th>
          <th>JK</th>
          <th>TANGGAL.MASUK</th>          
          <th>JABATAN</th>
          <th>DIVISI</th>
  <th colspan="2"></th>
        </tr>
      </thead>
      <tbody>
                            
            @if (count($karyawan))
        @php(
          $no = 1 {{-- buat nomor urut --}}
          )
        {{-- loop all karyawan --}}
        @foreach ($karyawan as $data)
                                
                                @if (($data->jk == 'Laki-Laki'))
                                @php ($K = "L")
                                @else
                                @php ($K = "P")
                                @endif

        @if (empty($data->tanggal_lahir))
        @php  ( $tanggal_lahir = '')
        @else
        @php  ( $tanggal_lahir = date('d M Y', strtotime($data->tanggal_lahir)))
        @endif
        @if (empty($data->tanggal_masuk))
        @php  ( $tanggal_masuk = '')
        @else
        @php  ( $tanggal_masuk = date('d M Y', strtotime($data->tanggal_masuk)))
        @endif
          <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $data->npp }}</td>
            <td>{{ $data->nama }}</td>
            <td>{{ $tanggal_lahir }}</td>
            <td><p>{{ $data->alamat}}</p></td>
            <td>{{ $data->telp }}</td>
            <td>{{ $data->email }}</td>
            <td>{{$K}}</td>
            
            <td>{{ $tanggal_masuk }}</td>
            <td>{{ $data->jabatan }}</td>
            <td>{{ $data->divisi }}</td>
            <td style="background-color: #eee">
          <div class="tools">
            <a href="{{ URL('karyawan/show') }}/{{ $data->kode }}" >
          <button class="btn btn-sm btn-raised btn-info" onclick="return" title="Ubah" confirm('Yakin mau ubah data ?')"
          type="submit">
          <i class="fa fa-edit"></i></button></a>
         </td>
            <td style="background-color: #eee">
         <form action="{{action('KaryawanController@destroy', $data['kode'])}}" method="post">
         {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">
        <button class="btn btn-sm btn-raised btn-danger" title="Hapus" onclick="return confirm('Yakin mau hapus data ?')" type="submit">
        <i class="fa fa-trash-o" style="font-size: 15px;"></i>
        </button>
        </form>
        </div>
        </td>
  </tr>      
        @endforeach
      </tbody>
    </table>
    @else
   <div style="height: 50px; background-color: white;">Oops..Maaf Data Tidak Ditemukan</div>
@endif
  </div>
{{ $karyawan->links() }}
</div>
<script src="/assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="/assets/bower_components/raphael/raphael.min.js"></script>
<script src="/assets/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="/assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="/assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/assets/bower_components/moment/min/moment.min.js"></script>
<script src="/assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="/assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/assets/dist/js/demo.js"></script>
</div>
</body>
</html>
