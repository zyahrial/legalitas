<!DOCTYPE html>
<title>Legalitas | Primary Mail</title>

<body class="hold-transition skin-blue sidebar-mini">
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
        <li ><a href="/legalitas">Legalitas</a></li> <li class="active">Ubah</li>
      </ol>
    </section>
            <form method="post" action="{{ URL('legalitas/update_email', $datas->kode) }}" >
                {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">					
<table class="table">
  <td colspan= "2"></td>
<tr>
<td><strong>Nama</strong></td>
<td>
<div>
<input size="50" name="nama" class="form-control" placeholder="Pilih Nama"
 id="nama" size="30" onclick="open_child('/legalitas/lookup/lookup_karyawan','Look Up','800','500'); return false;" required/> 
</div>
</tr>
  <tr>
	<td><strong>Email</strong></td>
    <td>
<div>
<input size="50"  name="email" class="form-control" readonly type="text" id="email" size="30" value="{{$datas->email}}" 
required/> 
</div>
  </tr>
   <td>
						<button type="submit" class="btn btn-sm btn-raised btn-primary" >Submit</button>
						<a href="{{ URL('legalitas') }}" class="btn btn-sm btn-raised btn-danger" width="20px">Cancel </a>

	</td>
 </table >
</form>
@endforeach
</div>
</div>
</div>
</div>
<!-- ./wrapper -->
<!-- Date -->
<<script src="/assets/bower_components/jquery/dist/jquery.min.js"></script>

<script src="/assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
 <script type="text/javascript">
  $(function() {
    $( "#tgl_terbit" ).datepicker();
    $( "#tgl_warning" ).datepicker();
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
