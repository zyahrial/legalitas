<!DOCTYPE html>
<title>sprintONE | Karyawan->Tambah</title>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

@include('partials/header')
<div class="card" style="width: 70%;">
@include('partials/sidebar')
 <div class="content-wrapper" style="padding: 10px;">
 	<section class="content-header">
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li ><a href="/karyawan">Karyawan</a></li><li class=active">Tambah</li>
      </ol>
    </section>
            <form action="{{ URL('karyawan/store') }}" method="post" class="form" align="left"> 
{{ csrf_field() }}			
<table class="table">
			<td colspan= "2"></td >
	<tr ><td ><strong>NPP</strong></td >
	<td ><input type="text" name="npp" class="form-control" placeholder="Nomer Pegawai" required></td >
				
				</tr>
				<tr>
				<td ><strong>Nama Lengkap</strong></td>
					<td >
						<input type="text" name="nama" class="form-control" placeholder="Nama" required>
					</td>
				</tr>
			
				<tr><td ><strong>Alamat</strong></label></td>
					<td>
						<textarea  name="alamat" class="form-control" placeholder="Alamat"></textarea>
					</td>
				</tr>
				<tr>
					<td ><strong>Telp</strong></td>
					<td>
						<input type="number_format" name="telp" class="form-control" placeholder="No Telepon" >
					</td>
				</tr>
				<tr>
					<td ><strong>Email</strong></td>
					<td>
						<input type="email" name="email" class="form-control" placeholder="" required>
					</td>
				</tr>
				
					<tr>
					<td ><strong>Jenis Kelamin</strong></td>
					<td>
						<select name="jk" class="form-control" required>
							<option value=""> ----- </option>
							<option value="Laki-Laki">Laki-Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
				</td></tr>
					<tr>
					<td ><strong>Tanggal Lahir</strong></td>
					<td>
				<div class='input-group date'>
                    <input type='text' autocomplete="off" class="form-control" class="input-group datepicker form-control" date="" data-date-format="yyyy-mm-dd"  name="tanggal_lahir" id="tanggal_lahir" />
                    	<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
					</td>
					</tr>									
					<tr>
					<td ><strong>Tanggal Masuk</strong></td>				
                <td>
                <div class='input-group date' >
                    <input type='text' autocomplete="off" class="form-control" class="input-group datepicker form-control" date="" data-date-format="yyyy-mm-dd" name="tanggal_masuk" id="tanggal_masuk" />
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                </td>
					</tr>			
					<tr><td><strong>Status Kerja</strong></td>
					<td >
						<select name="status_kerja" class="form-control" required>
							<option value=""> ----- </option>
							<option value="Aktif">Aktif</option>
							<option value="Non Aktif">Non Aktif</option>
						</select>
					</td></tr>
					<tr><td ><strong>Jabatan<strong></td>
					<td>
						<input type="text" name="jabatan" class="form-control" placeholder="Jabatan" required>
					</td>
				</tr>
						<tr>
					<td ><strong>Divisi</strong></td>
					<td>
						<select name="divisi" class="form-control" required>
							<option value=""> ----- </option>
							<option value="DPB">DPB</option>
							<option value="DKO">DKO</option>
						</select>
					</td>
				</tr>
					<tr>
					<td ><strong>Status Pegawai</strong></td>
					<td>
						<select name="status_pegawai" class="form-control" required>
							<option value=""> ----- </option>
							<option value="Tetap">Tetap</option>
							<option value="Kontrak">Kontrak</option>
						</select>
					</td>
				</tr>
          
</div></div> 
</div>
                <td>
                    <button type="submit" class="btn btn-md btn-raised btn-primary">Submit</button>
                    <a href="{{ URL('karyawan') }}" class="btn btn-md btn-raised btn-danger" >Cancel</a>
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
