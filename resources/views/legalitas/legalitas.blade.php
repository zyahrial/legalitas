<!DOCTYPE html>
<title>sprintONE | Legalitas</title>
<html>
<body class="sidebar-collapse hold-transition skin-blue sidebar-mini">
<div class="wrapper">
@include('partials/header')
@include('partials/sidebar')
  <!-- Left side column. contains the logo and sidebar --> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('alert.flash-message')
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <div class="contains" style="background-color: white;">
    <nav >
      <!-- Sidebar toggle button-->
    <a href="{{ URL('/legalitas/create') }}"  class="btn btn-default pull-left" style=" margin-top: 10px;  margin-left: 10px; ">
                <i class="fa fa-plus"></i> Tambah</a>
  <a href="{{ URL('/legalitas') }}"  class="btn btn-default pull-left" style="margin-left: 5px;  margin-top: 10px; ">
                <i class="fa fa-refresh"></i> Refresh</a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Control Sidebar Toggle Button -->
      <li style="padding-left: 10px;  margin-top: 10px; ">
<div class="form-group has-feedback">
 <form action="{{ url('legalitas/') }}" method="GET">
    <input type="text" class="form-control" placeholder="Cari Nama Legalitas.." name="nama_dok" onChange="form.submit()"></input>
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
      <table class="table table-bordered table-hover" style="font-size:12px;color: black ">
        <tbody class="bg-info">
        <tr>
            <th><strong>NO</strong></td>
            <th><strong>NAMA DOK </strong></td>
            <th><strong>PENANGGUNG JAWAB</strong>/<strong>EMAIL</strong></td>
            <th ><strong>DITERBITKAN</strong></td>
            <th><strong>DIPERBARUI</strong></td>
            <th><strong>PERINGATAN</strong></td>
            <th><strong>KADALUARSA</strong></td>
            <th><strong>STATUS PENGERJAAN</strong></td>                        
            <th><strong>PENGERJAAN</strong></td>
            <th><strong>BIAYA</strong></td>
            <th><strong>STATUS</strong></td>
  <th colspan="2"></th>
        </tr>
  </tbody>
          @php ($date_now = date('Y-m-d'))
        @php(
          $no = 1 {{-- buat nomor urut --}}
          )
        {{-- loop all legalitas --}}
        @foreach ($legalitas as $data)
                @if (empty($data->nilai))
        @php  ( $nilai = '')
        @else
        @php ($nilai = (number_format($data->nilai,0,",",".").""))  
        @endif

        @if (empty($data->tgl_terbit))
        @php  ( $tgl_terbit = '')
        @else
        @php  ( $tgl_terbit = date('d M Y', strtotime($data->tgl_terbit)))
        @endif
        @if (empty($data->tgl_warning))
        @php  ( $tgl_warning = '')
        @else
        @php  ( $tgl_warning = date('d M Y', strtotime($data->tgl_warning)))
        @endif
        @if (empty($data->tgl_expired))
        @php  ( $tgl_expired = '')
        @else
        @php  ( $tgl_expired = date('d M Y', strtotime($data->tgl_expired)))
        @endif
                @if (empty($data->updated_at))
        @php  ( $updated_at = '')
        @else
        @php  ( $updated_at = date('d M Y', strtotime($data->updated_at)))
        @endif
            <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $data->nama_dok }}<br>
            <a href="file/{{ $data->nama_file }}" target="blank" title="Print File">{{ $data->nama_file }}</a></td>
            <td><strong>{{ $data->penanggung_jawab}}</strong> <br> {{ $data->email2}}</td>
            <td>{{ $tgl_terbit }}</td>
            <td>{{ $updated_at }}</td>
            <td>{{ $tgl_warning }}</td>           
            <td>{{ $tgl_expired }}</td>
            <td>{{ $data->progres }}</td>
            <td>{{ $data->waktu }}</td>
            <td>{{ $nilai }}</td>
            @if(($date_now) < ($data->tgl_warning))
            <td align="center"><div style="background-color: green; color: white; width: 80px">AKTIF</div></td>
                 @elseif ($date_now > ($data->tgl_warning < $data->tgl_expired))
            <td align="center"> <div style="background-color: yellow; color: black; width: 80px">WARNING</div></td>
                 @elseif ($date_now > $data->tgl_expired)
            <td align="center"> <div style="background-color: red; color: white;width: 80px">EXPIRED</div></td>
                 @else
            <td align="center"><div style="background-color: yellow; color: black; width: 80px">WARNING</text></td>
                 @endif
            <td style="background-color: #eee">
        <div class="tools">
          <a href="{{ URL('legalitas/show') }}/{{ $data->kode }}" >
        <button class="btn btn-sm btn-raised btn-info" onclick="return" title="Ubah" confirm('Yakin mau ubah data ?')"
          type="submit">
          <i class="fa fa-edit"></i></button></a>
        </td>
        <td style="background-color: #eee">
        <form action="{{action('LegalitasController@destroy', $data['kode'])}}" method="post">
         {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">
        <button class="btn btn-sm btn-raised btn-danger" title="Hapus" onclick="return confirm('Yakin mau hapus data ?')" type="submit">
        <i class="fa fa-trash-o" style="font-size: 15px;"></i>
        </button>
        </form>
        </td>
        </tr>      
        @endforeach
      </tbody>
    </table>
  </div>
{{ $legalitas->links() }}
</div>
    <script>  function open_child(url,title,w,h){
        var left = (screen.width/2)-(w/2);
        var top = (screen.height/2)-(h/2);
        w = window.open(url, title, 'toolbar=no, location=no, directories=no, \n\
        status=no, menubar=no, scrollbar=no, resizabel=no, copyhistory=no,\n\
        width='+w+',height='+h+',top='+top+',left='+left);
    };</script>
<script src="/assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
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
