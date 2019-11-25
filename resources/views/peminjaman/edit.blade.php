<!DOCTYPE html>
<title>UPDATE PEMINJAMAN</title>
<body class="hold-transition skin-blue sidebar-mini">
      @if (count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
<div class="wrapper">

@include('partials/header')
<div class="card" style="width: 70%;">
@include('partials/sidebar')
 <div class="content-wrapper">
    @foreach($data as $datas)
 	<section class="content-header">

      <h1>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li ><a href="/peminjaman">Peminjaman</a></li><li class=active">Update</li>
      </ol>
    </section>
            <form method="post" action="{{ URL('peminjaman/update', $datas->kode) }}" >
{{ csrf_field() }}	
<input name="_method" type="hidden" value="PATCH">  		
<table class="table">
	<tr>
  <td> <strong>NO INVENTARIS</strong></td>
  <td > <div class='input-group date'>
<input name="no_inventaris" type="text" id="no_inventaris" value="{{$datas->no_inventaris}}" readonly class="form-control" required>
           <span class="input-group-addon" onclick="open_child('/peminjaman/lookup/lookup_inventaris','Look Up','800','500'); return false;">
                      <span class="glyphicon glyphicon-file"></span>
                    </span>
                </div></td>
 </tr>
  <tr>
    <td ><strong>MERK/TYPE</strong></td>
    <td><input name="merk_Type"  type="text" id="merk_Type" size="30" class="form-control" 
    value="{{$datas->merk_Type}}" readonly/></td>
  </tr>
   <tr>
    <td><strong>JENIS BARANG</strong></td>
   
    <td ><input name="jenis_barang" type="text" id="jenis_barang" class="form-control" value="{{$datas->jenis_barang}}"
     size="30" readonly/></td>
   </tr>
  <tr>
    <td ><strong>NAMA PEMINJAM</strong></td>
    <td><input name="nama_peminjam"  type="text" id="nama"  class="form-control" 
    onclick="open_child('/peminjaman/lookup/lookup_karyawan','Look Up','800','500');  return false;" value="{{$datas->nama_peminjam}}" required></td>
  </tr>
  <tr>
    <td><strong>EMAIL</strong></td>
    <td><input name="email" type="email" id="email" class="form-control" value="{{$datas->email}}" required></td>
  </tr>
  <tr>
    <td><strong>KEPERLUAN</strong></td>
    <td><textarea  name="keperluan" type="text" id="keperluan" class="form-control"  required >{{$datas->keperluan}}</textarea></td>
  </tr>

  <tr>
    <td><strong>TANGGAL PINJAM</strong></td>
    <td>
              <div class='input-group date'>
                    <input readonly type='text' autocomplete="off" class="form-control" class="input-group datepicker form-control" date="" data-date-format="yyyy-mm-dd" value="{{$datas->tgl_pinjam }}" name="tgl_pinjam" id="tgl_pinjam" />
                      <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
    </td>
  </tr>
  <tr>
    <td ><strong>PERKIRAAN KEMBALI</strong></td>
    <td>
              <div class='input-group date'>
                    <input type='text' readonly autocomplete="off" class="form-control success" class="input-group datepicker form-control" date="" data-date-format="yyyy-mm-dd"  name="est_tgl_kembali" value="{{$datas->est_tgl_kembali }}" id="est_tgl_kembali" />
                      <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
    </td>    
  </tr>
    <tr>
    <td ><strong>TANGGAL KEMBALI</strong></td>
    <td>
              <div class='input-group date'>
              <input type='text' autocomplete="off" class="form-control" class="input-group datepicker form-control" date="" data-date-format="yyyy-mm-dd" readonly name="tgl_kembali" value="{{$datas->tgl_kembali }}" id="tgl_kembali" />
                      <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
    </td>
  </tr>
    <tr>
    <td><strong>MENERIMA</strong></td>
    <td><input  name="menerima" class="form-control"  size="30" type="text" value="{{ Auth::user()->name }}" id="menerima" readonly="readonly" required></td>
    <input  name="status" class="form-control"  size="30" type="hidden" value="OPEN" >  </tr>
    <tr>
    <td><strong>STATUS</strong></td>
    <td>
              <select name="status" class="form-control" required>
              <option style="background-color:  #eee;" value="">--Status--</option>
              <option value="CLOSE">CLOSE</option>
              <option value="OPEN">OPEN</option>
            </select> 
    </td> 
  </tr>
  <tr>
    <td><strong>KETERANGAN</strong></td>
    <td><textarea  name="ket"  type="text" id="ket" size="30" class="form-control" >{{$datas->ket}}</textarea>
  </tr> 

</div></div> 
</div>
   <td> <button type="submit" class="btn btn-sm btn-raised btn-primary">Submit</button>
                    <a href="{{ URL('peminjaman') }}" class="btn btn-sm btn-raised btn-danger" width="20px">Cancel </a>
	</td>
 </table ></form>
        <!-- /.content -->
 @endforeach
    </section>
</div>
</div>
</div>
</div>
<!-- Date -->
<script src="/assets/bower_components/jquery/dist/jquery.min.js"></script>

<script src="/assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
 <script type="text/javascript">
  $(function() {
$("#tgl_kembali").datepicker();
 $("#bulan").datepicker({
    format: "MM",
    viewMode: "months", 
    minViewMode: "months"
});
    $( "#tgl_expired" ).datepicker();
    $( "#est_tgl_kembali" ).datepicker();
  });
  </script>
<!-- jQuery 3 -->
    <script>  function open_child(url,title,w,h){
        var left = (screen.width/2)-(w/2);
        var top = (screen.height/2)-(h/2);
        w = window.open(url, title, 'toolbar=no, location=no, directories=no, \n\
        status=no, menubar=no, scrollbar=no, resizabel=no, copyhistory=no,\n\
        width='+w+',height='+h+',top='+top+',left='+left);
    };</script>
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

</body>

</html>
