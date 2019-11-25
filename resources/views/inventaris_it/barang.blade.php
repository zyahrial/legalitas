<!DOCTYPE html>
<html>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
@include('partials/header')
@include('partials/sidebar')
  <!-- Left side column. contains the logo and sidebar -->
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
           @include('alert.flash-message')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        JENIS BARANG IT
        <small>Control panel</small>
      </h1>
    </section>

    <!-- Main content -->
    <div class="contains" style="background-color: white;">

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
      <table class="table table-bordered table-hover" style="font-size:12px;">
      <thead>
        <tr>
          <th><strong>No</strong></td>
          <th><strong>No.Inventaris</strong></td>
          <th><strong>MERK/TYPE</td>
          <th><strong>JENIS_BARANG</td>

  <th colspan="2"></th>
        </tr>
      </thead>
      <tbody>
                            
        @if (count($barang))
        @php(
          $no = 1 {{-- buat nomor urut --}}
          )
        {{-- loop all inventaris_it --}}
        @foreach ($barang as $data)
                                

          <tr>
            <td>{{ $no++ }}</td>
                        <td>{{ $data->kode_barang }}</td>
            <td>{{ $data->nama_barang }}</td>
                        <td>{{ $data->keterangan }}</td>
            <td>
          <div class="tools">
            <a href="{{ URL('inventaris_it/show') }}/{{ $data->kode_barang }}" >
          <button class="btn btn-sm btn-raised btn-info" onclick="return" title="Ubah" confirm('Yakin mau ubah data ?')"
          type="submit">
          <i class="fa fa-edit"></i></button></a>
       <form action="{{action('Inventaris_itController@destroy', $data['kode_barang'])}}" method="post">
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
{{ $inventaris_it->links() }}
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
