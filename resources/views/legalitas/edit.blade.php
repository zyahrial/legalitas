<!DOCTYPE html>
<title>sprintONE | Legalitas->Edit</title>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

@include('partials/header')
<div class="card" style="width: 70%;">
@include('partials/sidebar')
 <div class="content-wrapper">
        @if (count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
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
            <form method="post" enctype="multipart/form-data" action="{{ URL('legalitas/update', $datas->kode) }}" >
                {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">					
<table class="table">
  <td colspan= "2"></td >
	<tr><td ><strong>KODE</strong></td>
    <td ><input name="kode" class="form-control" readonly="readonly" type="text" id="kode" size="30"/ 
    	value="{{ $datas->kode }}"></td>
  <tr>
	<td ><strong>NAMA DOKUMEN</strong></td>
    <td>
<div>
<input size="50" name="nama_dok" class="form-control" type="text" id="nama_dok" size="30" value="{{$datas->nama_dok}}" required/> 
</div>
  </tr>
    <tr>
		<td ><strong>NO DOKUMEN</strong></td>
    <td>
<div>
<input size="50" name="no_dok" class="form-control" type="text" id="no_dok" size="30" value="{{$datas->no_dok}}" required/> 
</div>
  </tr>
<tr>
<td><strong>PENANGGUNG JAWAB</strong></td>
<td>
<div>
<input size="50" name="penanggung_jawab" class="form-control" placeholder="Pilih Karyawan" readonly 
value="{{$datas->penanggung_jawab}}" id="nama" type="text"
 id="no_dok" size="30" onclick="open_child('/legalitas/lookup/lookup_karyawan','Look Up','800','500'); return false;" required/> 
</div>
</tr>
  <tr>
	<td><strong>EMAIL</strong></td>
    <td>
<div>
<input size="50"  name="email2" class="form-control" readonly type="text" id="email" size="30" value="{{$datas->email2}}" 
required/> 
</div>
  </tr>
  <tr>
<td ><strong>TANGGAL DI TERBITKAN</strong></td>
    <td>
	      <div class='input-group date' >
                    <input type='text' autocomplete="off" class="form-control" class="input-group datepicker form-control" date="" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd"  name="tgl_terbit" id="tgl_terbit" />
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                    </span>
     </div>
  </td>
  </tr>
   <tr>
  </tr>
  <tr>
<td ><strong>TANGGAL PERINGATAN KADALUARSA</strong></td>
 <td>
      <div class='input-group date' >
                    <input type='text' placeholder="yyyy-mm-dd" autocomplete="off" class="form-control" class="input-group datepicker form-control" date="" data-date-format="yyyy-mm-dd" name="tgl_warning" id="tgl_warning" value="{{$datas->tgl_warning}}"/>
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
         </span>
     </div>
 </td>  
</tr>
<tr>
</tr>
<tr>
	<td ><strong>TANGGAL KADALUARSA</strong></td>
    <td>
    	<div class='input-group date' >
                    <input type='text' placeholder="yyyy-mm-dd" autocomplete="off" class="form-control" class="input-group datepicker form-control" date="" data-date-format="yyyy-mm-dd" name="tgl_expired" id="tgl_expired" value="{{$datas->tgl_expired}}"/>
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
        </td>
      <tr>
<td ><strong>BIAYA PENGERJAAN</strong>
<div>
<script>function hargaCurrency(num) {
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
}
</script>
    <td ><div class='input-group date'>
<input type ='text' value="{{ $datas->nilai }}" class="form-control" name ="nilai" autocomplete="off"  
onkeyup="document.getElementById('harga').innerHTML = hargaCurrency(this.value);"/>
     <span class="input-group-addon">
      <span style="background-color: black; color: white;" id="harga"></span></span>
    </div></td>
  </tr>
  <tr>
		<td><strong>WAKTU PENGERJAAN</strong></td>
    <td>
<input name="waktu"  type="text" id="waktu" class="form-control" value="{{$datas->waktu}}"><td>
  </tr>
  <tr><td><strong>STATUS PEMBARUAN</strong></td>
    <td>
    <select name="progres" class="form-control" value="{{$datas->progres}}" required>
						<option value="">-----</option>					
						<option >PENGUMPULAN DOK</option>
						<option >KONSULTASI</option>	
						<option >PENYERAHAN DOK</option>
						<option >FINAL</option>										
</select>
<td>
</tr>
   <tr>
   		<td ><strong>INFO</strong></td>
   <td>
   <textarea  name="info" class="form-control" >{{$datas->info}}</textarea><br>
</td>
</tr>
 <tr>
  <td><strong>DOKUMEN</strong></td>
    <td>
                <div class="form-group">
                    <label for="email">File:</label>
                    <input type="file" class="form-control" id="file" name="file">
              @if ($errors->has('file'))
                <span class="help-block">
                    <strong>{{ $errors->first('file') }}</strong>
                </span>
            @endif
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
