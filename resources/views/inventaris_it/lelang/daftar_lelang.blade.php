<!DOCTYPE html>
<body class="sidebar-collapse old-transition skin-blue sidebar-mini">
<div class="wrapper">
@include('partials/header')
@include('partials/sidebar')
  <!-- Left side column. contains the logo and sidebar --> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  @include('alert.flash-message')
    <!-- Main content -->
    <div class="contains" style="background-color: white;">
        <!-- Header Navbar: style can be found in header.less -->
    <nav >
      <!-- Sidebar toggle button-->
  <a href="{{ URL('/lelang_inventaris_it') }}"  class="btn btn-default pull-left" style=" margin-top: 10px;  margin-left: 10px; ">
                <i class="fa fa-refresh"></i> Refresh</a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
      <li style="padding-left: 50px; margin-top:  10px;">
<div class="form-group has-feedback">
 <form action="{{ url('lelang_inventaris_it/') }}" method="GET">
    <input type="text" class="form-control" placeholder="Cari Nama Barang.." name="jenis_barang" onChange="form.submit()"></input>
 </form>  
 <span class="glyphicon glyphicon-search form-control-feedback"></span>
</div>
      </li>

            <li style="padding-left: 10px; margin-top: 10px;">
<div class="form-group has-feedback">
 <form action="{{ url('lelang_inventaris_it/') }}" method="GET">
    <input type="text" class="form-control" placeholder="Cari Nama Pembeli.." name="pembeli" onChange="form.submit()"></input>
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
      <table class="table table-bordered table-hover" style="font-size:12px; color: black;">
      <thead class="bg-info">
        <tr>
          <td><strong>NO</strong></td>
          <td ><strong>TGL.LELANG</td>
          <td ><strong>NAMA PEMBELI  </td>
          <td ><strong>KETERANGAN</td>
          <td ><strong>NO INVENTARIS</strong></td>
          <td><strong>MERK/TYPE</td>
          <td><strong>JENIS</td>
          <td><strong>NO.SERI </td>
          <td><strong>WARNA</td>
          <td><strong>PEMBELIAN</td>
          <td><strong> KONDISI </td>
          <td><strong> KANTOR</td>
                      <td ><strong>HARGA LELANG</td>
          <td><strong> HARGA BELI</td>
        </tr>
      </thead>
      <tbody>
                            
        @if (count($daftar_lelang))
        @php(
          $no = 1 {{-- buat nomor urut --}}
          )
        {{-- loop all inventaris_it --}}
        @foreach ($daftar_lelang as $data)
        @php ($harga_lelang = (number_format($data->harga_lelang,0,",",".").""))                                                            
        @php ($nilai = (number_format($data->harga,0,",",".").""))                                     
          <tr>
            <td>{{$no++}}</td>
             <td>{{ $data->tanggal }}</td>
            <td>{{ $data->pembeli }}</td>
            <td>{{ $data->keterangan }}</td>
            <td>{{ $data->no_inventaris }}</td>
            <td>{{ $data->merk_Type }}</td>
            <td>{{ $data->jenis_barang }}</td>
            <td><p>{{ $data->no_seri}}</p></td>
            <td>{{ $data->warna }}</td>
            <td>{{ $data->tahun }} / {{ $data->bulan }}</td>
            <td>{{ $data->kondisi}}</td>
            <td>{{ $data->kantor }}</td>
            <td><p>{{ $harga_lelang}}</p></td>
            <td>{{ $nilai }}</td>
  </tr>      
        @endforeach
      </tbody>
    </table>
    @else
   <div style="height: 50px; background-color: white;">Oops..Maaf Data Tidak Ditemukan</div>
@endif
  </div>
{{ $daftar_lelang->links() }}
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
