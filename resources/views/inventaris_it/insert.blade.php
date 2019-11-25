<!DOCTYPE html>
<title>sprintONE | Inventaris IT->Tambah</title>
<body class="hold-transition skin-blue sidebar-mini">
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>Maaf No Inventaris sudah terdaftar</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="wrapper">

@include('partials/header')
<div class="card" style="width: 70%;">
@include('partials/sidebar')
 <div class="content-wrapper">
 	<section class="content-header">
      <h1>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li ><a href="/inventaris_it">Inventaris it</a></li><li class=active">Tambah</li>
      </ol>
    </section>
            <form action="{{ URL('inventaris_it/store') }}" method="post" class="form" align="left"> 
{{ csrf_field() }}			
<table class="table">
	<tr>
  <td><strong>No.INVENTARIS</strong></td>
    <td >
	<input name="no_inventaris" type="text" id="no_inventaris" size="30" class="form-control"/></td>
 </tr>
  <tr>
    <td><strong>MERK/TYPE</strong></td>
    <td><input name="merk_Type"  type="text" id="merk_Type" size="30" class="form-control"/></td>
  </tr>

   <tr>
    <td><strong>JENIS BARANG</strong></td>
    <td >
    <div class='input-group date' >
    <input name="jenis_barang" readonly type="text" id="nama_barang" class="form-control" onclick="open_child('lookup/lookup_barang','Look Up','800','500'); return false;" placeholder="Pilih Jenis Barang" />
     <span class="input-group-addon">
     <span class="glyphicon glyphicon-pencil" title="Add Jenis Barang" onclick="open_child('/inventaris/it/tambah_barang_it.php','Look Up','800','500'); return false;"></span>
    	</span>
	</div>
</td>
   </tr>
  <tr>
     <td><strong>NO.SERI</strong></td>
    <td><input name="no_seri"  type="text" id="no_seri" size="30" class="form-control"/></td>
  </tr>

  <tr>
   <td><strong>WARNA</strong></td>
    <td >
      <input type = 'text' placeholder="Pilih Warna"  readonly name = "warna" id="warna" class="form-control" 
     onclick="open_child('lookup/lookup_warna','Look Up','800','300'); return false;" /></td>
  </tr>
  <tr>
     <td><strong>TAHUN PEMBELIAN </strong></td>
    <td><input  name="tahun" type="text" id="tahun" autocomplete="off" class="form-control" /></td>
  </tr>
  <tr>
    <td><strong>BULAN PEMBELIAN </strong></td>
    <td><input  name="bulan" type="text" id="bulan" autocomplete="off" class="form-control"/></td>
  </tr>
  <tr>
    <td><strong>KONDISI BARANG</strong></td>
    <td><input  name="kondisi" type="text" id="kondisi" readonly onclick="open_child('lookup/lookup_kondisi','Look Up','800','500'); return false;" class="form-control"/></td>
  </tr>

  <tr>
    <td><strong>POSISI/ PEMEGANG</strong></td>
    <td>
    	<input name="posisi" type="text" id="nama" class="form-control"  placeholder="Pilih Karyawan" onclick="open_child('lookup/lookup_karyawan','Look Up','800','500');  return false; "/>
    </td>
  </tr>
   </tr>
  <tr>
   <td><strong>KANTOR/ PROYEK</strong></td>
    <td>
    <input  name="kantor" type="text"  id="kantor" class="form-control" />
    </td>
  </tr>
  <tr>
    <td><strong>HARGA</strong></td>
    <script>function formatCurrency(num) {
num = num.toString().replace(/\$|\,/g,'');
if(isNaN(num))
num = "0";
sign = (num == (num = Math.abs(num)));
num = Math.floor(num*100+0.50000000001);
cents = num%100;
num = Math.floor(num/100).toString();
if(cents<10)
cents = "0" + cents;
for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
num = num.substring(0,num.length-(4*i+3))+'.'+
num.substring(num.length-(4*i+3));
return (((sign)?'':'-') + 'Rp ' + num );
}</script>
    <td >
    <div class='input-group date'>
<input type ='number' id="harga" name ="harga" class="form-control"
onkeyup="document.getElementById('format').innerHTML = formatCurrency(this.value);"/>
<span class="input-group-addon">
<span style="background-color: black; color: white;" id="format"></span></span>
    </div>
    </td>
   </tr>
     <tr>
    <td><strong>KETERANGAN</strong></td>
    <td><input  name="ket" type="text"  class="form-control" /></td>
  </tr>
</div></div> 
</div>
   <td>
			<input type="submit" name="add"  class="btn btn-sm btn-raised btn-primary" value="SUBMIT" title="SUBMIT">
            <a href="{{ URL('inventaris_it') }}" class="btn btn-sm btn-raised btn-danger" width="20px">CANCEL</a>
	</td>
 </table ></form>
        <!-- /.content -->
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
$("#tahun").datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years"
});
 $("#bulan").datepicker({
    format: "MM",
    viewMode: "months", 
    minViewMode: "months"
});
    $( "#tgl_expired" ).datepicker();
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
