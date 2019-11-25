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
<table class="table table-bordered" style="font-size:12px">
    <tbody class="bg-info">
        <tr >
        <th>NO </th>
        <th>NO INVENTARIS</th>
        <th>MERK / TYPE</th>
				<th>JENIS BARANG</th>
			</tr>
          </tbody>
        @if (count($lookup))
        @php(
          $no = 1 {{-- buat nomor urut --}}
          )
        {{-- loop all legalitas --}}
        @foreach ($lookup as $data)
<tr onclick="javascript:pilih(this)">
	<td>{{ $no++ }}</td><td>{{ $data->no_inventaris }}</td>
  <td>{{ $data->merk_Type }}</td>
  <td>{{ $data->jenis_barang }}</td>
</td>
</tr >
@endforeach
@endif
</table>
<script>
    function pilih(row){

        var no_inventaris=row.cells[1].innerHTML;
        window.opener.parent.document.getElementById("no_inventaris").value = no_inventaris;

        var merk_Type=row.cells[2].innerHTML;
        window.opener.parent.document.getElementById("merk_Type").value = merk_Type;

        var jenis_barang=row.cells[3].innerHTML;
        window.opener.parent.document.getElementById("jenis_barang").value = jenis_barang;
        		
 window.close();
    }
</script>
