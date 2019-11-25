<head>
  <link rel="stylesheet" href="/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/assets/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="/assets/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="/assets/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="/assets/plugins/datepicker/datepicker3.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/assets/dist/css/skins/_all-skins.min.css">
</head>
<table class="table table-bordered table-hover" style="font-size:12px">    <thead>
        <tr>
        </tr>
    </thead>
    <tbody>
<!--        data ini bisa di loop dari database-->
        <tr onclick="javascript:pilih(this);">
            <td style="background-color: black;">HITAM</td>
        </tr>
        <tr onclick="javascript:pilih(this);">
            <td style="background-color: red;">MERAH</td>
        </tr>
        <tr onclick="javascript:pilih(this);">
            <td style="background-color:white;">PUTIH</td>
        </tr>
        <tr onclick="javascript:pilih(this);">
            <td style="background-color: blue">BIRU</td>
        </tr>
        <tr onclick="javascript:pilih(this);">
            <td style="background-color: yellow;">KUNING</td>
        </tr>
		<tr onclick="javascript:pilih(this);">
            <td style="background-color:orange;">ORANGE</td>
        </tr>
		<tr onclick="javascript:pilih(this);">
            <td style="background-color:green;" >HIJAU</td>
        </tr>
		<tr onclick="javascript:pilih(this);">
            <td style="background-color: silver;">SILVER</td>
        </tr>
				<tr onclick="javascript:pilih(this);">
            <td style="background-color: gold;">GOLD</td>
        </tr>
    </tbody>
</table>
 
<script>
    function pilih(row){
//        mendapatkan nama kota
        var warna=row.cells[0].innerHTML;
//        memasukkan nama kota dalam form
        window.opener.parent.document.getElementById("warna").value = warna;
//        menutup pop up
        window.close();
    }
</script>