<!DOCTYPE html>
<html>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

@include('partials/header')
<div class="card" style="width: 70%;">
@include('partials/sidebar')
 <div class="content-wrapper">
@foreach($data as $datas)
    <section class="content-header">
      <h1>
        User
        <small>Ubah</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li ><a href="/user">User</a></li> <li class="active">Ubah Data</li>
      </ol>
    </section>
            <form method="post" action="{{ URL('user/update', $datas->id) }}" >
                {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">      
<table class="table">
<td colspan= "2"></td >
				<tr>
				<td ><strong>Username</strong></td>
					<td >
						<input type="text" name="name" class="form-control" placeholder="Username" value="{{$datas->name}}">
					</td>
				</tr>
				<tr>
					<td ><strong>Email</strong></td>
					<td>
						<input type="email" name="email" class="form-control" placeholder="" value="{{$datas->email}}">
					</td>
				</tr>				
</div></div> 
</div>
                <td>
                    <button type="submit" class="btn btn-sm btn-raised btn-primary">Submit</button>
                    <a href="{{ URL('user') }}" class="btn btn-sm btn-raised btn-danger" width="20px">Cancel </a>
                </td>
 </table ></form>
@endforeach
</div>
</div>
</div>
</div>
<!-- ./wrapper -->
<!-- Date -->
<script src="/assets/bower_components/jquery/dist/jquery.min.js"></script>

<script src="/assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
 <script type="text/javascript">
  $(function() {
    $( "#tanggal_masuk" ).datepicker();
    $( "#tanggal_lahir" ).datepicker();
  });
  </script>
<!-- jQuery 3 -->

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
