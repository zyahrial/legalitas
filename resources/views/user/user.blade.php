<!DOCTYPE html>
<html>
<title>sprintONE | USER</title>
<body class="hold-transition skin-blue sidebar-mini">
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
              <a href="{{ URL('/user') }}"  class="btn btn-default pull-left" style="padding-left: 10px; margin-top: 10px; 
              margin-left: 10px;">
                <i class="fa fa-refresh"></i> Refresh</a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Control Sidebar Toggle Button -->
      <li style="padding-left: 10px; margin-top: 10px;" >
<div class="form-group has-feedback">
 <form action="{{ url('user/') }}" method="GET">
    <input type="text" class="form-control" placeholder="Cari User.." name="name" onChange="form.submit()"></input>
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
      <table class="table table-bordered table-striped table-hover" style="font-size:12px;">
      <thead>
        <tr>
          <th>No</th>
          <th>USERNAME</th>
          <th>EMAIL</th>
        </tr>
      </thead>
      <tbody>
          @php(
          $no = 1 {{-- buat nomor urut --}}
          )
        {{-- loop all karyawan --}}
        @foreach ($user as $data)
                                
          <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $data->name }}</td>
            <td>{{ $data->email }}</td>
  </tr>      
        @endforeach
      </tbody>
  </div>
</table>
{{ $user->links() }}
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
