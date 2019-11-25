<!DOCTYPE html>
<body class="sidebar-collapse  hold-transition skin-blue sidebar-mini">
<div class="wrapper">
@include('partials/header')
@include('partials/sidebar')
  <!-- Left side column. contains the logo and sidebar -->
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   @include('alert.flash-message')
    <!-- Content Header (Page header) -->
    <div class="contains" style="background-color: white;">

        <!-- Header Navbar: style can be found in header.less -->
    <nav >
      <!-- Sidebar toggle button-->
   <a href="{{ URL('peminjaman/create') }}"  class="btn btn-default pull-left" style=" margin-top: 10px;  margin-left: 10px;">
                <i class="fa fa-plus"></i> Tambah</a>
                              <a href="{{ URL('/peminjaman') }}"  class="btn btn-default pull-left"style="margin-left: 5px; margin-top: 10px;">
                <i class="fa fa-refresh"></i> Refresh</a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li style="padding-left: 100px;  margin-top: 10px;">
  <div class="form-group has-feedback">
  <form action="{{ url('peminjaman/') }}" method="GET">
    <span class="glyphicon glyphicon-stats  form-control-feedback"></span>
            <select name="status" class="form-control" onChange="form.submit()" required>

              <option style="background-color:  #eee;" value="">Status </option>
              <option value="CLOSE">CLOSE</option>
              <option value="OPEN">OPEN</option>
            </select>
  </form>
</div>
          </li>
          <!-- Control Sidebar Toggle Button -->
      <li style="margin-left: 10px;  margin-top: 10px;">
<div class="form-group has-feedback">
 <form action="{{ url('peminjaman/') }}" method="GET">
    <input type="text" class="form-control" placeholder="Cari Peminjam.." name="nama_peminjam" onChange="form.submit()"></input>
 </form>  
 <span class="glyphicon glyphicon-search form-control-feedback"></span>
</div>
      </li>
        </ul>
      </div>
    </nav>

    {{-- part alert --}}
    
      {{-- Kita cek, jika sessionnya ada maka tampilkan alertnya, jika tidak ada maka tidak ditampilkan alertnya --}}
    
    {{-- end part alert --}}
      <table class="table table-bordered table-hover" style="font-size:12px; color: black;">
      <thead class="bg-info">
        <tr>
          <td><strong>NO INVENTARIS / MERK</td>
          <td><strong>JENIS </td>
          <td><strong>PEMINJAM</td>
          <td style="width: 15%;"><strong>KEPERLUAN</td>
          <td><strong>TGL.PINJAM </td>
          <td><strong>PERK.KEMBALI</td>
          <td><strong>TGL.KEMBALI</td>
          <td><strong>MENYERAHKAN</td>
          <td><strong>PENERIMA</td>
          <td><strong>STATUS</td>
        <td colspan="2"></td>
        </tr>
      </thead>
      <tbody>
                            
        @php(
          $no = 1 {{-- buat nomor urut --}}
          )
        {{-- loop all peminjaman --}}
        @foreach ($peminjaman as $data)
                                
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>Maaf No Inventaris sudah terdaftar</li>
            @endforeach
        </ul>
    </div>
@endif
        @if (empty($data->tgl_pinjam))
        @php  ( $tgl_pinjam = '')
        @else
        @php  ( $tgl_pinjam = date('d M Y', strtotime($data->tgl_pinjam)))
        @endif
        @if (empty($data->est_tgl_kembali))
        @php  ( $est_tgl_kembali = '')
        @else
        @php  ( $est_tgl_kembali = date('d M Y', strtotime($data->est_tgl_kembali)))
        @endif
        @if (empty($data->tgl_kembali))
        @php  ( $tgl_kembali = '')
        @else
        @php  ( $tgl_kembali = date('d M Y', strtotime($data->tgl_kembali)))
        @endif
            <tr>
            <td>- {{ $data->no_inventaris }}<br>
              - {{ $data->merk_Type }}</td>
            <td>{{ $data->jenis_barang }}</td>
            <td><p><strong>{{ $data->nama_peminjam }}</strong></p>
              <p>{{ $data->email }}</p></td>
            <td> {{ $data->keperluan }} </td>
            <td>{{ $tgl_pinjam}}</td>           
            <td>{{ $est_tgl_kembali }}</td>
            <td>{{ $tgl_kembali }}</td>
            <td>{{ $data->menyerahkan }}</td>
            <td>{{ $data->menerima }}</td>
            <td>
              @if (empty($data->tgl_kembali))
             <div align="center" style="background-color: green; color: white;  padding: 3px;">OPEN</div>
              @else
             <div align="center" style="background-color: red; color: white;  padding: 3px;">CLOSE</div>
              @endif
              <a href="#hasil8" data-toggle="modal"><small align="center">Lihat Info</small></a>
            </td>
            <td style="background-color: #eee;">
          <div class="tools">
          <a href="{{ URL('peminjaman/show') }}/{{ $data->kode }}" >
          <button class="btn btn-sm btn-raised btn-info" onclick="return" title="UPDATE" confirm('Yakin mau ubah data ?')"
          type="submit">
          <i class="fa fa-edit"></i></button></a>
          </td>
            <td style="background-color: #eee;">
       <form action="{{action('PeminjamanController@destroy', $data['kode'])}}" method="post">
         {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">
        <button class="btn btn-sm btn-raised btn-danger" title="Hapus" onclick="return confirm('Yakin mau hapus data ?')" type="submit">
        <i class="fa fa-trash-o" style="font-size: 15px;"></i>
        </button>
        </form>
        </div>
        </td>
  </tr>    
      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="hasil8" class="modal fade">
                  <div class="modal-dialog" style="width: 70%;">
                    <div class="modal-content bg-warning">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">KETERANGAN</h4>
                      </div>
                      <pre>
{{$data->ket}}
                      </pre>
                    </div>
                  </div>
                </div>  
        @endforeach
      </tbody>
    </table>
  </div>

{{ $peminjaman->links() }}
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
